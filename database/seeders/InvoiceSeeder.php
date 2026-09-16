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
);

        foreach ($invoicesData as $data) {
            $invoice = Invoice::updateOrCreate(["id" => $data["invoice"]["id"]], $data["invoice"]);
            foreach ($data["items"] as $item) {
                $item["invoice_id"] = $invoice->id;
                InvoiceItem::updateOrCreate(["id" => $item["id"]], $item);
            }
        }
    }
}
