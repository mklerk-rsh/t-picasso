<?php

namespace App\Services\Certificate;

use App\Models\Certificate;
use App\Models\CertificateTemplate;
use App\Models\Enrollment;
use App\Models\Exam;
use App\Models\ExamResult;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CertificateService
{
    public function generate(Certificate $certificate): Certificate
    {
        return DB::transaction(function () use ($certificate) {
            $certificate->update([
                'certificate_number' => $this->generateCertificateNumber($certificate),
                'issued_at' => now(),
                'status' => 'issued',
            ]);

            $this->generatePdf($certificate);

            return $certificate->fresh();
        });
    }

    public function generateCertificateNumber(Certificate $certificate): string
    {
        $prefix = 'PPU';
        $year = now()->format('Y');
        $serial = str_pad((string) $certificate->id, 6, '0', STR_PAD_LEFT);
        return "{$prefix}-{$year}-{$serial}";
    }

    public function generatePdf(Certificate $certificate): string
    {
        $template = $certificate->template;
        $student = $certificate->student;
        $course = $certificate->enrollment?->course;

        $data = [
            'certificate' => $certificate,
            'student' => $student,
            'course' => $course,
            'template' => $template,
            'verification_url' => url("/verify/certificate/{$certificate->certificate_number}"),
            'qr_data' => json_encode([
                'number' => $certificate->certificate_number,
                'student' => $student?->user?->name,
                'course' => $course?->title,
                'date' => $certificate->issued_at?->format('Y-m-d'),
            ]),
        ];

        $pdf = Pdf::loadView('certificates.default', $data);
        $filename = "certificates/{$certificate->certificate_number}.pdf";

        Storage::disk('local')->put($filename, $pdf->output());

        $certificate->update(['file_path' => $filename]);

        return $filename;
    }

    public function verify(string $certificateNumber): ?Certificate
    {
        return Certificate::where('certificate_number', $certificateNumber)
            ->with(['student.user', 'enrollment.course', 'template'])
            ->where('status', 'issued')
            ->first();
    }

    public function revoke(Certificate $certificate): Certificate
    {
        $certificate->update(['status' => 'revoked']);

        if ($certificate->file_path && Storage::disk('local')->exists($certificate->file_path)) {
            Storage::disk('local')->delete($certificate->file_path);
        }

        return $certificate->fresh();
    }

    public function checkEligibility(Student $student, Enrollment $enrollment): array
    {
        $graduationExam = Exam::where('course_id', $enrollment->course_id)
            ->where('type', 'graduation_exam')
            ->first();

        $passed = true;
        $requirements = [];

        if ($enrollment->progress_percentage < 100) {
            $requirements[] = 'Course not completed: ' . $enrollment->progress_percentage . '%';
            $passed = false;
        }

        if ($graduationExam) {
            $result = ExamResult::whereHas('examSubmission.examRegistration', function ($q) use ($graduationExam, $student) {
                $q->where('exam_id', $graduationExam->id)->where('student_id', $student->id);
            })->first();

            if (!$result || !$result->passed) {
                $requirements[] = 'Graduation exam not passed';
                $passed = false;
            }
        }

        return [
            'eligible' => $passed,
            'requirements' => $requirements,
        ];
    }
}
