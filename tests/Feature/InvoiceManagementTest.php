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
}
