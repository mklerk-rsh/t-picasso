<?php

namespace Database\Factories;

use App\Models\Module;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModuleFactory extends Factory
{
    protected $model = Module::class;

    public function definition(): array
    {
        $title = fake()->unique()->words(3, true);

        return [
            'subject_id' => Subject::factory(),
            'title' => ucfirst($title),
            'slug' => \Illuminate\Support\Str::slug($title),
            'description' => fake()->paragraph(),
            'order' => fake()->numberBetween(1, 20),
            'is_active' => true,
        ];
    }
}
