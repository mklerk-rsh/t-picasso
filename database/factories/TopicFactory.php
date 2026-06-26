<?php

namespace Database\Factories;

use App\Models\Module;
use App\Models\Topic;
use Illuminate\Database\Eloquent\Factories\Factory;

class TopicFactory extends Factory
{
    protected $model = Topic::class;

    public function definition(): array
    {
        $title = fake()->unique()->words(4, true);

        return [
            'module_id' => Module::factory(),
            'title' => ucfirst($title),
            'slug' => \Illuminate\Support\Str::slug($title),
            'type' => fake()->randomElement(['teacher-led', 'self-study', 'paid', 'free']),
            'content' => fake()->paragraphs(5, true),
            'video_url' => fake()->optional(0.3)->url(),
            'duration_minutes' => fake()->numberBetween(15, 120),
            'order' => fake()->numberBetween(1, 30),
            'is_active' => true,
        ];
    }
}
