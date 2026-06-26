<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CourseCategoryFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->unique()->randomElement([
            'Computer Science',
            'Marketing and Sales',
            'Accounting, Bookkeeping and Forex Trading',
            'Media Production',
            'Graphics Design',
            'Electrical Wire Engineering',
        ]);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => fake()->paragraph(),
            'icon' => fake()->randomElement(['heroicon-o-computer', 'heroicon-o-chart-bar', 'heroicon-o-calculator', 'heroicon-o-camera', 'heroicon-o-pencil', 'heroicon-o-bolt']),
            'is_active' => true,
            'sort_order' => fake()->numberBetween(1, 10),
        ];
    }
}
