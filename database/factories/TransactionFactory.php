<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "amount"=> $this->faker->randomFloat(2, 100, 50000),
            "category"=> $this->faker->word(),
            "is_income"=> '0',
            "created_at" => $this->faker->dateTimeThisYear()
        ];
    }
}
