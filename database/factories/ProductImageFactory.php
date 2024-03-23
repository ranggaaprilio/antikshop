<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductImage>
 */
class ProductImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //custom product_id with data from table products
            'product_id' => $this->faker->numberBetween(1, 10),
            'path' => 'N6ROSm5yVkHv8CcFzq98KM72II2AiUAlnR3I4IEG.jpg'
        ];
    }
}
