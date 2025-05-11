<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'customer' => $this->faker->name(),
            'status' => $this->faker->randomElement(['новый', 'в процессе', 'выполнен']),
            'completed_at' => $this->faker->optional()->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
