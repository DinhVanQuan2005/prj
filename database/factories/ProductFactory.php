<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'category_id' => $this->faker->numberBetween(1,2), 
           'title'=>$this->faker->words(20, true),
           'quantity'=>$this->faker->numberBetween(15, 1111),
           'price'=>$this->faker->numberBetween(50000, 1000000),
           'discount'=>$this->faker->numberBetween(0, 50),
           'thumbnail'=>$this->faker->imageUrl(640, 480, 'products', true),
           'description'=>$this->faker->paragraphs(2, true),

        ];
    }
}
