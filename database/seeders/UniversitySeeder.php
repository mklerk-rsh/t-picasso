<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UniversitySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Computer Science', 'icon' => 'heroicon-o-computer', 'sort_order' => 1],
            ['name' => 'Marketing and Sales', 'icon' => 'heroicon-o-chart-bar', 'sort_order' => 2],
            ['name' => 'Accounting, Bookkeeping and Forex Trading', 'icon' => 'heroicon-o-calculator', 'sort_order' => 3],
            ['name' => 'Media Production', 'icon' => 'heroicon-o-camera', 'sort_order' => 4],
            ['name' => 'Graphics Design', 'icon' => 'heroicon-o-pencil', 'sort_order' => 5],
            ['name' => 'Electrical Wire Engineering', 'icon' => 'heroicon-o-bolt', 'sort_order' => 6],
        ];

        foreach ($categories as $data) {
            CourseCategory::firstOrCreate(
                ['slug' => Str::slug($data['name'])],
                [
                    'name' => $data['name'],
                    'description' => fake()->paragraph(),
                    'icon' => $data['icon'],
                    'is_active' => true,
                    'sort_order' => $data['sort_order'],
                ]
            );
        }

        $teacherData = [
            ['name' => 'Dr. Alan Turing', 'email' => 'alan@ppu.edu', 'specialization' => 'Computer Science', 'qualification' => 'PhD', 'years_experience' => 15],
            ['name' => 'Prof. Grace Hopper', 'email' => 'grace@ppu.edu', 'specialization' => 'Database Engineering', 'qualification' => 'PhD', 'years_experience' => 20],
            ['name' => 'Mr. Philip Kotler', 'email' => 'philip@ppu.edu', 'specialization' => 'Marketing', 'qualification' => "Master's Degree", 'years_experience' => 12],
            ['name' => 'Mrs. Jane Adams', 'email' => 'jane@ppu.edu', 'specialization' => 'Accounting', 'qualification' => 'CPA', 'years_experience' => 10],
            ['name' => 'Mr. Robert Kiyosaki', 'email' => 'robert@ppu.edu', 'specialization' => 'Forex Trading', 'qualification' => "Master's Degree", 'years_experience' => 8],
            ['name' => 'Ms. Annie Leibovitz', 'email' => 'annie@ppu.edu', 'specialization' => 'Photography', 'qualification' => "Bachelor's Degree", 'years_experience' => 14],
            ['name' => 'Mr. David Carson', 'email' => 'david@ppu.edu', 'specialization' => 'Graphics Design', 'qualification' => "Bachelor's Degree", 'years_experience' => 11],
            ['name' => 'Eng. Nikola Tesla', 'email' => 'nikola@ppu.edu', 'specialization' => 'Electrical Engineering', 'qualification' => 'PhD', 'years_experience' => 18],
        ];

        foreach ($teacherData as $data) {
            $user = User::firstOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $data['name'],
                    'password' => bcrypt('password'),
                    'is_active' => true,
                    'email_verified_at' => now(),
                ]
            );
            $user->assignRole('teacher');

            Teacher::firstOrCreate(
                ['user_id' => $user->id],
                [
                    'employee_number' => 'EMP-' . str_pad((string) Teacher::count() + 1, 4, '0', STR_PAD_LEFT),
                    'specialization' => $data['specialization'],
                    'qualification' => $data['qualification'],
                    'biography' => fake()->paragraphs(2, true),
                    'years_experience' => $data['years_experience'],
                    'is_active' => true,
                ]
            );
        }

        $csCategory = CourseCategory::where('slug', 'computer-science')->first();
        $marketingCategory = CourseCategory::where('slug', 'marketing-and-sales')->first();
        $accountingCategory = CourseCategory::where('slug', 'accounting-bookkeeping-and-forex-trading')->first();
        $mediaCategory = CourseCategory::where('slug', 'media-production')->first();
        $graphicsCategory = CourseCategory::where('slug', 'graphics-design')->first();
        $electricalCategory = CourseCategory::where('slug', 'electrical-wire-engineering')->first();

        $courses = [
            ['title' => 'Coding Fundamentals', 'category' => $csCategory, 'fee' => 499, 'duration' => '6 months'],
            ['title' => 'Database Engineering and Security', 'category' => $csCategory, 'fee' => 599, 'duration' => '6 months'],
            ['title' => 'Software Design and Infrastructure', 'category' => $csCategory, 'fee' => 699, 'duration' => '8 months'],
            ['title' => 'Web Security', 'category' => $csCategory, 'fee' => 549, 'duration' => '4 months'],
            ['title' => 'Web Graphics', 'category' => $csCategory, 'fee' => 399, 'duration' => '3 months'],
            ['title' => 'Vibe Coding and AI', 'category' => $csCategory, 'fee' => 799, 'duration' => '6 months'],
            ['title' => 'Marketing and Sales Mastery', 'category' => $marketingCategory, 'fee' => 449, 'duration' => '4 months'],
            ['title' => 'Accounting and Bookkeeping', 'category' => $accountingCategory, 'fee' => 399, 'duration' => '6 months'],
            ['title' => 'Forex Trading Strategies', 'category' => $accountingCategory, 'fee' => 599, 'duration' => '4 months'],
            ['title' => 'Photography Essentials', 'category' => $mediaCategory, 'fee' => 349, 'duration' => '3 months'],
            ['title' => 'Videography Pro', 'category' => $mediaCategory, 'fee' => 449, 'duration' => '4 months'],
            ['title' => 'Graphics Design Fundamentals', 'category' => $graphicsCategory, 'fee' => 399, 'duration' => '4 months'],
            ['title' => 'Electrical Wiring Basics', 'category' => $electricalCategory, 'fee' => 299, 'duration' => '3 months'],
            ['title' => 'Advanced Electrical Systems', 'category' => $electricalCategory, 'fee' => 499, 'duration' => '6 months'],
        ];

        foreach ($courses as $data) {
            Course::firstOrCreate(
                ['slug' => Str::slug($data['title'])],
                [
                    'category_id' => $data['category']->id,
                    'title' => $data['title'],
                    'short_description' => fake()->sentence(15),
                    'description' => fake()->paragraphs(5, true),
                    'duration' => $data['duration'],
                    'fee' => $data['fee'],
                    'rating' => fake()->randomFloat(2, 3.5, 5),
                    'enrolled_students' => fake()->numberBetween(10, 300),
                    'is_active' => true,
                ]
            );
        }

        $teachers = Teacher::all();
        $courses = Course::all();

        $alan = Teacher::whereHas('user', fn($q) => $q->where('email', 'alan@ppu.edu'))->first();
        $grace = Teacher::whereHas('user', fn($q) => $q->where('email', 'grace@ppu.edu'))->first();
        $nikola = Teacher::whereHas('user', fn($q) => $q->where('email', 'nikola@ppu.edu'))->first();
        $robert = Teacher::whereHas('user', fn($q) => $q->where('email', 'robert@ppu.edu'))->first();

        $csCourses = Course::whereIn('slug', ['coding-fundamentals', 'database-engineering-and-security', 'software-design-and-infrastructure', 'web-security', 'web-graphics', 'vibe-coding-and-ai'])->get();
        $electricalCourses = Course::whereIn('slug', ['electrical-wiring-basics', 'advanced-electrical-systems'])->get();
        $accountingCourses = Course::whereIn('slug', ['accounting-and-bookkeeping', 'forex-trading-strategies'])->get();

        foreach ($csCourses as $course) {
            if ($alan) $course->teachers()->syncWithoutDetaching([$alan->id => ['role' => 'lead']]);
            if ($grace) $course->teachers()->syncWithoutDetaching([$grace->id => ['role' => 'assistant']]);
        }

        foreach ($electricalCourses as $course) {
            if ($nikola) $course->teachers()->syncWithoutDetaching([$nikola->id => ['role' => 'lead']]);
        }

        foreach ($accountingCourses as $course) {
            if ($robert) $course->teachers()->syncWithoutDetaching([$robert->id => ['role' => 'lead']]);
        }
    }
}
