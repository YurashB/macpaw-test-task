<?php

namespace Database\Factories;

use App\Models\Collections;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contributors>
 */
class ContributorsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'collection_id' => Collections::all()->random()->id,
            'user_name' => $this->faker->name,
            'amount' => rand(0,10000) + rand(0, 100) / 10,
        ];
    }
}
