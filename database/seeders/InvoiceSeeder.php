<?php

namespace Database\Seeders;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    public function run(): void
    {
        $invoicesData = array (
  0 => 
  array (
    'invoice' => 
    array (
      'id' => 1,
      'invoice_number' => 'INV-202608-001',
      'customer_name' => 'Ropa',
      'customer_email' => NULL,
      'issue_date' => '2026-08-24',
      'due_date' => '2026-09-24',
      'notes' => NULL,
      'total_amount' => 3235000.0,
      'payment_status' => 'paid',
    ),
    'items' => 
    array (
      0 => 
      array (
        'id' => 1,
        'order_date' => NULL,
        'product_id' => 29,
        'quantity' => 1,
        'unit_price' => 500000.0,
        'subtotal' => 500000.0,
      ),
      1 => 
      array (
        'id' => 2,
        'order_date' => NULL,
        'product_id' => 24,
        'quantity' => 10,
        'unit_price' => 115000.0,
        'subtotal' => 1150000.0,
      ),
      2 => 
      array (
        'id' => 3,
        'order_date' => NULL,
        'product_id' => 22,
        'quantity' => 3,
        'unit_price' => 245000.0,
        'subtotal' => 735000.0,
      ),
      3 => 
      array (
        'id' => 4,
        'order_date' => NULL,
        'product_id' => 19,
        'quantity' => 5,
        'unit_price' => 170000.0,
        'subtotal' => 850000.0,
      ),
    ),
  ),
  1 => 
  array (
    'invoice' => 
    array (
      'id' => 2,
      'invoice_number' => 'INV-202608-002',
      'customer_name' => 'Tommy',
      'customer_email' => 'tommy@example.com',
      'issue_date' => '2026-08-25',
      'due_date' => '2026-09-25',
      'notes' => 'Pembayaran Lunas (Paid)',
      'total_amount' => 2265000.0,
      'payment_status' => 'paid',
    ),
    'items' => 
    array (
      0 => 
      array (
        'id' => 5,
        'order_date' => '2026-08-25',
        'product_id' => 1,
        'quantity' => 2,
        'unit_price' => 225000.0,
        'subtotal' => 450000.0,
      ),
      1 => 
      array (
        'id' => 6,
        'order_date' => '2026-08-25',
        'product_id' => 2,
        'quantity' => 5,
        'unit_price' => 260000.0,
        'subtotal' => 1300000.0,
      ),
      2 => 
      array (
        'id' => 7,
        'order_date' => '2026-08-25',
        'product_id' => 3,
        'quantity' => 2,
        'unit_price' => 257500.0,
        'subtotal' => 515000.0,
      ),
    ),
  ),
  2 => 
  array (
    'invoice' => 
    array (
      'id' => 3,
      'invoice_number' => 'INV-202609-001',
      'customer_name' => 'Ropa',
      'customer_email' => NULL,
      'issue_date' => '2026-09-07',
      'due_date' => '2026-09-08',
      'notes' => NULL,
      'total_amount' => 21100000.0,
      'payment_status' => 'unpaid',
    ),
    'items' => 
    array (
      0 => 
      array (
        'id' => 98,
        'order_date' => '2026-08-31',
        'product_id' => 21,
        'quantity' => 10,
        'unit_price' => 120000.0,
        'subtotal' => 1200000.0,
      ),
      1 => 
      array (
        'id' => 99,
        'order_date' => '2026-08-31',
        'product_id' => 24,
        'quantity' => 10,
        'unit_price' => 115000.0,
        'subtotal' => 1150000.0,
      ),
      2 => 
      array (
        'id' => 100,
        'order_date' => '2026-08-31',
        'product_id' => 13,
        'quantity' => 10,
        'unit_price' => 115000.0,
        'subtotal' => 1150000.0,
      ),
      3 => 
      array (
        'id' => 101,
        'order_date' => '2026-08-31',
        'product_id' => 14,
        'quantity' => 5,
        'unit_price' => 115000.0,
        'subtotal' => 575000.0,
      ),
      4 => 
      array (
        'id' => 102,
        'order_date' => '2026-08-31',
        'product_id' => 19,
        'quantity' => 10,
        'unit_price' => 170000.0,
        'subtotal' => 1700000.0,
      ),
      5 => 
      array (
        'id' => 103,
        'order_date' => '2026-08-31',
        'product_id' => 16,
        'quantity' => 5,
        'unit_price' => 140000.0,
        'subtotal' => 700000.0,
      ),
      6 => 
      array (
        'id' => 104,
        'order_date' => '2026-08-31',
        'product_id' => 15,
        'quantity' => 10,
        'unit_price' => 140000.0,
        'subtotal' => 1400000.0,
      ),
      7 => 
      array (
        'id' => 105,
        'order_date' => '2026-08-31',
        'product_id' => 33,
        'quantity' => 1,
        'unit_price' => 750000.0,
        'subtotal' => 750000.0,
      ),
      8 => 
      array (
        'id' => 106,
        'order_date' => '2026-08-31',
        'product_id' => 28,
        'quantity' => 1,
        'unit_price' => 500000.0,
        'subtotal' => 500000.0,
      ),
      9 => 
      array (
        'id' => 107,
        'order_date' => '2026-08-31',
        'product_id' => 22,
        'quantity' => 2,
        'unit_price' => 245000.0,
        'subtotal' => 490000.0,
      ),
      10 => 
      array (
        'id' => 108,
        'order_date' => '2026-08-31',
        'product_id' => 30,
        'quantity' => 2,
        'unit_price' => 360000.0,
        'subtotal' => 720000.0,
      ),
      11 => 
      array (
        'id' => 109,
        'order_date' => '2026-08-31',
        'product_id' => 32,
        'quantity' => 1,
        'unit_price' => 420000.0,
        'subtotal' => 420000.0,
      ),
      12 => 
      array (
        'id' => 110,
        'order_date' => '2026-08-31',
        'product_id' => 44,
        'quantity' => 1,
        'unit_price' => 300000.0,
        'subtotal' => 300000.0,
      ),
      13 => 
      array (
        'id' => 111,
        'order_date' => '2026-08-31',
        'product_id' => 45,
        'quantity' => 2,
        'unit_price' => 450000.0,
        'subtotal' => 900000.0,
      ),
      14 => 
      array (
        'id' => 112,
        'order_date' => '2026-09-02',
        'product_id' => 23,
        'quantity' => 1,
        'unit_price' => 400000.0,
        'subtotal' => 400000.0,
      ),
      15 => 
      array (
        'id' => 113,
        'order_date' => '2026-09-02',
        'product_id' => 22,
        'quantity' => 1,
        'unit_price' => 245000.0,
        'subtotal' => 245000.0,
      ),
      16 => 
      array (
        'id' => 114,
        'order_date' => '2026-09-02',
        'product_id' => 17,
        'quantity' => 3,
        'unit_price' => 300000.0,
        'subtotal' => 900000.0,
      ),
      17 => 
      array (
        'id' => 115,
        'order_date' => '2026-09-02',
        'product_id' => 46,
        'quantity' => 2,
        'unit_price' => 275000.0,
        'subtotal' => 550000.0,
      ),
      18 => 
      array (
        'id' => 116,
        'order_date' => '2026-09-02',
        'product_id' => 13,
        'quantity' => 5,
        'unit_price' => 115000.0,
        'subtotal' => 575000.0,
      ),
      19 => 
      array (
        'id' => 117,
        'order_date' => '2026-09-02',
        'product_id' => 21,
        'quantity' => 5,
        'unit_price' => 120000.0,
        'subtotal' => 600000.0,
      ),
      20 => 
      array (
        'id' => 118,
        'order_date' => '2026-09-02',
        'product_id' => 30,
        'quantity' => 1,
        'unit_price' => 360000.0,
        'subtotal' => 360000.0,
      ),
      21 => 
      array (
        'id' => 119,
        'order_date' => '2026-09-04',
        'product_id' => 31,
        'quantity' => 2,
        'unit_price' => 400000.0,
        'subtotal' => 800000.0,
      ),
      22 => 
      array (
        'id' => 120,
        'order_date' => '2026-09-04',
        'product_id' => 32,
        'quantity' => 1,
        'unit_price' => 420000.0,
        'subtotal' => 420000.0,
      ),
      23 => 
      array (
        'id' => 121,
        'order_date' => '2026-09-04',
        'product_id' => 18,
        'quantity' => 1,
        'unit_price' => 750000.0,
        'subtotal' => 750000.0,
      ),
      24 => 
      array (
        'id' => 122,
        'order_date' => '2026-09-04',
        'product_id' => 15,
        'quantity' => 10,
        'unit_price' => 140000.0,
        'subtotal' => 1400000.0,
      ),
      25 => 
      array (
        'id' => 123,
        'order_date' => '2026-09-04',
        'product_id' => 16,
        'quantity' => 5,
        'unit_price' => 140000.0,
        'subtotal' => 700000.0,
      ),
      26 => 
      array (
        'id' => 124,
        'order_date' => '2026-09-04',
        'product_id' => 21,
        'quantity' => 10,
        'unit_price' => 120000.0,
        'subtotal' => 1200000.0,
      ),
      27 => 
      array (
        'id' => 125,
        'order_date' => '2026-09-04',
        'product_id' => 22,
        'quantity' => 1,
        'unit_price' => 245000.0,
        'subtotal' => 245000.0,
      ),
    ),
  ),
  3 => 
  array (
    'invoice' => 
    array (
      'id' => 4,
      'invoice_number' => 'INV-202609-002',
      'customer_name' => 'Paisal',
      'customer_email' => NULL,
      'issue_date' => '2026-09-07',
      'due_date' => '2026-09-08',
      'notes' => NULL,
      'total_amount' => 14700000.0,
      'payment_status' => 'unpaid',
    ),
    'items' => 
    array (
      0 => 
      array (
        'id' => 157,
        'order_date' => '2026-09-07',
        'product_id' => 47,
        'quantity' => 40,
        'unit_price' => 75000.0,
        'subtotal' => 3000000.0,
      ),
      1 => 
      array (
        'id' => 158,
        'order_date' => '2026-09-07',
        'product_id' => 48,
        'quantity' => 40,
        'unit_price' => 35000.0,
        'subtotal' => 1400000.0,
      ),
      2 => 
      array (
        'id' => 159,
        'order_date' => '2026-09-07',
        'product_id' => 49,
        'quantity' => 40,
        'unit_price' => 95000.0,
        'subtotal' => 3800000.0,
      ),
      3 => 
      array (
        'id' => 160,
        'order_date' => '2026-09-07',
        'product_id' => 51,
        'quantity' => 1,
        'unit_price' => 1300000.0,
        'subtotal' => 1300000.0,
      ),
      4 => 
      array (
        'id' => 161,
        'order_date' => '2026-09-07',
        'product_id' => 52,
        'quantity' => 1,
        'unit_price' => 1400000.0,
        'subtotal' => 1400000.0,
      ),
      5 => 
      array (
        'id' => 162,
        'order_date' => '2026-09-07',
        'product_id' => 50,
        'quantity' => 2,
        'unit_price' => 1900000.0,
        'subtotal' => 3800000.0,
      ),
    ),
  ),
  4 => 
  array (
    'invoice' => 
    array (
      'id' => 5,
      'invoice_number' => 'INV-202609-003',
      'customer_name' => 'Pacon',
      'customer_email' => NULL,
      'issue_date' => '2026-09-07',
      'due_date' => '2026-09-21',
      'notes' => NULL,
      'total_amount' => 26185000.0,
      'payment_status' => 'unpaid',
    ),
    'items' => 
    array (
      0 => 
      array (
        'id' => 149,
        'order_date' => '2026-08-31',
        'product_id' => 54,
        'quantity' => 1,
        'unit_price' => 365000.0,
        'subtotal' => 365000.0,
      ),
      1 => 
      array (
        'id' => 150,
        'order_date' => '2026-08-31',
        'product_id' => 3,
        'quantity' => 1,
        'unit_price' => 240000.0,
        'subtotal' => 240000.0,
      ),
      2 => 
      array (
        'id' => 151,
        'order_date' => '2026-09-01',
        'product_id' => 16,
        'quantity' => 10,
        'unit_price' => 140000.0,
        'subtotal' => 1400000.0,
      ),
      3 => 
      array (
        'id' => 152,
        'order_date' => '2026-09-01',
        'product_id' => 22,
        'quantity' => 2,
        'unit_price' => 245000.0,
        'subtotal' => 490000.0,
      ),
      4 => 
      array (
        'id' => 153,
        'order_date' => '2026-09-02',
        'product_id' => 3,
        'quantity' => 1,
        'unit_price' => 240000.0,
        'subtotal' => 240000.0,
      ),
      5 => 
      array (
        'id' => 154,
        'order_date' => '2026-09-04',
        'product_id' => 32,
        'quantity' => 20,
        'unit_price' => 420000.0,
        'subtotal' => 8400000.0,
      ),
      6 => 
      array (
        'id' => 155,
        'order_date' => '2026-09-04',
        'product_id' => 33,
        'quantity' => 20,
        'unit_price' => 750000.0,
        'subtotal' => 15000000.0,
      ),
      7 => 
      array (
        'id' => 156,
        'order_date' => '2026-08-31',
        'product_id' => 53,
        'quantity' => 1,
        'unit_price' => 50000.0,
        'subtotal' => 50000.0,
      ),
    ),
  ),
  5 => 
  array (
    'invoice' => 
    array (
      'id' => 6,
      'invoice_number' => 'INV-202609-004',
      'customer_name' => 'Aul',
      'customer_email' => NULL,
      'issue_date' => '2026-09-21',
      'due_date' => '2026-10-05',
      'notes' => NULL,
      'total_amount' => 22625000.0,
      'payment_status' => 'unpaid',
    ),
    'items' => 
    array (
      0 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 163,
        'quantity' => 1,
        'unit_price' => 275000.0,
        'subtotal' => 275000.0,
      ),
      1 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      2 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 166,
        'quantity' => 1,
        'unit_price' => 375000.0,
        'subtotal' => 375000.0,
      ),
      3 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      4 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 375000.0,
        'subtotal' => 375000.0,
      ),
      5 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      6 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 375000.0,
        'subtotal' => 375000.0,
      ),
      7 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      8 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 375000.0,
        'subtotal' => 375000.0,
      ),
      9 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      10 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 650000.0,
        'subtotal' => 650000.0,
      ),
      11 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      12 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 650000.0,
        'subtotal' => 650000.0,
      ),
      13 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      14 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 650000.0,
        'subtotal' => 650000.0,
      ),
      15 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      16 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 630000.0,
        'subtotal' => 630000.0,
      ),
      17 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      18 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 675000.0,
        'subtotal' => 675000.0,
      ),
      19 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      20 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 650000.0,
        'subtotal' => 650000.0,
      ),
      21 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      22 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 163,
        'quantity' => 1,
        'unit_price' => 275000.0,
        'subtotal' => 275000.0,
      ),
      23 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      24 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 150000.0,
        'subtotal' => 150000.0,
      ),
      25 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      26 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 650000.0,
        'subtotal' => 650000.0,
      ),
      27 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      28 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 425000.0,
        'subtotal' => 425000.0,
      ),
      29 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      30 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 425000.0,
        'subtotal' => 425000.0,
      ),
      31 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      32 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 120000.0,
        'subtotal' => 120000.0,
      ),
      33 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      34 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 625000.0,
        'subtotal' => 625000.0,
      ),
      35 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      36 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 115000.0,
        'subtotal' => 115000.0,
      ),
      37 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      38 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 650000.0,
        'subtotal' => 650000.0,
      ),
      39 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      40 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 360000.0,
        'subtotal' => 360000.0,
      ),
      41 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      42 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 685000.0,
        'subtotal' => 685000.0,
      ),
      43 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      44 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 685000.0,
        'subtotal' => 685000.0,
      ),
      45 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      46 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 650000.0,
        'subtotal' => 650000.0,
      ),
      47 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      48 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 650000.0,
        'subtotal' => 650000.0,
      ),
      49 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      50 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 650000.0,
        'subtotal' => 650000.0,
      ),
      51 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      52 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 585000.0,
        'subtotal' => 585000.0,
      ),
      53 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      54 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 585000.0,
        'subtotal' => 585000.0,
      ),
      55 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      56 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 585000.0,
        'subtotal' => 585000.0,
      ),
      57 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      58 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 650000.0,
        'subtotal' => 650000.0,
      ),
      59 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      60 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 650000.0,
        'subtotal' => 650000.0,
      ),
      61 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      62 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 650000.0,
        'subtotal' => 650000.0,
      ),
      63 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      64 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 165,
        'quantity' => 1,
        'unit_price' => 170000.0,
        'subtotal' => 170000.0,
      ),
      65 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      66 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 525000.0,
        'subtotal' => 525000.0,
      ),
      67 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      68 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 490000.0,
        'subtotal' => 490000.0,
      ),
      69 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      70 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 550000.0,
        'subtotal' => 550000.0,
      ),
      71 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      72 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 625000.0,
        'subtotal' => 625000.0,
      ),
      73 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      74 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 625000.0,
        'subtotal' => 625000.0,
      ),
      75 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      76 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 565000.0,
        'subtotal' => 565000.0,
      ),
      77 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      78 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 585000.0,
        'subtotal' => 585000.0,
      ),
      79 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      80 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 590000.0,
        'subtotal' => 590000.0,
      ),
      81 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      82 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 685000.0,
        'subtotal' => 685000.0,
      ),
      83 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      84 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 490000.0,
        'subtotal' => 490000.0,
      ),
      85 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      86 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 550000.0,
        'subtotal' => 550000.0,
      ),
      87 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      88 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 550000.0,
        'subtotal' => 550000.0,
      ),
      89 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      90 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 625000.0,
        'subtotal' => 625000.0,
      ),
      91 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      92 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 100000.0,
        'subtotal' => 100000.0,
      ),
      93 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      94 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 90000.0,
        'subtotal' => 90000.0,
      ),
      95 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      96 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 95000.0,
        'subtotal' => 95000.0,
      ),
      97 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      98 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 455000.0,
        'subtotal' => 455000.0,
      ),
      99 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      100 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 390000.0,
        'subtotal' => 390000.0,
      ),
      101 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      102 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 26,
        'quantity' => 1,
        'unit_price' => 665000.0,
        'subtotal' => 665000.0,
      ),
      103 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      104 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 585000.0,
        'subtotal' => 585000.0,
      ),
      105 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      106 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 640000.0,
        'subtotal' => 640000.0,
      ),
      107 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      108 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 145000.0,
        'subtotal' => 145000.0,
      ),
      109 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      110 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 85000.0,
        'subtotal' => 85000.0,
      ),
      111 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      112 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 425000.0,
        'subtotal' => 425000.0,
      ),
      113 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      114 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 260000.0,
        'subtotal' => 260000.0,
      ),
      115 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      116 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 550000.0,
        'subtotal' => 550000.0,
      ),
      117 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      118 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 20,
        'quantity' => 1,
        'unit_price' => 185000.0,
        'subtotal' => 185000.0,
      ),
      119 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      120 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 225000.0,
        'subtotal' => 225000.0,
      ),
      121 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      122 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 420000.0,
        'subtotal' => 420000.0,
      ),
      123 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      124 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 490000.0,
        'subtotal' => 490000.0,
      ),
      125 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      126 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 425000.0,
        'subtotal' => 425000.0,
      ),
      127 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      128 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 490000.0,
        'subtotal' => 490000.0,
      ),
      129 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      130 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 460000.0,
        'subtotal' => 460000.0,
      ),
      131 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      132 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 525000.0,
        'subtotal' => 525000.0,
      ),
      133 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      134 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 625000.0,
        'subtotal' => 625000.0,
      ),
      135 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      136 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 390000.0,
        'subtotal' => 390000.0,
      ),
      137 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      138 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 585000.0,
        'subtotal' => 585000.0,
      ),
      139 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      140 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 685000.0,
        'subtotal' => 685000.0,
      ),
      141 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      142 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 640000.0,
        'subtotal' => 640000.0,
      ),
      143 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      144 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 585000.0,
        'subtotal' => 585000.0,
      ),
      145 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      146 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 585000.0,
        'subtotal' => 585000.0,
      ),
      147 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      148 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 164,
        'quantity' => 1,
        'unit_price' => 65000.0,
        'subtotal' => 65000.0,
      ),
      149 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
      150 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 157,
        'quantity' => 1,
        'unit_price' => 550000.0,
        'subtotal' => 550000.0,
      ),
      151 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 92,
        'quantity' => 1,
        'unit_price' => 25000.0,
        'subtotal' => 25000.0,
      ),
    ),
  ),
  6 => 
  array (
    'invoice' => 
    array (
      'id' => 7,
      'invoice_number' => 'INV-202609-005',
      'customer_name' => 'Ropa',
      'customer_email' => NULL,
      'issue_date' => '2026-09-21',
      'due_date' => '2026-10-03',
      'notes' => NULL,
      'total_amount' => 25310000.0,
      'payment_status' => 'unpaid',
    ),
    'items' => 
    array (
      0 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 161,
        'quantity' => 10,
        'unit_price' => 140000.0,
        'subtotal' => 1400000.0,
      ),
      1 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 162,
        'quantity' => 10,
        'unit_price' => 140000.0,
        'subtotal' => 1400000.0,
      ),
      2 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 21,
        'quantity' => 10,
        'unit_price' => 120000.0,
        'subtotal' => 1200000.0,
      ),
      3 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 24,
        'quantity' => 5,
        'unit_price' => 115000.0,
        'subtotal' => 575000.0,
      ),
      4 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 13,
        'quantity' => 10,
        'unit_price' => 115000.0,
        'subtotal' => 1150000.0,
      ),
      5 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 20,
        'quantity' => 1,
        'unit_price' => 185000.0,
        'subtotal' => 185000.0,
      ),
      6 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 35,
        'quantity' => 1,
        'unit_price' => 1050000.0,
        'subtotal' => 1050000.0,
      ),
      7 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 30,
        'quantity' => 1,
        'unit_price' => 360000.0,
        'subtotal' => 360000.0,
      ),
      8 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 22,
        'quantity' => 3,
        'unit_price' => 245000.0,
        'subtotal' => 735000.0,
      ),
      9 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 36,
        'quantity' => 5,
        'unit_price' => 35000.0,
        'subtotal' => 175000.0,
      ),
      10 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 93,
        'quantity' => 6,
        'unit_price' => 75000.0,
        'subtotal' => 450000.0,
      ),
      11 => 
      array (
        'order_date' => '2026-09-21',
        'product_id' => 160,
        'quantity' => 6,
        'unit_price' => 60000.0,
        'subtotal' => 360000.0,
      ),
      12 => 
      array (
        'order_date' => '2026-09-22',
        'product_id' => 21,
        'quantity' => 10,
        'unit_price' => 120000.0,
        'subtotal' => 1200000.0,
      ),
      13 => 
      array (
        'order_date' => '2026-09-22',
        'product_id' => 31,
        'quantity' => 1,
        'unit_price' => 400000.0,
        'subtotal' => 400000.0,
      ),
      14 => 
      array (
        'order_date' => '2026-09-22',
        'product_id' => 17,
        'quantity' => 5,
        'unit_price' => 300000.0,
        'subtotal' => 1500000.0,
      ),
      15 => 
      array (
        'order_date' => '2026-09-22',
        'product_id' => 103,
        'quantity' => 1,
        'unit_price' => 450000.0,
        'subtotal' => 450000.0,
      ),
      16 => 
      array (
        'order_date' => '2026-09-23',
        'product_id' => 25,
        'quantity' => 2,
        'unit_price' => 250000.0,
        'subtotal' => 500000.0,
      ),
      17 => 
      array (
        'order_date' => '2026-09-23',
        'product_id' => 33,
        'quantity' => 1,
        'unit_price' => 750000.0,
        'subtotal' => 750000.0,
      ),
      18 => 
      array (
        'order_date' => '2026-09-23',
        'product_id' => 32,
        'quantity' => 1,
        'unit_price' => 420000.0,
        'subtotal' => 420000.0,
      ),
      19 => 
      array (
        'order_date' => '2026-09-24',
        'product_id' => 21,
        'quantity' => 10,
        'unit_price' => 120000.0,
        'subtotal' => 1200000.0,
      ),
      20 => 
      array (
        'order_date' => '2026-09-24',
        'product_id' => 13,
        'quantity' => 10,
        'unit_price' => 115000.0,
        'subtotal' => 1150000.0,
      ),
      21 => 
      array (
        'order_date' => '2026-09-24',
        'product_id' => 19,
        'quantity' => 5,
        'unit_price' => 170000.0,
        'subtotal' => 850000.0,
      ),
      22 => 
      array (
        'order_date' => '2026-09-24',
        'product_id' => 102,
        'quantity' => 5,
        'unit_price' => 300000.0,
        'subtotal' => 1500000.0,
      ),
      23 => 
      array (
        'order_date' => '2026-09-24',
        'product_id' => 103,
        'quantity' => 1,
        'unit_price' => 450000.0,
        'subtotal' => 450000.0,
      ),
      24 => 
      array (
        'order_date' => '2026-09-24',
        'product_id' => 39,
        'quantity' => 1,
        'unit_price' => 1000000.0,
        'subtotal' => 1000000.0,
      ),
      25 => 
      array (
        'order_date' => '2026-09-25',
        'product_id' => 32,
        'quantity' => 1,
        'unit_price' => 420000.0,
        'subtotal' => 420000.0,
      ),
      26 => 
      array (
        'order_date' => '2026-09-25',
        'product_id' => 33,
        'quantity' => 1,
        'unit_price' => 750000.0,
        'subtotal' => 750000.0,
      ),
      27 => 
      array (
        'order_date' => '2026-09-25',
        'product_id' => 23,
        'quantity' => 1,
        'unit_price' => 400000.0,
        'subtotal' => 400000.0,
      ),
      28 => 
      array (
        'order_date' => '2026-09-25',
        'product_id' => 21,
        'quantity' => 5,
        'unit_price' => 120000.0,
        'subtotal' => 600000.0,
      ),
      29 => 
      array (
        'order_date' => '2026-09-25',
        'product_id' => 24,
        'quantity' => 5,
        'unit_price' => 115000.0,
        'subtotal' => 575000.0,
      ),
      30 => 
      array (
        'order_date' => '2026-09-25',
        'product_id' => 161,
        'quantity' => 5,
        'unit_price' => 140000.0,
        'subtotal' => 700000.0,
      ),
      31 => 
      array (
        'order_date' => '2026-09-25',
        'product_id' => 162,
        'quantity' => 5,
        'unit_price' => 140000.0,
        'subtotal' => 700000.0,
      ),
      32 => 
      array (
        'order_date' => '2026-09-25',
        'product_id' => 13,
        'quantity' => 5,
        'unit_price' => 115000.0,
        'subtotal' => 575000.0,
      ),
      33 => 
      array (
        'order_date' => '2026-09-25',
        'product_id' => 158,
        'quantity' => 2,
        'unit_price' => 30000.0,
        'subtotal' => 60000.0,
      ),
      34 => 
      array (
        'order_date' => '2026-09-25',
        'product_id' => 159,
        'quantity' => 4,
        'unit_price' => 30000.0,
        'subtotal' => 120000.0,
      ),
    ),
  ),
);

        foreach ($invoicesData as $data) {
            $invoice = Invoice::firstOrCreate(["invoice_number" => $data["invoice"]["invoice_number"]], $data["invoice"]);
            foreach ($data["items"] as $item) {
                $item["invoice_id"] = $invoice->id;
                unset($item['id']);
                InvoiceItem::firstOrCreate([
                    "invoice_id" => $invoice->id,
                    "product_id" => $item["product_id"],
                    "order_date" => $item["order_date"],
                    "unit_price" => $item["unit_price"],
                    "quantity"   => $item["quantity"],
                ], $item);
            }
        }
    }
}
