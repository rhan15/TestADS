<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id' => Category::inRandomOrder()->first()->id,
            'name' => $this->faker->word(),
            'slug' => $this->faker->word(),
            'price' => $this->faker->randomElement([80000, 30000, 500000, 250000]),
        ];
    }
}
