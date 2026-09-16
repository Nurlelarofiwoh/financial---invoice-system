<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = array (
  0 => 
  array (
    'id' => 1,
    'product_code' => 'PRD-KASAR-001',
    'name' => 'full kasar mio sporty',
    'category' => 'Body Full Kasar',
    'unit_price' => 225000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  1 => 
  array (
    'id' => 2,
    'product_code' => 'PRD-KASAR-002',
    'name' => 'full kasar mio smile',
    'category' => 'Body Full Kasar',
    'unit_price' => 260000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  2 => 
  array (
    'id' => 3,
    'product_code' => 'PRD-KASAR-003',
    'name' => 'full kasar beat karbu',
    'category' => 'Body Full Kasar',
    'unit_price' => 240000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  3 => 
  array (
    'id' => 4,
    'product_code' => 'PRD-KASAR-004',
    'name' => 'full kasar beat eco/esp',
    'category' => 'Body Full Kasar',
    'unit_price' => 375000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  4 => 
  array (
    'id' => 5,
    'product_code' => 'PRD-KASAR-005',
    'name' => 'full kasar beat deluxe charge',
    'category' => 'Body Full Kasar',
    'unit_price' => 470000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  5 => 
  array (
    'id' => 6,
    'product_code' => 'PRD-KASAR-006',
    'name' => 'full kasar beat deluxe no charge',
    'category' => 'Body Full Kasar',
    'unit_price' => 450000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  6 => 
  array (
    'id' => 7,
    'product_code' => 'PRD-KASAR-007',
    'name' => 'full kasar beat fi st kasar',
    'category' => 'Body Full Kasar',
    'unit_price' => 285000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  7 => 
  array (
    'id' => 8,
    'product_code' => 'PRD-KASAR-008',
    'name' => 'full kasar beat fi st halus',
    'category' => 'Body Full Kasar',
    'unit_price' => 315000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  8 => 
  array (
    'id' => 9,
    'product_code' => 'PRD-KASAR-009',
    'name' => 'full kasar vario karbu',
    'category' => 'Body Full Kasar',
    'unit_price' => 330000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  9 => 
  array (
    'id' => 10,
    'product_code' => 'PRD-KASAR-010',
    'name' => 'full kasar mio soul',
    'category' => 'Body Full Kasar',
    'unit_price' => 260000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  10 => 
  array (
    'id' => 11,
    'product_code' => 'PRD-KASAR-011',
    'name' => 'full kasar vario led old',
    'category' => 'Body Full Kasar',
    'unit_price' => 365000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  11 => 
  array (
    'id' => 12,
    'product_code' => 'PRD-KASAR-012',
    'name' => 'full kasar vario 125 ( kzr )',
    'category' => 'Body Full Kasar',
    'unit_price' => 320000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  12 => 
  array (
    'id' => 13,
    'product_code' => 'PRD-HALUS-001',
    'name' => 'full halus beat karbu bahan spd besar',
    'category' => 'Body Full Halus',
    'unit_price' => 115000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  13 => 
  array (
    'id' => 14,
    'product_code' => 'PRD-HALUS-002',
    'name' => 'full halus beat karbu bahan spd kecil',
    'category' => 'Body Full Halus',
    'unit_price' => 115000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  14 => 
  array (
    'id' => 15,
    'product_code' => 'PRD-HALUS-003',
    'name' => 'full halus beat fi bahan st kasar',
    'category' => 'Body Full Halus',
    'unit_price' => 140000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  15 => 
  array (
    'id' => 16,
    'product_code' => 'PRD-HALUS-004',
    'name' => 'full halus beat fi bahan st halus',
    'category' => 'Body Full Halus',
    'unit_price' => 140000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  16 => 
  array (
    'id' => 17,
    'product_code' => 'PRD-HALUS-005',
    'name' => 'full halus beat deluxe',
    'category' => 'Body Full Halus',
    'unit_price' => 300000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  17 => 
  array (
    'id' => 18,
    'product_code' => 'PRD-HALUS-006',
    'name' => 'full halus beat deluxe gen 2',
    'category' => 'Body Full Halus',
    'unit_price' => 750000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  18 => 
  array (
    'id' => 19,
    'product_code' => 'PRD-HALUS-007',
    'name' => 'full halus beat eco/esp',
    'category' => 'Body Full Halus',
    'unit_price' => 170000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  19 => 
  array (
    'id' => 20,
    'product_code' => 'PRD-HALUS-008',
    'name' => 'full halus beat pop',
    'category' => 'Body Full Halus',
    'unit_price' => 185000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  20 => 
  array (
    'id' => 21,
    'product_code' => 'PRD-HALUS-009',
    'name' => 'full halus mio sporty',
    'category' => 'Body Full Halus',
    'unit_price' => 120000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  21 => 
  array (
    'id' => 22,
    'product_code' => 'PRD-HALUS-010',
    'name' => 'full halus mio j',
    'category' => 'Body Full Halus',
    'unit_price' => 245000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  22 => 
  array (
    'id' => 23,
    'product_code' => 'PRD-HALUS-011',
    'name' => 'full halus mio m3',
    'category' => 'Body Full Halus',
    'unit_price' => 400000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  23 => 
  array (
    'id' => 24,
    'product_code' => 'PRD-HALUS-012',
    'name' => 'full halus mio smile',
    'category' => 'Body Full Halus',
    'unit_price' => 115000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  24 => 
  array (
    'id' => 25,
    'product_code' => 'PRD-HALUS-013',
    'name' => 'full halus mio soul karbu',
    'category' => 'Body Full Halus',
    'unit_price' => 250000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  25 => 
  array (
    'id' => 26,
    'product_code' => 'PRD-HALUS-014',
    'name' => 'full halus scoopy karbu',
    'category' => 'Body Full Halus',
    'unit_price' => 665000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  26 => 
  array (
    'id' => 27,
    'product_code' => 'PRD-HALUS-015',
    'name' => 'full halus vario techno',
    'category' => 'Body Full Halus',
    'unit_price' => 550000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  27 => 
  array (
    'id' => 28,
    'product_code' => 'PRD-HALUS-016',
    'name' => 'full halus vario agness',
    'category' => 'Body Full Halus',
    'unit_price' => 500000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  28 => 
  array (
    'id' => 29,
    'product_code' => 'PRD-HALUS-017',
    'name' => 'full halus vario fi',
    'category' => 'Body Full Halus',
    'unit_price' => 500000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  29 => 
  array (
    'id' => 30,
    'product_code' => 'PRD-HALUS-018',
    'name' => 'full halus vario karbu bahan',
    'category' => 'Body Full Halus',
    'unit_price' => 360000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  30 => 
  array (
    'id' => 31,
    'product_code' => 'PRD-HALUS-019',
    'name' => 'full halus vario 125 old ( KZR )',
    'category' => 'Body Full Halus',
    'unit_price' => 400000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  31 => 
  array (
    'id' => 32,
    'product_code' => 'PRD-HALUS-020',
    'name' => 'full halus vario 150 led old',
    'category' => 'Body Full Halus',
    'unit_price' => 420000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  32 => 
  array (
    'id' => 33,
    'product_code' => 'PRD-HALUS-021',
    'name' => 'full halus vario all new',
    'category' => 'Body Full Halus',
    'unit_price' => 750000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  33 => 
  array (
    'id' => 34,
    'product_code' => 'PRD-HALUS-022',
    'name' => 'full halus vario all new gen ( 1 )',
    'category' => 'Body Full Halus',
    'unit_price' => 750000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  34 => 
  array (
    'id' => 35,
    'product_code' => 'PRD-HALUS-023',
    'name' => 'full halus vario all new gen ( 2 )',
    'category' => 'Body Full Halus',
    'unit_price' => 1050000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  35 => 
  array (
    'id' => 36,
    'product_code' => 'PRD-PART-001',
    'name' => 'Spakbor vario all new',
    'category' => 'Part Body & Aksesoris',
    'unit_price' => 35000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  36 => 
  array (
    'id' => 37,
    'product_code' => 'PRD-PART-002',
    'name' => 'Body kanan kiri KZR',
    'category' => 'Part Body & Aksesoris',
    'unit_price' => 80000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  37 => 
  array (
    'id' => 38,
    'product_code' => 'PRD-PART-003',
    'name' => 'Body kanan kiri mio',
    'category' => 'Part Body & Aksesoris',
    'unit_price' => 45000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  38 => 
  array (
    'id' => 39,
    'product_code' => 'PRD-PACK-001',
    'name' => 'Polyfoam 1kg',
    'category' => 'Bahan Packing & Operational',
    'unit_price' => 600000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  39 => 
  array (
    'id' => 40,
    'product_code' => 'PRD-PACK-002',
    'name' => 'Lakban 1 rol',
    'category' => 'Bahan Packing & Operational',
    'unit_price' => 60000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  40 => 
  array (
    'id' => 41,
    'product_code' => 'PRD-PACK-003',
    'name' => 'Plastik body 1 karung 25kg',
    'category' => 'Bahan Packing & Operational',
    'unit_price' => 43000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  41 => 
  array (
    'id' => 42,
    'product_code' => 'PRD-PACK-004',
    'name' => 'Plastik tameng 1 karung',
    'category' => 'Bahan Packing & Operational',
    'unit_price' => 43000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  42 => 
  array (
    'id' => 43,
    'product_code' => 'PRD-PACK-005',
    'name' => 'Kardus',
    'category' => 'Bahan Packing & Operational',
    'unit_price' => 12000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  43 => 
  array (
    'id' => 44,
    'product_code' => 'PRD-0WSMGH',
    'name' => 'thiner hg',
    'category' => 'Bahan Packing & Operational',
    'unit_price' => 300000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  44 => 
  array (
    'id' => 45,
    'product_code' => 'PRD-CK2NV4',
    'name' => 'thiner pu',
    'category' => 'Bahan Packing & Operational',
    'unit_price' => 450000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  45 => 
  array (
    'id' => 46,
    'product_code' => 'PRD-YNH44B',
    'name' => 'full halus beat deluxe non batok',
    'category' => 'Body Full Halus',
    'unit_price' => 275000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  46 => 
  array (
    'id' => 47,
    'product_code' => 'PRD-LQTWFG',
    'name' => 'body mio m3',
    'category' => 'Part Body & Aksesoris',
    'unit_price' => 75000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  47 => 
  array (
    'id' => 48,
    'product_code' => 'PRD-63H5FS',
    'name' => 'spakbor mio m3',
    'category' => 'Part Body & Aksesoris',
    'unit_price' => 35000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  48 => 
  array (
    'id' => 49,
    'product_code' => 'PRD-MWIWLZ',
    'name' => 'sayap mio m3',
    'category' => 'Part Body & Aksesoris',
    'unit_price' => 95000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  49 => 
  array (
    'id' => 50,
    'product_code' => 'PRD-TWH3TC',
    'name' => 'pernis pail',
    'category' => 'Bahan Packing & Operational',
    'unit_price' => 1900000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  50 => 
  array (
    'id' => 51,
    'product_code' => 'PRD-8SLR2I',
    'name' => 'cat nc hitam',
    'category' => 'Part Body & Aksesoris',
    'unit_price' => 1300000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  51 => 
  array (
    'id' => 52,
    'product_code' => 'PRD-3WYTYF',
    'name' => 'cat nc silver',
    'category' => 'Bahan Packing & Operational',
    'unit_price' => 1400000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  52 => 
  array (
    'id' => 53,
    'product_code' => 'PRD-MZ9S3G',
    'name' => 'paru beat karbu',
    'category' => 'Part Body & Aksesoris',
    'unit_price' => 50000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  53 => 
  array (
    'id' => 54,
    'product_code' => 'PRD-0QTWBC',
    'name' => 'full kasar vario 150 led old',
    'category' => 'Body Full Kasar',
    'unit_price' => 365000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
);

        foreach ($products as $p) {
            Product::firstOrCreate(["product_code" => $p["product_code"]], $p);
        }
    }
}
