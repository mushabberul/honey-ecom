<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Str;
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
        $product_name = $this->faker->sentence(2);
        return [
            'category_id' => Category::select(['id'])->get()->random()->id,
            'product_name' => $product_name,
            'product_slug' => Str::slug($product_name),
            'product_price' => $this->faker->numberBetween(2, 2000),
            'product_rating' => $this->faker->numberBetween(1, 5),
            'product_short_description' => $this->faker->paragraph(),
            'product_long_description' => $this->faker->paragraph(),
            'product_store' => $this->faker->numberBetween(10, 100),
            'product_image' => "default_product.png",
            'product_code' => $this->faker->numberBetween(20, 300),
            'additional_info' => $this->faker->paragraph(),
            'alert_quentity' => $this->faker->numberBetween(5, 20)
        ];
    }
}
