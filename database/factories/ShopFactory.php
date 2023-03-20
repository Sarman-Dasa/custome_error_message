<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shop>
 */
class ShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'      =>  fake()->company(),
            'mobile'    =>  fake()->regexify('[6-9]{1}[0-9]{9}'),
            'email'     =>  fake()->unique()->companyEmail(),
            'city_id'   =>  fake()->numberBetween(1,25),
        ];
    }
}
