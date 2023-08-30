<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
           'product_name'=>fake()->name(),
           'product_price'=>fake()->numberBetween(1,1000),
           'product_availability' => Arr::random(['available', 'unavailable']),
           'category_id'=>Category::inRandomOrder()->first()->id,
        ];
    }
}
