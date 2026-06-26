<?php

namespace Database\Factories;

use App\Models\CourseCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CourseFactory extends Factory
{
    public function definition(): array
    {
        $title = fake()->unique()->randomElement([
            'Coding Fundamentals',
            'Database Engineering and Security',
            'Software Design and Infrastructure',
            'Web Security',
            'Web Graphics',
            'Vibe Coding and AI',
            'Digital Marketing Mastery',
            'Sales Psychology',
            'Financial Accounting',
            'Bookkeeping Fundamentals',
            'Forex Trading Strategies',
            'Photography Essentials',
            'Videography Pro',
            'Graphics Design Fundamentals',
            'Electrical Wiring Basics',
            'Advanced Electrical Systems',
        ]);

        return [
            'category_id' => CourseCategory::factory(),
            'title' => $title,
            'slug' => Str::slug($title),
            'short_description' => fake()->sentence(15),
            'description' => fake()->paragraphs(5, true),
            'duration' => fake()->randomElement(['3 months', '6 months', '12 months', '8 weeks', '16 weeks']),
            'fee' => fake()->randomFloat(2, 50, 2000),
            'rating' => fake()->randomFloat(2, 3, 5),
            'enrolled_students' => fake()->numberBetween(0, 500),
            'is_active' => true,
        ];
    }
}
