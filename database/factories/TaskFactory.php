<?php

namespace Database\Factories;

use App\Models\Priority;
use App\Models\Project;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'project_id' => Project::factory(),
            'name' => fake()->realTextBetween(10, 40),
            'description' => fake()->sentence,
            'start_date' => fake()->dateTime,
            'due_date' => fake()->dateTime,
            'status_id' => Status::factory(),
            'priority_id' => Priority::factory(),
            'completed_on' => null,
        ];
    }
}
