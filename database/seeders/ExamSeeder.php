<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Exam;
use App\Models\ExamAnswer;
use App\Models\ExamPayment;
use App\Models\ExamQuestion;
use App\Models\ExamRegistration;
use App\Models\ExamResult;
use App\Models\ExamScorecard;
use App\Models\ExamSubmission;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;

class ExamSeeder extends Seeder
{
    public function run(): void
    {
        $courses = Course::all();
        $students = Student::all();
        $admin = User::where('email', 'admin@pichapicasso.edu')->first();

        if ($courses->isEmpty()) return;

        $examTypes = [
            ['type' => 'exam_1', 'title_suffix' => 'Exam 1', 'progress' => 30, 'fee' => 50],
            ['type' => 'exam_2', 'title_suffix' => 'Exam 2', 'progress' => 60, 'fee' => 75],
            ['type' => 'exam_3', 'title_suffix' => 'Exam 3', 'progress' => 90, 'fee' => 100],
            ['type' => 'graduation_exam', 'title_suffix' => 'Graduation Exam', 'progress' => 100, 'fee' => 150],
        ];

        foreach ($courses as $course) {
            foreach ($examTypes as $examType) {
                $exam = Exam::create([
                    'course_id' => $course->id,
                    'title' => $course->title . ' - ' . $examType['title_suffix'],
                    'type' => $examType['type'],
                    'progress_required' => $examType['progress'],
                    'duration_minutes' => 60,
                    'total_marks' => 100,
                    'pass_mark' => 50,
                    'fee' => $examType['fee'],
                    'status' => 'published',
                    'published_at' => now(),
                ]);

                for ($q = 1; $q <= 5; $q++) {
                    $options = [
                        fake()->sentence(6),
                        fake()->sentence(6),
                        fake()->sentence(6),
                        fake()->sentence(6),
                    ];
                    ExamQuestion::create([
                        'exam_id' => $exam->id,
                        'question_text' => 'Question ' . $q . ': ' . fake()->sentence(8) . '?',
                        'type' => 'multiple_choice',
                        'options' => $options,
                        'correct_answer' => $options[0],
                        'marks' => 20,
                        'order' => $q,
                    ]);
                }
            }
        }

        if ($students->isEmpty()) return;

        $exams = Exam::all();

        foreach ($students->take(3) as $student) {
            $enrollments = Enrollment::where('student_id', $student->id)->get();

            foreach ($enrollments as $enrollment) {
                $courseExams = Exam::where('course_id', $enrollment->course_id)
                    ->where('status', 'published')
                    ->get();

                foreach ($courseExams as $exam) {
                    $registration = ExamRegistration::create([
                        'exam_id' => $exam->id,
                        'student_id' => $student->id,
                        'enrollment_id' => $enrollment->id,
                        'status' => 'approved',
                        'registered_at' => now()->subDays(rand(1, 14)),
                        'approved_at' => now()->subDays(rand(0, 7)),
                    ]);

                    ExamPayment::create([
                        'exam_registration_id' => $registration->id,
                        'amount' => $exam->fee,
                        'status' => 'completed',
                        'paid_at' => now()->subDays(rand(0, 5)),
                        'payment_method' => fake()->randomElement(['mobile_money', 'card', 'cash']),
                        'transaction_ref' => 'TXN-' . strtoupper(fake()->bothify('??####??')),
                    ]);

                    $submission = ExamSubmission::create([
                        'exam_registration_id' => $registration->id,
                        'student_id' => $student->id,
                        'submitted_at' => now()->subHours(rand(1, 48)),
                        'status' => 'graded',
                    ]);

                    $questions = ExamQuestion::where('exam_id', $exam->id)->get();
                    $totalAwarded = 0;
                    $totalPossible = $questions->sum('marks');

                    foreach ($questions as $question) {
                        $awarded = fake()->randomFloat(2, 0, $question->marks);
                        ExamAnswer::create([
                            'exam_submission_id' => $submission->id,
                            'exam_question_id' => $question->id,
                            'answer_text' => $options[array_rand($options)] ?? fake()->sentence(),
                            'marks_awarded' => $awarded,
                        ]);
                        $totalAwarded += $awarded;
                    }

                    $percentage = $totalPossible > 0 ? round(($totalAwarded / $totalPossible) * 100, 2) : 0;
                    $grade = match (true) {
                        $percentage >= 80 => 'A',
                        $percentage >= 60 => 'B',
                        $percentage >= 50 => 'C',
                        $percentage >= 40 => 'D',
                        default => 'F',
                    };

                    $submission->update([
                        'total_marks' => $totalAwarded,
                        'percentage' => $percentage,
                    ]);

                    ExamResult::create([
                        'exam_submission_id' => $submission->id,
                        'marks' => $totalAwarded,
                        'percentage' => $percentage,
                        'grade' => $grade,
                        'remarks' => fake()->optional(0.3)->sentence(),
                        'passed' => $percentage >= 50,
                    ]);

                    ExamScorecard::create([
                        'student_id' => $student->id,
                        'exam_id' => $exam->id,
                        'enrollment_id' => $enrollment->id,
                        'marks' => $totalAwarded,
                        'grade' => $grade,
                        'generated_at' => now(),
                    ]);
                }
            }
        }
    }
}
