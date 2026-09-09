<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            // --- Category: Body Full Kasar ---
            [
                'product_code' => 'PRD-KASAR-001',
                'name' => 'full kasar mio sporty',
                'category' => 'Body Full Kasar',
                'unit_price' => 225000,
                'status' => 'active',
            ],
            [
                'product_code' => 'PRD-KASAR-002',
                'name' => 'full kasar mio smile',
                'category' => 'Body Full Kasar',
                'unit_price' => 260000,
                'status' => 'active',
            ],
            [
                'product_code' => 'PRD-KASAR-003',
                'name' => 'full kasar beat karbu',
                'category' => 'Body Full Kasar',
                'unit_price' => 240000,
                'status' => 'active',
            ],
            [
                'product_code' => 'PRD-KASAR-004',
                'name' => 'full kasar beat eco/esp',
                'category' => 'Body Full Kasar',
                'unit_price' => 375000,
                'status' => 'active',
            ],
            [
                'product_code' => 'PRD-KASAR-005',
                'name' => 'full kasar beat deluxe charge',
                'category' => 'Body Full Kasar',
                'unit_price' => 470000,
                'status' => 'active',
            ],
            [
                'product_code' => 'PRD-KASAR-006',
                'name' => 'full kasar beat deluxe no charge',
                'category' => 'Body Full Kasar',
                'unit_price' => 450000,
                'status' => 'active',
            ],
            [
                'product_code' => 'PRD-KASAR-007',
                'name' => 'full kasar beat fi st kasar',
                'category' => 'Body Full Kasar',
                'unit_price' => 285000,
                'status' => 'active',
            ],
            [
                'product_code' => 'PRD-KASAR-008',
                'name' => 'full kasar beat fi st halus',
                'category' => 'Body Full Kasar',
                'unit_price' => 315000,
                'status' => 'active',
            ],
            [
                'product_code' => 'PRD-KASAR-009',
                'name' => 'full kasar vario karbu',
                'category' => 'Body Full Kasar',
                'unit_price' => 330000,
                'status' => 'active',
            ],
            [
                'product_code' => 'PRD-KASAR-010',
                'name' => 'full kasar mio soul',
                'category' => 'Body Full Kasar',
                'unit_price' => 260000,
                'status' => 'active',
            ],
            [
                'product_code' => 'PRD-KASAR-011',
                'name' => 'full kasar vario led old',
                'category' => 'Body Full Kasar',
                'unit_price' => 365000,
                'status' => 'active',
            ],
            [
                'product_code' => 'PRD-KASAR-012',
                'name' => 'full kasar vario 125 ( kzr )',
                'category' => 'Body Full Kasar',
                'unit_price' => 320000,
                'status' => 'active',
            ],

            // --- Category: Body Full Halus ---
            [
                'product_code' => 'PRD-HALUS-001',
                'name' => 'full halus beat karbu bahan spd besar',
                'category' => 'Body Full Halus',
                'unit_price' => 115000,
                'status' => 'active',
            ],
            [
                'product_code' => 'PRD-HALUS-002',
                'name' => 'full halus beat karbu bahan spd kecil',
                'category' => 'Body Full Halus',
                'unit_price' => 115000,
                'status' => 'active',
            ],
            [
                'product_code' => 'PRD-HALUS-003',
                'name' => 'full halus beat fi bahan st kasar',
                'category' => 'Body Full Halus',
                'unit_price' => 140000,
                'status' => 'active',
            ],
            [
                'product_code' => 'PRD-HALUS-004',
                'name' => 'full halus beat fi bahan st halus',
                'category' => 'Body Full Halus',
                'unit_price' => 140000,
                'status' => 'active',
            ],
            [
                'product_code' => 'PRD-HALUS-005',
                'name' => 'full halus beat deluxe',
                'category' => 'Body Full Halus',
                'unit_price' => 300000,
                'status' => 'active',
            ],
            [
                'product_code' => 'PRD-HALUS-006',
                'name' => 'full halus beat deluxe gen 2',
                'category' => 'Body Full Halus',
                'unit_price' => 750000,
                'status' => 'active',
            ],
            [
                'product_code' => 'PRD-HALUS-007',
                'name' => 'full halus beat eco/esp',
                'category' => 'Body Full Halus',
                'unit_price' => 170000,
                'status' => 'active',
            ],
            [
                'product_code' => 'PRD-HALUS-008',
                'name' => 'full halus beat pop',
                'category' => 'Body Full Halus',
                'unit_price' => 185000,
                'status' => 'active',
            ],
            [
                'product_code' => 'PRD-HALUS-009',
                'name' => 'full halus mio sporty',
                'category' => 'Body Full Halus',
                'unit_price' => 120000,
                'status' => 'active',
            ],
            [
                'product_code' => 'PRD-HALUS-010',
                'name' => 'full halus mio j',
                'category' => 'Body Full Halus',
                'unit_price' => 245000,
                'status' => 'active',
            ],
            [
                'product_code' => 'PRD-HALUS-011',
                'name' => 'full halus mio m3',
                'category' => 'Body Full Halus',
                'unit_price' => 400000,
                'status' => 'active',
            ],
            [
                'product_code' => 'PRD-HALUS-012',
                'name' => 'full halus mio smile',
                'category' => 'Body Full Halus',
                'unit_price' => 115000,
                'status' => 'active',
            ],
            [
                'product_code' => 'PRD-HALUS-013',
                'name' => 'full halus mio soul karbu',
                'category' => 'Body Full Halus',
                'unit_price' => 250000,
                'status' => 'active',
            ],
            [
                'product_code' => 'PRD-HALUS-014',
                'name' => 'full halus scoopy karbu',
                'category' => 'Body Full Halus',
                'unit_price' => 665000,
                'status' => 'active',
            ],
            [
                'product_code' => 'PRD-HALUS-015',
                'name' => 'full halus vario techno',
                'category' => 'Body Full Halus',
                'unit_price' => 550000,
                'status' => 'active',
            ],
            [
                'product_code' => 'PRD-HALUS-016',
                'name' => 'full halus vario agness',
                'category' => 'Body Full Halus',
                'unit_price' => 500000,
                'status' => 'active',
            ],
            [
                'product_code' => 'PRD-HALUS-017',
                'name' => 'full halus vario fi',
                'category' => 'Body Full Halus',
                'unit_price' => 500000,
                'status' => 'active',
            ],
            [
                'product_code' => 'PRD-HALUS-018',
                'name' => 'full halus vario karbu bahan',
                'category' => 'Body Full Halus',
                'unit_price' => 360000,
                'status' => 'active',
            ],
            [
                'product_code' => 'PRD-HALUS-019',
                'name' => 'full halus vario 125 old ( KZR )',
                'category' => 'Body Full Halus',
                'unit_price' => 400000,
                'status' => 'active',
            ],
            [
                'product_code' => 'PRD-HALUS-020',
                'name' => 'full halus vario 150 led old',
                'category' => 'Body Full Halus',
                'unit_price' => 420000,
                'status' => 'active',
            ],
            [
                'product_code' => 'PRD-HALUS-021',
                'name' => 'full halus vario all new',
                'category' => 'Body Full Halus',
                'unit_price' => 750000,
                'status' => 'active',
            ],
            [
                'product_code' => 'PRD-HALUS-022',
                'name' => 'full halus vario all new gen ( 1 )',
                'category' => 'Body Full Halus',
                'unit_price' => 750000,
                'status' => 'active',
            ],
            [
                'product_code' => 'PRD-HALUS-023',
                'name' => 'full halus vario all new gen ( 2 )',
                'category' => 'Body Full Halus',
                'unit_price' => 1050000,
                'status' => 'active',
            ],

            // --- Category: Part Body & Aksesoris ---
            [
                'product_code' => 'PRD-PART-001',
                'name' => 'Spakbor vario all new',
                'category' => 'Part Body & Aksesoris',
                'unit_price' => 35000,
                'status' => 'active',
            ],
            [
                'product_code' => 'PRD-PART-002',
                'name' => 'Body kanan kiri KZR',
                'category' => 'Part Body & Aksesoris',
                'unit_price' => 80000,
                'status' => 'active',
            ],
            [
                'product_code' => 'PRD-PART-003',
                'name' => 'Body kanan kiri mio',
                'category' => 'Part Body & Aksesoris',
                'unit_price' => 45000,
                'status' => 'active',
            ],

            // --- Category: Bahan Packing & Operational ---
            [
                'product_code' => 'PRD-PACK-001',
                'name' => 'Polyfoam 1kg',
                'category' => 'Bahan Packing & Operational',
                'unit_price' => 600000,
                'status' => 'active',
            ],
            [
                'product_code' => 'PRD-PACK-002',
                'name' => 'Lakban 1 rol',
                'category' => 'Bahan Packing & Operational',
                'unit_price' => 60000,
                'status' => 'active',
            ],
            [
                'product_code' => 'PRD-PACK-003',
                'name' => 'Plastik body 1 karung 25kg',
                'category' => 'Bahan Packing & Operational',
                'unit_price' => 43000,
                'status' => 'active',
            ],
            [
                'product_code' => 'PRD-PACK-004',
                'name' => 'Plastik tameng 1 karung',
                'category' => 'Bahan Packing & Operational',
                'unit_price' => 43000,
                'status' => 'active',
            ],
            [
                'product_code' => 'PRD-PACK-005',
                'name' => 'Kardus',
                'category' => 'Bahan Packing & Operational',
                'unit_price' => 12000,
                'status' => 'active',
            ],
        ];

        foreach ($products as $p) {
            Product::updateOrCreate(['product_code' => $p['product_code']], $p);
        }
    }
}
