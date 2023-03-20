<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'      =>  fake()->firstName(),
            'city_id'   =>  fake()->numberBetween(10,15),
            'shop_id'   =>  fake()->numberBetween(1,20),
        ];
    }
}
