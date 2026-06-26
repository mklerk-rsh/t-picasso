<?php

namespace App\Services\Payment;

use App\Models\Payment;
use App\Models\PaymentReconciliation;
use App\Models\TransactionLog;
use Illuminate\Support\Facades\DB;

class PaymentReconciliationService
{
    public function reconcile(Payment $payment, array $gatewayData): PaymentReconciliation
    {
        return DB::transaction(function () use ($payment, $gatewayData) {
            $amountMatch = abs((float) $payment->amount - (float) ($gatewayData['amount'] ?? 0)) < 0.01;
            $refMatch = ($payment->transaction_ref === ($gatewayData['transaction_ref'] ?? null));
            $statusMatch = $this->statusMatches($payment->status, $gatewayData['status'] ?? '');

            $discrepancy = match (true) {
                !$amountMatch => 'amount_mismatch',
                !$refMatch => 'reference_mismatch',
                !$statusMatch => 'status_mismatch',
                default => null,
            };

            $reconciliation = PaymentReconciliation::create([
                'payment_id' => $payment->id,
                'gateway' => $payment->gateway,
                'transaction_ref' => $payment->transaction_ref,
                'amount' => $payment->amount,
                'gateway_amount' => $gatewayData['amount'] ?? $payment->amount,
                'status' => $discrepancy ? 'unmatched' : 'matched',
                'discrepancy' => $discrepancy,
                'reconciled_at' => now(),
                'notes' => $discrepancy ? "Discrepancy: {$discrepancy}" : 'Auto-matched',
            ]);

            TransactionLog::create([
                'payment_id' => $payment->id,
                'action' => 'reconciliation.' . $reconciliation->status,
                'response' => $gatewayData,
            ]);

            return $reconciliation;
        });
    }

    public function autoReconcile(): int
    {
        $count = 0;
        $payments = Payment::where('status', 'successful')
            ->whereDoesntHave('reconciliation')
            ->take(50)
            ->get();

        foreach ($payments as $payment) {
            $this->reconcile($payment, [
                'amount' => $payment->amount,
                'transaction_ref' => $payment->transaction_ref,
                'status' => $payment->status,
            ]);
            $count++;
        }

        return $count;
    }

    private function statusMatches(string $local, string $gateway): bool
    {
        $map = [
            'successful' => ['completed', 'success', 'captured'],
            'failed' => ['failed', 'cancelled'],
            'refunded' => ['refunded'],
        ];

        foreach ($map as $localStatus => $gatewayStatuses) {
            if ($local === $localStatus && in_array(strtolower($gateway), $gatewayStatuses)) {
                return true;
            }
        }

        return false;
    }
}
