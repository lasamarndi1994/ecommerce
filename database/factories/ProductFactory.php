<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'batch_id' => rand(10000, 99999),
            'name' =>  $this->faker->sentence(5),
            'qty' => rand(1, 10),
            'price' => rand(10, 99),
            'description' => $this->faker->paragraph(),
        ];
    }
}
