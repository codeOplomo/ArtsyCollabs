<?php

namespace Database\Factories;

use App\Models\ArtProject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ArtProject>
 */
class ArtProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = ArtProject::class;

    public function definition()
    {
        return [
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->sentence,
            'budget' => $this->faker->numberBetween(1000, 10000),
            'status' => $this->faker->randomElement(['planning', 'ongoing', 'completed']),
            'start_date' => $this->faker->date,
            'end_date' => $this->faker->date,
        ];
    }
}
