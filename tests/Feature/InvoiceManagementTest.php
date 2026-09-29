<?php

namespace Tests\Feature;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InvoiceManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_view_invoice_index_with_status_counts(): void
    {
        Invoice::factory()->create([
            'invoice_number' => 'INV-TEST-001',
            'customer_name' => 'Tommy',
            'payment_status' => 'paid',
            'issue_date' => '2026-08-25',
            'due_date' => '2026-09-25',
        ]);

        Invoice::factory()->create([
            'invoice_number' => 'INV-TEST-002',
            'customer_name' => 'Paisal',
            'payment_status' => 'unpaid',
            'issue_date' => '2026-09-07',
            'due_date' => '2026-09-08',
        ]);

        $response = $this->get(route('invoices.index'));

        $response->assertStatus(200);
        $response->assertSee('Tommy');
        $response->assertSee('Paisal');
        $response->assertViewHas('statusCounts', function ($counts) {
            return $counts['all'] === 2 && $counts['paid'] === 1 && $counts['unpaid'] === 1;
        });
    }

    public function test_changing_status_to_paid_preserves_invoice_and_redirects_with_feedback(): void
    {
        $invoice = Invoice::factory()->create([
            'invoice_number' => 'INV-TEST-003',
            'customer_name' => 'Pelanggan Test',
            'payment_status' => 'unpaid',
            'issue_date' => '2026-09-07',
            'due_date' => '2026-09-08',
        ]);

        $response = $this->patch(route('invoices.update-status', $invoice->id), [
            'payment_status' => 'paid',
        ]);

        $response->assertRedirect(route('invoices.show', $invoice->id));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('invoices', [
            'id' => $invoice->id,
            'payment_status' => 'paid',
        ]);
    }

    public function test_csrf_token_endpoint_returns_valid_json(): void
    {
        $response = $this->get(route('csrf.token'));

        $response->assertStatus(200);
        $response->assertJsonStructure(['csrf_token', 'status', 'timestamp']);
    }

    public function test_can_create_invoice_with_multiple_items(): void
    {
        $products = Product::factory()->count(5)->create();

        $items = [];
        $expectedTotal = 0;
        foreach ($products as $index => $prod) {
            $qty = $index + 1;
            $items[] = [
                'order_date' => '2026-09-29',
                'product_id' => $prod->id,
                'quantity'   => $qty,
            ];
            $expectedTotal += ($qty * $prod->unit_price);
        }

        $response = $this->post(route('invoices.store'), [
            'customer_name'  => 'Pelanggan Banyak Item',
            'issue_date'     => '2026-09-29',
            'due_date'       => '2026-10-15',
            'payment_status' => 'unpaid',
            'notes'          => 'Testing invoice with multiple items',
            'items'          => $items,
        ]);

        $this->assertDatabaseHas('invoices', [
            'customer_name' => 'Pelanggan Banyak Item',
            'total_amount'  => $expectedTotal,
        ]);

        $invoice = Invoice::where('customer_name', 'Pelanggan Banyak Item')->first();
        $this->assertCount(5, $invoice->items);
        $response->assertRedirect(route('invoices.show', $invoice->id));
    }

    public function test_can_create_invoice_with_large_payload_via_items_json(): void
    {
        $products = Product::take(50)->get();
        if ($products->count() < 10) {
            $products = Product::factory()->count(50)->create();
        }

        $items = [];
        $expectedTotal = 0;
        foreach ($products as $index => $prod) {
            $qty = ($index % 5) + 1;
            $items[] = [
                'order_date' => '2026-09-29',
                'product_id' => $prod->id,
                'quantity'   => $qty,
            ];
            $expectedTotal += ($qty * $prod->unit_price);
        }

        $response = $this->post(route('invoices.store'), [
            'customer_name'  => 'Pelanggan 50 Items JSON',
            'issue_date'     => '2026-09-29',
            'due_date'       => '2026-10-15',
            'payment_status' => 'unpaid',
            'notes'          => 'Testing huge invoice items list',
            'items_json'     => json_encode($items),
        ]);

        $this->assertDatabaseHas('invoices', [
            'customer_name' => 'Pelanggan 50 Items JSON',
            'total_amount'  => $expectedTotal,
        ]);

        $invoice = Invoice::where('customer_name', 'Pelanggan 50 Items JSON')->first();
        $this->assertCount(count($items), $invoice->items);
        $response->assertRedirect(route('invoices.show', $invoice->id));
    }
}
