<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\City>
 */
class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        
        $citys = array('Ahmedabad','Amreli district','Anand','Banaskantha','Bharuch','Bhavnagar','Dahod','The Dangs','Gandhinagar','Jamnagar','Junagadh','Kutch','Kheda','Mehsana','Narmada','Navsari','Patan','Panchmahal','Porbandar','Rajkot','Sabarkantha','Surendranagar','Surat','Vyara','Vadodara','Valsad',);
        return [
           'name'       =>  fake()->unique()->randomElement($citys),
           'pincode'    =>  rand(000000,666666),
           'state_id'   =>  14,
        ];
    }
}
