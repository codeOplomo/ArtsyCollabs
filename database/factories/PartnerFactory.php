<?php

namespace Database\Factories;

use App\Models\Partner;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Partner>
 */
class PartnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Partner::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'contact_info' => $this->faker->phoneNumber,
            'description' => $this->faker->sentence,
        ];
    }
}