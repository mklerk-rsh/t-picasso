<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseApplication;
use App\Models\Enrollment;
use App\Models\EnrollmentTracking;
use App\Models\Student;
use App\Models\StudentCourse;
use App\Models\StudentProgressSummary;
use App\Models\User;
use Illuminate\Database\Seeder;

class EnrollmentSeeder extends Seeder
{
    public function run(): void
    {
        $courses = Course::all();
        $admin = User::where('email', 'admin@pichapicasso.edu')->first();

        if ($courses->isEmpty()) return;

        $students = Student::all();

        if ($students->isEmpty()) {
            $studentData = [
                ['name' => 'Alice Johnson', 'email' => 'alice@example.com'],
                ['name' => 'Bob Smith', 'email' => 'bob@example.com'],
                ['name' => 'Charlie Brown', 'email' => 'charlie@example.com'],
                ['name' => 'Diana Prince', 'email' => 'diana@example.com'],
                ['name' => 'Eve Davis', 'email' => 'eve@example.com'],
            ];

            foreach ($studentData as $data) {
                $user = User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => bcrypt('password'),
                    'is_active' => true,
                    'email_verified_at' => now(),
                ]);
                $user->assignRole('student');

                Student::create([
                    'user_id' => $user->id,
                    'student_number' => 'STU-' . str_pad((string) Student::count() + 1, 5, '0', STR_PAD_LEFT),
                    'admission_date' => now()->subMonths(rand(1, 12)),
                    'status' => 'active',
                ]);
            }

            $students = Student::all();
        }

        foreach ($students as $student) {
            $assignedCourses = $courses->random(min(2, $courses->count()));

            foreach ($assignedCourses as $course) {
                $application = CourseApplication::create([
                    'student_id' => $student->id,
                    'course_id' => $course->id,
                    'status' => 'approved',
                    'applied_at' => now()->subMonths(rand(1, 6)),
                    'reviewed_at' => now()->subMonths(rand(0, 3)),
                    'reviewed_by' => $admin?->id,
                    'notes' => 'Auto-approved during seeding.',
                ]);

                $enrollment = Enrollment::create([
                    'student_id' => $student->id,
                    'course_id' => $course->id,
                    'course_application_id' => $application->id,
                    'enrolled_at' => now()->subMonths(rand(0, 5)),
                    'status' => 'active',
                    'progress_percentage' => rand(0, 100),
                ]);

                EnrollmentTracking::create([
                    'enrollment_id' => $enrollment->id,
                    'from_status' => null,
                    'to_status' => 'active',
                    'changed_by' => $admin?->id,
                    'reason' => 'Initial enrollment.',
                ]);

                StudentCourse::create([
                    'student_id' => $student->id,
                    'course_id' => $course->id,
                    'enrollment_id' => $enrollment->id,
                    'assigned_at' => now()->subMonths(rand(0, 5)),
                    'is_active' => true,
                ]);

                $totalTopics = rand(10, 40);
                $completedTopics = (int) round($totalTopics * $enrollment->progress_percentage / 100);

                StudentProgressSummary::create([
                    'student_id' => $student->id,
                    'course_id' => $course->id,
                    'total_topics' => $totalTopics,
                    'completed_topics' => $completedTopics,
                    'progress_percentage' => $enrollment->progress_percentage,
                    'average_score' => $completedTopics > 0 ? rand(40, 100) : null,
                    'total_time_spent_minutes' => rand(200, 3000),
                    'last_activity_at' => now()->subDays(rand(0, 14)),
                ]);
            }
        }
    }
}
