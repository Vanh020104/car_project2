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
            "grand_total"=>0,
            "deposit" => random_int(1000,2000),
            "user_id"=>random_int(1,10),
            "full_name"=> $this->faker->name,
            "tel"=>$this->faker->phoneNumber,
            "address"=>$this->faker->address,
            "email"=>$this->faker->email,
            "location"=>$this->faker->address,
            "payment_method"=>"COD",
            "status"=>random_int(0,3),

        ];
    }
}
