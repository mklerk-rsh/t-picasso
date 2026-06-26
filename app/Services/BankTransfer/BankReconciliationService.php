<?php

namespace App\Services\BankTransfer;

use App\Models\BankAccount;
use App\Models\BankStatement;
use App\Models\BankTransaction;
use App\Models\BankTransferPayment;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;

class BankReconciliationService
{
    public function reconcileFromStatement(BankStatement $statement): array
    {
        $matched = 0;
        $unmatched = 0;

        $transactions = BankTransaction::where('bank_statement_id', $statement->id)
            ->where('verification_status', 'pending')
            ->get();

        foreach ($transactions as $transaction) {
            $result = $this->matchTransaction($transaction);
            if ($result) {
                $matched++;
            } else {
                $unmatched++;
            }
        }

        return ['matched' => $matched, 'unmatched' => $unmatched];
    }

    public function matchTransaction(BankTransaction $transaction): bool
    {
        return DB::transaction(function () use ($transaction) {
            $rules = config('payment.reconciliation.rules', [
                'exact_amount',
                'reference_number',
                'date_range',
            ]);

            $payment = null;

            if (in_array('exact_amount', $rules)) {
                $payment = $this->matchByExactAmount($transaction);
            }

            if (!$payment && in_array('reference_number', $rules)) {
                $payment = $this->matchByReference($transaction);
            }

            if (!$payment && in_array('date_range', $rules)) {
                $payment = $this->matchByDateRange($transaction);
            }

            if ($payment) {
                $transaction->update([
                    'payment_id' => $payment->id,
                    'verification_status' => 'matched',
                ]);

                $payment->update(['status' => 'successful']);

                BankTransferPayment::where('transaction_reference', $transaction->transaction_reference)
                    ->update(['status' => 'reconciled']);

                return true;
            }

            $transaction->update(['verification_status' => 'unmatched']);
            return false;
        });
    }

    private function matchByExactAmount(BankTransaction $transaction): ?Payment
    {
        return Payment::where('amount', $transaction->amount)
            ->where('status', 'pending')
            ->whereDate('created_at', '>=', $transaction->transaction_date->subDays(3))
            ->whereDate('created_at', '<=', $transaction->transaction_date->addDays(3))
            ->first();
    }

    private function matchByReference(BankTransaction $transaction): ?Payment
    {
        $ref = $transaction->transaction_reference ?? $transaction->student_reference;
        if (empty($ref)) return null;

        return Payment::where('transaction_ref', $ref)
            ->orWhere('idempotency_key', $ref)
            ->where('status', 'pending')
            ->first();
    }

    private function matchByDateRange(BankTransaction $transaction): ?Payment
    {
        return Payment::where('amount', $transaction->amount)
            ->where('status', 'pending')
            ->whereDate('created_at', $transaction->transaction_date->format('Y-m-d'))
            ->first();
    }

    public function detectDuplicates(BankStatement $statement): array
    {
        $duplicates = [];
        $txns = BankTransaction::where('bank_statement_id', $statement->id)
            ->where('verification_status', 'matched')
            ->get();

        foreach ($txns as $txn) {
            $hash = $this->generateTransactionHash($txn);

            $existing = BankTransaction::where('id', '!=', $txn->id)
                ->where('amount', $txn->amount)
                ->where('transaction_date', $txn->transaction_date)
                ->where('verification_status', 'matched')
                ->first();

            if ($existing) {
                $duplicates[] = [
                    'transaction' => $txn,
                    'existing' => $existing,
                    'confidence' => 'high',
                ];
            }
        }

        return $duplicates;
    }

    private function generateTransactionHash(BankTransaction $transaction): string
    {
        return md5(implode('|', [
            $transaction->amount,
            $transaction->transaction_date->format('Y-m-d'),
            $transaction->transaction_reference,
        ]));
    }
}
