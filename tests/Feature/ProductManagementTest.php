<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_view_product_catalog_with_custom_pagination_and_counts(): void
    {
        Product::factory()->count(15)->create([
            'category' => 'Body Full Kasar',
        ]);

        $response = $this->get(route('products.index'));

        $response->assertStatus(200);
        $response->assertViewHas('totalProducts', 15);
        $response->assertViewHas('categoryCounts');
    }

    public function test_can_create_new_product_and_preserve_data(): void
    {
        $productData = [
            'product_code' => 'PRD-NEW-999',
            'name' => 'Sparepart Motor Custom',
            'category' => 'Aksesoris Tambahan',
            'unit_price' => 175000,
            'status' => 'active',
        ];

        $response = $this->post(route('products.store'), $productData);

        $response->assertRedirect(route('products.index'));
        $this->assertDatabaseHas('products', [
            'product_code' => 'PRD-NEW-999',
            'name' => 'Sparepart Motor Custom',
        ]);
    }
}
