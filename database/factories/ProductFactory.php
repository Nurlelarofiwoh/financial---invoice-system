<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'product_code' => 'PRD-' . strtoupper($this->faker->unique()->bothify('??##??')),
            'name' => 'Produk ' . $this->faker->word(),
            'category' => $this->faker->randomElement(['Body Full Kasar', 'Part Body & Aksesoris', 'Bahan Packing & Operational']),
            'unit_price' => $this->faker->randomElement([50000, 150000, 250000, 350000, 450000]),
            'stock_quantity' => 0,
            'status' => 'active',
        ];
    }
}
