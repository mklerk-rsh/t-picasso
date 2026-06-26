<?php

namespace Database\Factories;

use App\Models\SubTopic;
use App\Models\Topic;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubTopicFactory extends Factory
{
    protected $model = SubTopic::class;

    public function definition(): array
    {
        return [
            'topic_id' => Topic::factory(),
            'title' => fake()->words(3, true),
            'content' => fake()->paragraphs(3, true),
            'order' => fake()->numberBetween(1, 15),
        ];
    }
}
