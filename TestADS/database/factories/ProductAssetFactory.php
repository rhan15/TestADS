<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductAsset>
 */
class ProductAssetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $product = Product::all()->random();
        return [
            'product_id' => Product::inRandomOrder()->first()->id,
            'image' => $this->faker->randomElement(['1.jpg', '2.jpg', '3.jpg']),
        ];
    }
}
