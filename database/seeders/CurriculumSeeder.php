<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\Course;
use App\Models\Module;
use App\Models\Student;
use App\Models\Subject;
use App\Models\SubTopic;
use App\Models\Teacher;
use App\Models\Topic;
use App\Models\TopicProgress;
use Illuminate\Database\Seeder;

class CurriculumSeeder extends Seeder
{
    public function run(): void
    {
        $teacherAlan = Teacher::whereHas('user', fn($q) => $q->where('email', 'alan@ppu.edu'))->first();
        $teacherGrace = Teacher::whereHas('user', fn($q) => $q->where('email', 'grace@ppu.edu'))->first();
        $teacherPhilip = Teacher::whereHas('user', fn($q) => $q->where('email', 'philip@ppu.edu'))->first();
        $teacherJane = Teacher::whereHas('user', fn($q) => $q->where('email', 'jane@ppu.edu'))->first();
        $teacherRobert = Teacher::whereHas('user', fn($q) => $q->where('email', 'robert@ppu.edu'))->first();
        $teacherAnnie = Teacher::whereHas('user', fn($q) => $q->where('email', 'annie@ppu.edu'))->first();
        $teacherDavid = Teacher::whereHas('user', fn($q) => $q->where('email', 'david@ppu.edu'))->first();
        $teacherNikola = Teacher::whereHas('user', fn($q) => $q->where('email', 'nikola@ppu.edu'))->first();

        $csCourses = Course::whereIn('slug', [
            'coding-fundamentals', 'database-engineering-and-security',
            'software-design-and-infrastructure', 'web-security',
            'web-graphics', 'vibe-coding-and-ai',
        ])->get();

        $subjectsData = [
            ['name' => 'Programming Fundamentals', 'code' => 'CS101', 'teacher' => $teacherAlan, 'courses' => [$csCourses->where('slug', 'coding-fundamentals')->first()]],
            ['name' => 'Database Systems', 'code' => 'CS201', 'teacher' => $teacherGrace, 'courses' => [$csCourses->where('slug', 'database-engineering-and-security')->first()]],
            ['name' => 'Software Engineering', 'code' => 'CS301', 'teacher' => $teacherAlan, 'courses' => [$csCourses->where('slug', 'software-design-and-infrastructure')->first()]],
            ['name' => 'Cybersecurity', 'code' => 'CS401', 'teacher' => $teacherGrace, 'courses' => [$csCourses->where('slug', 'web-security')->first()]],
            ['name' => 'Web Development', 'code' => 'CS501', 'teacher' => $teacherAlan, 'courses' => [$csCourses->where('slug', 'web-graphics')->first()]],
            ['name' => 'Artificial Intelligence', 'code' => 'CS601', 'teacher' => $teacherAlan, 'courses' => [$csCourses->where('slug', 'vibe-coding-and-ai')->first()]],
        ];

        foreach ($subjectsData as $data) {
            $subject = Subject::create([
                'teacher_id' => $data['teacher']?->id,
                'name' => $data['name'],
                'code' => $data['code'],
                'description' => fake()->paragraph(),
                'is_active' => true,
            ]);
            foreach ($data['courses'] as $course) {
                if ($course) {
                    $course->subjects()->attach($subject->id, ['credits' => 3, 'order' => 1]);
                }
            }
        }

        $marketingCourse = Course::where('slug', 'marketing-and-sales-mastery')->first();
        $accountingCourse = Course::where('slug', 'accounting-and-bookkeeping')->first();
        $forexCourse = Course::where('slug', 'forex-trading-strategies')->first();
        $photographyCourse = Course::where('slug', 'photography-essentials')->first();
        $videographyCourse = Course::where('slug', 'videography-pro')->first();
        $graphicsCourse = Course::where('slug', 'graphics-design-fundamentals')->first();
        $electricalBasicCourse = Course::where('slug', 'electrical-wiring-basics')->first();
        $electricalAdvCourse = Course::where('slug', 'advanced-electrical-systems')->first();

        $subjectsData2 = [
            ['name' => 'Marketing Strategy', 'code' => 'MKT101', 'teacher' => $teacherPhilip, 'courses' => [$marketingCourse]],
            ['name' => 'Financial Accounting', 'code' => 'ACC101', 'teacher' => $teacherJane, 'courses' => [$accountingCourse]],
            ['name' => 'Forex Trading', 'code' => 'FRX101', 'teacher' => $teacherRobert, 'courses' => [$forexCourse]],
            ['name' => 'Digital Photography', 'code' => 'MD101', 'teacher' => $teacherAnnie, 'courses' => [$photographyCourse, $videographyCourse]],
            ['name' => 'Graphics Design', 'code' => 'GD101', 'teacher' => $teacherDavid, 'courses' => [$graphicsCourse]],
            ['name' => 'Electrical Engineering Basics', 'code' => 'EE101', 'teacher' => $teacherNikola, 'courses' => [$electricalBasicCourse, $electricalAdvCourse]],
        ];

        foreach ($subjectsData2 as $data) {
            $subject = Subject::create([
                'teacher_id' => $data['teacher']?->id,
                'name' => $data['name'],
                'code' => $data['code'],
                'description' => fake()->paragraph(),
                'is_active' => true,
            ]);
            foreach ($data['courses'] as $course) {
                if ($course) {
                    $course->subjects()->attach($subject->id, ['credits' => 3, 'order' => 1]);
                }
            }
        }

        $subjects = Subject::all();

        $modulesData = [
            ['subject_code' => 'CS101', 'modules' => [
                ['title' => 'Introduction to Programming', 'order' => 1],
                ['title' => 'Control Structures', 'order' => 2],
                ['title' => 'Functions and Arrays', 'order' => 3],
            ]],
            ['subject_code' => 'CS201', 'modules' => [
                ['title' => 'Relational Database Design', 'order' => 1],
                ['title' => 'SQL Fundamentals', 'order' => 2],
                ['title' => 'Database Security', 'order' => 3],
            ]],
            ['subject_code' => 'MKT101', 'modules' => [
                ['title' => 'Marketing Fundamentals', 'order' => 1],
                ['title' => 'Digital Marketing', 'order' => 2],
            ]],
            ['subject_code' => 'EE101', 'modules' => [
                ['title' => 'Electrical Safety', 'order' => 1],
                ['title' => 'Circuit Analysis', 'order' => 2],
                ['title' => 'Wiring Techniques', 'order' => 3],
                ['title' => 'Advanced Systems', 'order' => 4],
            ]],
            ['subject_code' => 'GD101', 'modules' => [
                ['title' => 'Design Principles', 'order' => 1],
                ['title' => 'Color Theory', 'order' => 2],
                ['title' => 'Typography', 'order' => 3],
            ]],
            ['subject_code' => 'MD101', 'modules' => [
                ['title' => 'Camera Basics', 'order' => 1],
                ['title' => 'Composition', 'order' => 2],
                ['title' => 'Post-Processing', 'order' => 3],
            ]],
            ['subject_code' => 'ACC101', 'modules' => [
                ['title' => 'Accounting Principles', 'order' => 1],
                ['title' => 'Financial Statements', 'order' => 2],
            ]],
            ['subject_code' => 'FRX101', 'modules' => [
                ['title' => 'Forex Market Overview', 'order' => 1],
                ['title' => 'Trading Strategies', 'order' => 2],
            ]],
        ];

        foreach ($modulesData as $data) {
            $subject = Subject::where('code', $data['subject_code'])->first();
            if (!$subject) continue;

            foreach ($data['modules'] as $moduleData) {
                $module = Module::create([
                    'subject_id' => $subject->id,
                    'title' => $moduleData['title'],
                    'slug' => \Illuminate\Support\Str::slug($moduleData['title'] . '-' . $subject->code),
                    'description' => fake()->paragraph(),
                    'order' => $moduleData['order'],
                    'is_active' => true,
                ]);

                $topicCount = fake()->numberBetween(3, 5);
                $topicTypes = ['teacher-led', 'self-study', 'free'];
                for ($i = 1; $i <= $topicCount; $i++) {
                    $topicTitle = fake()->words(3, true);
                    $type = $i === 1 ? 'free' : fake()->randomElement($topicTypes);

                    $topic = Topic::create([
                        'module_id' => $module->id,
                        'title' => ucfirst($topicTitle),
                        'slug' => \Illuminate\Support\Str::slug($topicTitle . '-' . $module->id . '-' . $i),
                        'type' => $type,
                        'content' => fake()->paragraphs(5, true),
                        'duration_minutes' => fake()->numberBetween(15, 90),
                        'order' => $i,
                        'is_active' => true,
                    ]);

                    if ($i <= 2) {
                        $subCount = fake()->numberBetween(2, 3);
                        for ($j = 1; $j <= $subCount; $j++) {
                            SubTopic::create([
                                'topic_id' => $topic->id,
                                'title' => fake()->words(3, true),
                                'content' => fake()->paragraphs(2, true),
                                'order' => $j,
                            ]);
                        }
                    }
                }
            }
        }
    }
}
