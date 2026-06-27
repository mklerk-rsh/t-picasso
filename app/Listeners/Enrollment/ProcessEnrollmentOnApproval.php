<?php

namespace App\Listeners\Enrollment;

use App\Events\CourseApplicationApproved;
use App\Models\AdmissionStatus;
use App\Models\Enrollment;
use App\Models\StudentCourse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProcessEnrollmentOnApproval
{
    public function handle(CourseApplicationApproved $event): void
    {
        $application = $event->courseApplication;

        DB::transaction(function () use ($application) {
            AdmissionStatus::create([
                'course_application_id' => $application->id,
                'student_id' => $application->student_id,
                'status' => 'approved',
                'admitted_at' => now(),
            ]);

            $enrollment = Enrollment::create([
                'student_id' => $application->student_id,
                'course_id' => $application->course_id,
                'course_application_id' => $application->id,
                'status' => 'active',
                'enrolled_at' => now(),
                'progress_percentage' => 0,
            ]);

            StudentCourse::create([
                'student_id' => $application->student_id,
                'course_id' => $application->course_id,
                'enrollment_id' => $enrollment->id,
                'status' => 'active',
            ]);
        });
    }
}
