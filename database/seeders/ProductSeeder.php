<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

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
    'product_code' => 'PRD-HALUS-013',
    'name' => 'full halus beat karbu bahan spd besar',
    'category' => 'Body Full Halus',
    'unit_price' => 115000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  13 => 
  array (
    'id' => 14,
    'product_code' => 'PRD-HALUS-014',
    'name' => 'full halus beat karbu bahan spd kecil',
    'category' => 'Body Full Halus',
    'unit_price' => 115000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  14 => 
  array (
    'id' => 15,
    'product_code' => 'PRD-HALUS-015',
    'name' => 'full halus beat fi bahan st kasar',
    'category' => 'Body Full Halus',
    'unit_price' => 140000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  15 => 
  array (
    'id' => 16,
    'product_code' => 'PRD-HALUS-016',
    'name' => 'full halus beat fi bahan st halus',
    'category' => 'Body Full Halus',
    'unit_price' => 140000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  16 => 
  array (
    'id' => 17,
    'product_code' => 'PRD-HALUS-017',
    'name' => 'full halus beat deluxe',
    'category' => 'Body Full Halus',
    'unit_price' => 300000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  17 => 
  array (
    'id' => 18,
    'product_code' => 'PRD-HALUS-018',
    'name' => 'full halus beat deluxe gen 2',
    'category' => 'Body Full Halus',
    'unit_price' => 750000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  18 => 
  array (
    'id' => 19,
    'product_code' => 'PRD-HALUS-019',
    'name' => 'full halus beat eco/esp',
    'category' => 'Body Full Halus',
    'unit_price' => 170000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  19 => 
  array (
    'id' => 20,
    'product_code' => 'PRD-HALUS-020',
    'name' => 'full halus beat pop',
    'category' => 'Body Full Halus',
    'unit_price' => 185000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  20 => 
  array (
    'id' => 21,
    'product_code' => 'PRD-HALUS-021',
    'name' => 'full halus mio sporty',
    'category' => 'Body Full Halus',
    'unit_price' => 120000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  21 => 
  array (
    'id' => 22,
    'product_code' => 'PRD-HALUS-022',
    'name' => 'full halus mio j',
    'category' => 'Body Full Halus',
    'unit_price' => 245000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  22 => 
  array (
    'id' => 23,
    'product_code' => 'PRD-HALUS-023',
    'name' => 'full halus mio m3',
    'category' => 'Body Full Halus',
    'unit_price' => 400000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  23 => 
  array (
    'id' => 24,
    'product_code' => 'PRD-HALUS-024',
    'name' => 'full halus mio smile',
    'category' => 'Body Full Halus',
    'unit_price' => 115000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  24 => 
  array (
    'id' => 25,
    'product_code' => 'PRD-HALUS-025',
    'name' => 'full halus mio soul karbu',
    'category' => 'Body Full Halus',
    'unit_price' => 250000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  25 => 
  array (
    'id' => 26,
    'product_code' => 'PRD-HALUS-026',
    'name' => 'full halus scoopy karbu',
    'category' => 'Body Full Halus',
    'unit_price' => 665000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  26 => 
  array (
    'id' => 27,
    'product_code' => 'PRD-HALUS-027',
    'name' => 'full halus vario techno',
    'category' => 'Body Full Halus',
    'unit_price' => 550000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  27 => 
  array (
    'id' => 28,
    'product_code' => 'PRD-HALUS-028',
    'name' => 'full halus vario agness',
    'category' => 'Body Full Halus',
    'unit_price' => 500000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  28 => 
  array (
    'id' => 29,
    'product_code' => 'PRD-HALUS-029',
    'name' => 'full halus vario fi',
    'category' => 'Body Full Halus',
    'unit_price' => 500000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  29 => 
  array (
    'id' => 30,
    'product_code' => 'PRD-HALUS-030',
    'name' => 'full halus vario karbu bahan',
    'category' => 'Body Full Halus',
    'unit_price' => 360000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  30 => 
  array (
    'id' => 31,
    'product_code' => 'PRD-HALUS-031',
    'name' => 'full halus vario 125 old ( KZR )',
    'category' => 'Body Full Halus',
    'unit_price' => 400000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  31 => 
  array (
    'id' => 32,
    'product_code' => 'PRD-HALUS-032',
    'name' => 'full halus vario 150 led old',
    'category' => 'Body Full Halus',
    'unit_price' => 420000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  32 => 
  array (
    'id' => 33,
    'product_code' => 'PRD-HALUS-033',
    'name' => 'full halus vario all new',
    'category' => 'Body Full Halus',
    'unit_price' => 750000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  33 => 
  array (
    'id' => 34,
    'product_code' => 'PRD-HALUS-034',
    'name' => 'full halus vario all new gen ( 1 )',
    'category' => 'Body Full Halus',
    'unit_price' => 750000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  34 => 
  array (
    'id' => 35,
    'product_code' => 'PRD-HALUS-035',
    'name' => 'full halus vario all new gen ( 2 )',
    'category' => 'Body Full Halus',
    'unit_price' => 1050000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  35 => 
  array (
    'id' => 36,
    'product_code' => 'PRD-PART-036',
    'name' => 'Spakbor vario all new',
    'category' => 'Part Body & Aksesoris',
    'unit_price' => 35000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  36 => 
  array (
    'id' => 37,
    'product_code' => 'PRD-PART-037',
    'name' => 'Body kanan kiri KZR',
    'category' => 'Part Body & Aksesoris',
    'unit_price' => 80000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  37 => 
  array (
    'id' => 38,
    'product_code' => 'PRD-PART-038',
    'name' => 'Body kanan kiri mio',
    'category' => 'Part Body & Aksesoris',
    'unit_price' => 45000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  38 => 
  array (
    'id' => 39,
    'product_code' => 'PRD-PACK-039',
    'name' => 'Polyfoam 1kg',
    'category' => 'Bahan Packing & Operational',
    'unit_price' => 600000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  39 => 
  array (
    'id' => 40,
    'product_code' => 'PRD-PACK-040',
    'name' => 'Lakban 1 rol',
    'category' => 'Bahan Packing & Operational',
    'unit_price' => 60000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  40 => 
  array (
    'id' => 41,
    'product_code' => 'PRD-PACK-041',
    'name' => 'Plastik body 1 karung 25kg',
    'category' => 'Bahan Packing & Operational',
    'unit_price' => 43000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  41 => 
  array (
    'id' => 42,
    'product_code' => 'PRD-PACK-042',
    'name' => 'Plastik tameng 1 karung',
    'category' => 'Bahan Packing & Operational',
    'unit_price' => 43000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  42 => 
  array (
    'id' => 43,
    'product_code' => 'PRD-PACK-043',
    'name' => 'Kardus',
    'category' => 'Bahan Packing & Operational',
    'unit_price' => 12000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  43 => 
  array (
    'id' => 44,
    'product_code' => 'PRD-PART-044',
    'name' => 'body mio m3',
    'category' => 'Part Body & Aksesoris',
    'unit_price' => 74000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  44 => 
  array (
    'id' => 45,
    'product_code' => 'PRD-PART-045',
    'name' => 'spakbor mio m3',
    'category' => 'Part Body & Aksesoris',
    'unit_price' => 35000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  45 => 
  array (
    'id' => 46,
    'product_code' => 'PRD-PART-046',
    'name' => 'sayap mio m3',
    'category' => 'Part Body & Aksesoris',
    'unit_price' => 95000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  46 => 
  array (
    'id' => 47,
    'product_code' => 'PRD-PACK-047',
    'name' => 'pernis pail',
    'category' => 'Bahan Packing & Operational',
    'unit_price' => 3800000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  47 => 
  array (
    'id' => 48,
    'product_code' => 'PRD-PACK-048',
    'name' => 'cat nc hitam',
    'category' => 'Bahan Packing & Operational',
    'unit_price' => 1300000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  48 => 
  array (
    'id' => 49,
    'product_code' => 'PRD-PACK-049',
    'name' => 'cat nc silver',
    'category' => 'Bahan Packing & Operational',
    'unit_price' => 1500000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  49 => 
  array (
    'id' => 50,
    'product_code' => 'PRD-HALUS-050',
    'name' => 'full halus vario 125 midnight blue 5 item',
    'category' => 'Body Full Halus',
    'unit_price' => 550000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  50 => 
  array (
    'id' => 51,
    'product_code' => 'PRD-HALUS-051',
    'name' => 'full halus vario 125 dholpin blue 5 item',
    'category' => 'Body Full Halus',
    'unit_price' => 550000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  51 => 
  array (
    'id' => 52,
    'product_code' => 'PRD-HALUS-052',
    'name' => 'full halus vario led old moonlight green',
    'category' => 'Body Full Halus',
    'unit_price' => 800000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  52 => 
  array (
    'id' => 53,
    'product_code' => 'PRD-HALUS-053',
    'name' => 'full halus beat FI hitam st halus',
    'category' => 'Body Full Halus',
    'unit_price' => 230000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  53 => 
  array (
    'id' => 54,
    'product_code' => 'PRD-HALUS-054',
    'name' => 'full halus vario 125 smoke White + leg',
    'category' => 'Body Full Halus',
    'unit_price' => 1300000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  54 => 
  array (
    'id' => 55,
    'product_code' => 'PRD-HALUS-055',
    'name' => 'full Halus vario 125 hitam + leg',
    'category' => 'Body Full Halus',
    'unit_price' => 550000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  55 => 
  array (
    'id' => 56,
    'product_code' => 'PRD-HALUS-056',
    'name' => 'full halus vario 125 merah candy + leg',
    'category' => 'Body Full Halus',
    'unit_price' => 650000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  56 => 
  array (
    'id' => 57,
    'product_code' => 'PRD-HALUS-057',
    'name' => 'full halus Beat karbu Birmingham blue mix Silver (spd besar)',
    'category' => 'Body Full Halus',
    'unit_price' => 230000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  57 => 
  array (
    'id' => 58,
    'product_code' => 'PRD-HALUS-058',
    'name' => 'full halus vario 125 midnight blue + leg',
    'category' => 'Body Full Halus',
    'unit_price' => 650000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  58 => 
  array (
    'id' => 59,
    'product_code' => 'PRD-HALUS-059',
    'name' => 'full Halus mio J biru standar',
    'category' => 'Body Full Halus',
    'unit_price' => 350000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  59 => 
  array (
    'id' => 60,
    'product_code' => 'PRD-KASAR-060',
    'name' => 'full kasar kzr',
    'category' => 'Body Full Kasar',
    'unit_price' => 350000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  60 => 
  array (
    'id' => 61,
    'product_code' => 'PRD-HALUS-061',
    'name' => 'full halus beat eco hitam',
    'category' => 'Body Full Halus',
    'unit_price' => 280000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  61 => 
  array (
    'id' => 62,
    'product_code' => 'PRD-HALUS-062',
    'name' => 'full halus vario 125 Aliens green + leg',
    'category' => 'Body Full Halus',
    'unit_price' => 650000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  62 => 
  array (
    'id' => 63,
    'product_code' => 'PRD-PART-063',
    'name' => 'tameng beat karbu biru standar',
    'category' => 'Part Body & Aksesoris',
    'unit_price' => 75000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  63 => 
  array (
    'id' => 64,
    'product_code' => 'PRD-HALUS-064',
    'name' => 'full halus v 125 pink metalic mix silver + leg',
    'category' => 'Body Full Halus',
    'unit_price' => 650000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  64 => 
  array (
    'id' => 65,
    'product_code' => 'PRD-HALUS-065',
    'name' => 'full halus v 125 hitam + leg',
    'category' => 'Body Full Halus',
    'unit_price' => 550000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  65 => 
  array (
    'id' => 66,
    'product_code' => 'PRD-HALUS-066',
    'name' => 'full halus beat eco biru candy mix silver',
    'category' => 'Body Full Halus',
    'unit_price' => 300000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  66 => 
  array (
    'id' => 67,
    'product_code' => 'PRD-HALUS-067',
    'name' => 'full halus vario 125 pink metallic mix silver + leg',
    'category' => 'Body Full Halus',
    'unit_price' => 650000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  67 => 
  array (
    'id' => 68,
    'product_code' => 'PRD-HALUS-068',
    'name' => 'full halus beat pop  spring blue mix silver',
    'category' => 'Body Full Halus',
    'unit_price' => 300000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  68 => 
  array (
    'id' => 69,
    'product_code' => 'PRD-HALUS-069',
    'name' => 'full Halus bear pop Spring blue mix silver',
    'category' => 'Body Full Halus',
    'unit_price' => 300000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  69 => 
  array (
    'id' => 70,
    'product_code' => 'PRD-HALUS-070',
    'name' => 'full halus beat eco ice blue',
    'category' => 'Body Full Halus',
    'unit_price' => 300000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  70 => 
  array (
    'id' => 71,
    'product_code' => 'PRD-PART-071',
    'name' => 'body beat karbu maroon',
    'category' => 'Part Body & Aksesoris',
    'unit_price' => 70000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  71 => 
  array (
    'id' => 72,
    'product_code' => 'PRD-HALUS-072',
    'name' => 'full halus vario 125 pink lembayung gold + leg',
    'category' => 'Body Full Halus',
    'unit_price' => 650000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  72 => 
  array (
    'id' => 73,
    'product_code' => 'PRD-HALUS-073',
    'name' => 'full Halus vario 125 midnight purple + leg',
    'category' => 'Body Full Halus',
    'unit_price' => 650000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  73 => 
  array (
    'id' => 74,
    'product_code' => 'PRD-HALUS-074',
    'name' => 'full halus v 125 moon blue + leg',
    'category' => 'Body Full Halus',
    'unit_price' => 650000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  74 => 
  array (
    'id' => 75,
    'product_code' => 'PRD-HALUS-075',
    'name' => 'full Halus beat karbu dark red mix silver ( spd. Besar)',
    'category' => 'Body Full Halus',
    'unit_price' => 230000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  75 => 
  array (
    'id' => 76,
    'product_code' => 'PRD-HALUS-076',
    'name' => 'full halus beat deluxe dholpin blue',
    'category' => 'Body Full Halus',
    'unit_price' => 350000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  76 => 
  array (
    'id' => 77,
    'product_code' => 'PRD-HALUS-077',
    'name' => 'full halus vario 125 putih 5 item',
    'category' => 'Body Full Halus',
    'unit_price' => 450000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  77 => 
  array (
    'id' => 78,
    'product_code' => 'PRD-HALUS-078',
    'name' => 'full Halus beat FI biru candy mix grey st halus',
    'category' => 'Body Full Halus',
    'unit_price' => 250000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  78 => 
  array (
    'id' => 79,
    'product_code' => 'PRD-HALUS-079',
    'name' => 'full halus beat karbu moonlight purple (spd kecil)',
    'category' => 'Body Full Halus',
    'unit_price' => 230000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  79 => 
  array (
    'id' => 80,
    'product_code' => 'PRD-HALUS-080',
    'name' => 'full halus vario 125 hitam 5 item',
    'category' => 'Body Full Halus',
    'unit_price' => 450000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  80 => 
  array (
    'id' => 81,
    'product_code' => 'PRD-HALUS-081',
    'name' => 'full halua vario 125 hitam + leg',
    'category' => 'Body Full Halus',
    'unit_price' => 550000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  81 => 
  array (
    'id' => 82,
    'product_code' => 'PRD-HALUS-082',
    'name' => 'full halus beat fi st halus pink candy mix silver',
    'category' => 'Body Full Halus',
    'unit_price' => 250000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  82 => 
  array (
    'id' => 83,
    'product_code' => 'PRD-HALUS-083',
    'name' => 'full halus mio j biru muda',
    'category' => 'Body Full Halus',
    'unit_price' => 350000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  83 => 
  array (
    'id' => 84,
    'product_code' => 'PRD-HALUS-084',
    'name' => 'full halus beat deluxe silver lembayung merah',
    'category' => 'Body Full Halus',
    'unit_price' => 350000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  84 => 
  array (
    'id' => 85,
    'product_code' => 'PRD-HALUS-085',
    'name' => 'full halus beat fi st halus tosca candy mix silver',
    'category' => 'Body Full Halus',
    'unit_price' => 250000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  85 => 
  array (
    'id' => 86,
    'product_code' => 'PRD-PART-086',
    'name' => 'laci kzr',
    'category' => 'Part Body & Aksesoris',
    'unit_price' => 95000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  86 => 
  array (
    'id' => 87,
    'product_code' => 'PRD-PART-087',
    'name' => 'batok depan kzr',
    'category' => 'Part Body & Aksesoris',
    'unit_price' => 40000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  87 => 
  array (
    'id' => 88,
    'product_code' => 'PRD-KASAR-088',
    'name' => 'full kasar scoopy karbu',
    'category' => 'Body Full Kasar',
    'unit_price' => 150000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  88 => 
  array (
    'id' => 89,
    'product_code' => 'PRD-KASAR-089',
    'name' => 'full kasar vario fi',
    'category' => 'Body Full Kasar',
    'unit_price' => 400000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  89 => 
  array (
    'id' => 90,
    'product_code' => 'PRD-PACK-090',
    'name' => 'packing small',
    'category' => 'Bahan Packing & Operational',
    'unit_price' => 13000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  90 => 
  array (
    'id' => 91,
    'product_code' => 'PRD-PACK-091',
    'name' => 'packing medium',
    'category' => 'Bahan Packing & Operational',
    'unit_price' => 20000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  91 => 
  array (
    'id' => 92,
    'product_code' => 'PRD-PACK-092',
    'name' => 'packing large',
    'category' => 'Bahan Packing & Operational',
    'unit_price' => 25000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  92 => 
  array (
    'id' => 93,
    'product_code' => 'PRD-PART-093',
    'name' => 'tameng beat eco',
    'category' => 'Part Body & Aksesoris',
    'unit_price' => 75000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  93 => 
  array (
    'id' => 94,
    'product_code' => 'PRD-PART-094',
    'name' => 'tameng beat deluxe',
    'category' => 'Part Body & Aksesoris',
    'unit_price' => 90000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  94 => 
  array (
    'id' => 95,
    'product_code' => 'PRD-PART-095',
    'name' => 'body beat deluxe',
    'category' => 'Part Body & Aksesoris',
    'unit_price' => 100000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  95 => 
  array (
    'id' => 96,
    'product_code' => 'PRD-HALUS-096',
    'name' => 'full halus mio smile ( non batok )',
    'category' => 'Body Full Halus',
    'unit_price' => 90000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  96 => 
  array (
    'id' => 97,
    'product_code' => 'PRD-HALUS-097',
    'name' => 'full halus mio sporty ( non spd )',
    'category' => 'Body Full Halus',
    'unit_price' => 90000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  97 => 
  array (
    'id' => 98,
    'product_code' => 'PRD-PART-098',
    'name' => 'tameng beat karbu',
    'category' => 'Part Body & Aksesoris',
    'unit_price' => 40000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  98 => 
  array (
    'id' => 99,
    'product_code' => 'PRD-PART-099',
    'name' => 'body beat karbu',
    'category' => 'Part Body & Aksesoris',
    'unit_price' => 50000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  99 => 
  array (
    'id' => 100,
    'product_code' => 'PRD-HALUS-100',
    'name' => 'full halus beat fi st kasar ( non spd )',
    'category' => 'Body Full Halus',
    'unit_price' => 115000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  100 => 
  array (
    'id' => 101,
    'product_code' => 'PRD-PART-101',
    'name' => 'batok mio smile',
    'category' => 'Part Body & Aksesoris',
    'unit_price' => 25000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  101 => 
  array (
    'id' => 102,
    'product_code' => 'PRD-PACK-102',
    'name' => 'thinner hg',
    'category' => 'Bahan Packing & Operational',
    'unit_price' => 300000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  102 => 
  array (
    'id' => 103,
    'product_code' => 'PRD-PACK-103',
    'name' => 'thinner pu',
    'category' => 'Bahan Packing & Operational',
    'unit_price' => 450000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  103 => 
  array (
    'id' => 104,
    'product_code' => 'PRD-HALUS-104',
    'name' => 'beat fi biru candy mix silver sttr kasar',
    'category' => 'Body Full Halus',
    'unit_price' => 250000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  104 => 
  array (
    'id' => 105,
    'product_code' => 'PRD-HALUS-105',
    'name' => 'mio sporty putih',
    'category' => 'Body Full Halus',
    'unit_price' => 220000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  105 => 
  array (
    'id' => 106,
    'product_code' => 'PRD-HALUS-106',
    'name' => 'beat karbu biru mix silver gold 2012',
    'category' => 'Body Full Halus',
    'unit_price' => 230000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  106 => 
  array (
    'id' => 107,
    'product_code' => 'PRD-HALUS-107',
    'name' => 'full halus beat karbu pink candy silver 2012',
    'category' => 'Body Full Halus',
    'unit_price' => 230000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  107 => 
  array (
    'id' => 108,
    'product_code' => 'PRD-HALUS-108',
    'name' => 'full halus beat karbu ijo candy mix silver 2011',
    'category' => 'Body Full Halus',
    'unit_price' => 230000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  108 => 
  array (
    'id' => 109,
    'product_code' => 'PRD-HALUS-109',
    'name' => 'full halus beat fi merah mazda mix putih lb gold sttr halus',
    'category' => 'Body Full Halus',
    'unit_price' => 250000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  109 => 
  array (
    'id' => 110,
    'product_code' => 'PRD-HALUS-110',
    'name' => 'full halus beat fi ungu candy mix silver sttr kasar',
    'category' => 'Body Full Halus',
    'unit_price' => 250000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  110 => 
  array (
    'id' => 111,
    'product_code' => 'PRD-HALUS-111',
    'name' => 'full halus beat fi moonlight blue sttr kasar',
    'category' => 'Body Full Halus',
    'unit_price' => 250000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  111 => 
  array (
    'id' => 112,
    'product_code' => 'PRD-HALUS-112',
    'name' => 'full halus Beat deluxue blue dolphin',
    'category' => 'Body Full Halus',
    'unit_price' => 350000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  112 => 
  array (
    'id' => 113,
    'product_code' => 'PRD-HALUS-113',
    'name' => 'full halus beat eco dholpin lb gold',
    'category' => 'Body Full Halus',
    'unit_price' => 300000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  113 => 
  array (
    'id' => 114,
    'product_code' => 'PRD-HALUS-114',
    'name' => 'full halus beat fi ungu candy mix silver sttr halusm',
    'category' => 'Body Full Halus',
    'unit_price' => 250000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  114 => 
  array (
    'id' => 115,
    'product_code' => 'PRD-KASAR-115',
    'name' => 'full kasar sttr halus beat fi',
    'category' => 'Body Full Kasar',
    'unit_price' => 330000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  115 => 
  array (
    'id' => 116,
    'product_code' => 'PRD-HALUS-116',
    'name' => 'full beat fi ungu lilac lb gold mix putih lb gold',
    'category' => 'Body Full Halus',
    'unit_price' => 250000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  116 => 
  array (
    'id' => 117,
    'product_code' => 'PRD-HALUS-117',
    'name' => 'full beat eco ungu candy mix silver',
    'category' => 'Body Full Halus',
    'unit_price' => 300000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  117 => 
  array (
    'id' => 118,
    'product_code' => 'PRD-HALUS-118',
    'name' => 'full mio Sporty merah mazda',
    'category' => 'Body Full Halus',
    'unit_price' => 230000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  118 => 
  array (
    'id' => 119,
    'product_code' => 'PRD-HALUS-119',
    'name' => 'full vario led old spd all new electric blue mix silver',
    'category' => 'Body Full Halus',
    'unit_price' => 800000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  119 => 
  array (
    'id' => 120,
    'product_code' => 'PRD-HALUS-120',
    'name' => 'full beat karbu merah mazda mix silver',
    'category' => 'Body Full Halus',
    'unit_price' => 230000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  120 => 
  array (
    'id' => 121,
    'product_code' => 'PRD-HALUS-121',
    'name' => 'full beat karbu dholpin blue lb gold 2012',
    'category' => 'Body Full Halus',
    'unit_price' => 230000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  121 => 
  array (
    'id' => 122,
    'product_code' => 'PRD-HALUS-122',
    'name' => 'full halus beat karbu dolphin lb gold 2012',
    'category' => 'Body Full Halus',
    'unit_price' => 230000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  122 => 
  array (
    'id' => 123,
    'product_code' => 'PRD-HALUS-123',
    'name' => 'full beat fi hitam st kasar',
    'category' => 'Body Full Halus',
    'unit_price' => 240000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  123 => 
  array (
    'id' => 124,
    'product_code' => 'PRD-HALUS-124',
    'name' => 'full halus beat fi hitam st kasar',
    'category' => 'Body Full Halus',
    'unit_price' => 240000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  124 => 
  array (
    'id' => 125,
    'product_code' => 'PRD-HALUS-125',
    'name' => 'full halus mio smile biru candy mix silver',
    'category' => 'Body Full Halus',
    'unit_price' => 230000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  125 => 
  array (
    'id' => 126,
    'product_code' => 'PRD-HALUS-126',
    'name' => 'Full halus Beat karbu blue ice',
    'category' => 'Body Full Halus',
    'unit_price' => 230000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  126 => 
  array (
    'id' => 127,
    'product_code' => 'PRD-HALUS-127',
    'name' => 'Full Halus beat fi sttr kasar hitam doff',
    'category' => 'Body Full Halus',
    'unit_price' => 250000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  127 => 
  array (
    'id' => 128,
    'product_code' => 'PRD-HALUS-128',
    'name' => 'Full halus beat karbu spring blue mix silver',
    'category' => 'Body Full Halus',
    'unit_price' => 230000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  128 => 
  array (
    'id' => 129,
    'product_code' => 'PRD-HALUS-129',
    'name' => 'Full halus beat fi dark gun sttr halus',
    'category' => 'Body Full Halus',
    'unit_price' => 230000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  129 => 
  array (
    'id' => 130,
    'product_code' => 'PRD-HALUS-130',
    'name' => 'Full halus beat karbu biru candy mix silver 2008',
    'category' => 'Body Full Halus',
    'unit_price' => 250000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  130 => 
  array (
    'id' => 131,
    'product_code' => 'PRD-HALUS-131',
    'name' => 'Full halus beat fi White lb gold sttr halus',
    'category' => 'Body Full Halus',
    'unit_price' => 250000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  131 => 
  array (
    'id' => 132,
    'product_code' => 'PRD-HALUS-132',
    'name' => 'Full halus beat karbu ungu candy mix silver 2008',
    'category' => 'Body Full Halus',
    'unit_price' => 230000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  132 => 
  array (
    'id' => 133,
    'product_code' => 'PRD-HALUS-133',
    'name' => 'Full halus beat karbu Aliens green lb gold 2012',
    'category' => 'Body Full Halus',
    'unit_price' => 230000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  133 => 
  array (
    'id' => 134,
    'product_code' => 'PRD-HALUS-134',
    'name' => 'Full halus beat karbu white lb blue 2009',
    'category' => 'Body Full Halus',
    'unit_price' => 230000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  134 => 
  array (
    'id' => 135,
    'product_code' => 'PRD-HALUS-135',
    'name' => 'Full halus beat karbu hijau tosca lb gold mix putih lb gold',
    'category' => 'Body Full Halus',
    'unit_price' => 230000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  135 => 
  array (
    'id' => 136,
    'product_code' => 'PRD-HALUS-136',
    'name' => 'Full halus beat fi Ungu candy mix silver sttr kasar',
    'category' => 'Body Full Halus',
    'unit_price' => 240000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  136 => 
  array (
    'id' => 137,
    'product_code' => 'PRD-HALUS-137',
    'name' => 'full halus beat fi monlight blue st halus',
    'category' => 'Body Full Halus',
    'unit_price' => 250000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  137 => 
  array (
    'id' => 138,
    'product_code' => 'PRD-HALUS-138',
    'name' => 'full halus beat karbu putih lembayung gold (spd besar)',
    'category' => 'Body Full Halus',
    'unit_price' => 230000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  138 => 
  array (
    'id' => 139,
    'product_code' => 'PRD-HALUS-139',
    'name' => 'full halus vario 125 biru candy mix silver + leg',
    'category' => 'Body Full Halus',
    'unit_price' => 650000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  139 => 
  array (
    'id' => 140,
    'product_code' => 'PRD-HALUS-140',
    'name' => 'full halus beat deluxe merah Mazda mix silver',
    'category' => 'Body Full Halus',
    'unit_price' => 350000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  140 => 
  array (
    'id' => 141,
    'product_code' => 'PRD-HALUS-141',
    'name' => 'full halus beat karbu biru candy mix silver (spd besar)',
    'category' => 'Body Full Halus',
    'unit_price' => 230000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  141 => 
  array (
    'id' => 142,
    'product_code' => 'PRD-HALUS-142',
    'name' => 'full halus beat karbu ice blue  (2008)',
    'category' => 'Body Full Halus',
    'unit_price' => 230000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  142 => 
  array (
    'id' => 143,
    'product_code' => 'PRD-HALUS-143',
    'name' => 'full halus vario 125 pink lilac gold + leg',
    'category' => 'Body Full Halus',
    'unit_price' => 650000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  143 => 
  array (
    'id' => 144,
    'product_code' => 'PRD-HALUS-144',
    'name' => 'full halus beat fi st kasar nardo lem Ungu',
    'category' => 'Body Full Halus',
    'unit_price' => 250000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  144 => 
  array (
    'id' => 145,
    'product_code' => 'PRD-KASAR-145',
    'name' => 'full kasar beat karbu',
    'category' => 'Body Full Kasar',
    'unit_price' => 260000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  145 => 
  array (
    'id' => 146,
    'product_code' => 'PRD-PART-146',
    'name' => 'baut beat karbu',
    'category' => 'Part Body & Aksesoris',
    'unit_price' => 40000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  146 => 
  array (
    'id' => 147,
    'product_code' => 'PRD-HALUS-147',
    'name' => 'full halus beat karbu biru candy mix silver',
    'category' => 'Body Full Halus',
    'unit_price' => 230000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  147 => 
  array (
    'id' => 148,
    'product_code' => 'PRD-HALUS-148',
    'name' => 'full halus kzr monlight blue 5 item',
    'category' => 'Body Full Halus',
    'unit_price' => 550000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  148 => 
  array (
    'id' => 149,
    'product_code' => 'PRD-HALUS-149',
    'name' => 'full halus vario 125 brown metallic + leg',
    'category' => 'Body Full Halus',
    'unit_price' => 650000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  149 => 
  array (
    'id' => 150,
    'product_code' => 'PRD-HALUS-150',
    'name' => 'full halus vario 125 hijau botol 5 item',
    'category' => 'Body Full Halus',
    'unit_price' => 550000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  150 => 
  array (
    'id' => 151,
    'product_code' => 'PRD-HALUS-151',
    'name' => 'full halus beat fi nardo lembayung biru st halus',
    'category' => 'Body Full Halus',
    'unit_price' => 250000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  151 => 
  array (
    'id' => 152,
    'product_code' => 'PRD-HALUS-152',
    'name' => 'full halus vario 125 biru candy street mix hitam + leg',
    'category' => 'Body Full Halus',
    'unit_price' => 650000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  152 => 
  array (
    'id' => 153,
    'product_code' => 'PRD-HALUS-153',
    'name' => 'full halus mio sporty putih lembayung gold',
    'category' => 'Body Full Halus',
    'unit_price' => 230000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  153 => 
  array (
    'id' => 154,
    'product_code' => 'PRD-HALUS-154',
    'name' => 'full halus beat fi lime green mix silver st kasar',
    'category' => 'Body Full Halus',
    'unit_price' => 250000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  154 => 
  array (
    'id' => 155,
    'product_code' => 'PRD-KASAR-155',
    'name' => 'full kasar beat fi st halus',
    'category' => 'Body Full Kasar',
    'unit_price' => 330000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  155 => 
  array (
    'id' => 156,
    'product_code' => 'PRD-PART-156',
    'name' => 'tameng kzr Smoke White',
    'category' => 'Part Body & Aksesoris',
    'unit_price' => 150000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
  156 => 
  array (
    'id' => 157,
    'product_code' => 'PRD-HALUS-157',
    'name' => 'full halus vario 125 nardo lembayung ungu 5 item',
    'category' => 'Body Full Halus',
    'unit_price' => 550000.0,
    'stock_quantity' => 0,
    'status' => 'active',
  ),
);

        foreach ($products as $p) {
            Product::updateOrCreate(['id' => $p['id']], $p);
        }
    }
}