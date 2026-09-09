<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $query = Invoice::with('items.product');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('invoice_number', 'LIKE', "%{$search}%")
                  ->orWhere('customer_name', 'LIKE', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('payment_status', $request->status);
        }

        $invoices = $query->orderBy('issue_date', 'desc')->orderBy('id', 'desc')->paginate(10)->withQueryString();

        return view('invoices.index', compact('invoices'));
    }

    public function create()
    {
        $products = Product::where('status', 'active')->orderBy('name', 'asc')->get();
        $suggestedNumber = Invoice::generateInvoiceNumber();

        return view('invoices.create', compact('products', 'suggestedNumber'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name'           => 'nullable|string|max:255',
            'issue_date'              => 'required|date',
            'due_date'                => 'required|date|after_or_equal:issue_date',
            'notes'                   => 'nullable|string',
            'payment_status'          => 'required|in:paid,unpaid,overdue',
            'items'                   => 'required|array|min:1',
            'items.*.order_date'      => 'required|date',
            'items.*.product_id'      => 'required|exists:products,id',
            'items.*.quantity'        => 'required|integer|min:1',
        ]);

        $customerName = trim($validated['customer_name'] ?? '');
        if (empty($customerName)) {
            $customerName = 'Pelanggan Umum';
        }

        DB::transaction(function () use ($validated, $customerName, &$invoice) {
            $invoiceNumber = Invoice::generateInvoiceNumber($validated['issue_date']);

            $invoice = Invoice::create([
                'invoice_number' => $invoiceNumber,
                'customer_name' => $customerName,
                'customer_email' => null,
                'issue_date' => $validated['issue_date'],
                'due_date' => $validated['due_date'],
                'notes' => $validated['notes'] ?? null,
                'payment_status' => $validated['payment_status'],
                'total_amount' => 0,
            ]);

            $totalAmount = 0;

            foreach ($validated['items'] as $itemData) {
                $product = Product::findOrFail($itemData['product_id']);
                $qty = (int) $itemData['quantity'];
                $unitPrice = (float) $product->unit_price;
                $subtotal = $qty * $unitPrice;
                $totalAmount += $subtotal;

                InvoiceItem::create([
                    'invoice_id' => $invoice->id,
                    'order_date' => $itemData['order_date'],
                    'product_id' => $product->id,
                    'quantity'   => $qty,
                    'unit_price' => $unitPrice,
                    'subtotal'   => $subtotal,
                ]);
            }

            $invoice->update(['total_amount' => $totalAmount]);
        });

        return redirect()->route('invoices.show', $invoice->id)
            ->with('success', 'Invoice ' . $invoice->invoice_number . ' created successfully!');
    }

    public function show(Invoice $invoice)
    {
        $invoice->load('items.product');

        // Group items by order_date, sorted ascending. Items with no order_date go last.
        $groupedItems = $invoice->items
            ->sortBy(fn($item) => $item->order_date ?? '9999-99-99')
            ->groupBy(fn($item) => $item->order_date
                ? $item->order_date->format('d/m/Y')
                : '-'
            );

        return view('invoices.show', compact('invoice', 'groupedItems'));
    }

    public function edit(Invoice $invoice)
    {
        $invoice->load('items.product');
        $products = Product::where('status', 'active')->orderBy('name', 'asc')->get();

        // Pre-map items for Alpine.js (avoid Blade closure parsing issues)
        $existingItems = $invoice->items->map(function ($item) {
            return [
                'product_id'  => $item->product_id,
                'displayText' => ($item->product->name ?? 'Custom Item') . ' (' . ($item->product->product_code ?? '') . ')',
                'open'        => false,
                'order_date'  => $item->order_date ? $item->order_date->format('Y-m-d') : '',
                'quantity'    => $item->quantity,
                'unit_price'  => (float) $item->unit_price,
                'subtotal'    => (float) $item->subtotal,
            ];
        })->values();

        return view('invoices.edit', compact('invoice', 'products', 'existingItems'));
    }

    public function update(Request $request, Invoice $invoice)
    {
        $validated = $request->validate([
            'customer_name'           => 'nullable|string|max:255',
            'issue_date'              => 'required|date',
            'due_date'                => 'required|date|after_or_equal:issue_date',
            'notes'                   => 'nullable|string',
            'payment_status'          => 'required|in:paid,unpaid,overdue',
            'items'                   => 'required|array|min:1',
            'items.*.order_date'      => 'required|date',
            'items.*.product_id'      => 'required|exists:products,id',
            'items.*.quantity'        => 'required|integer|min:1',
        ]);

        $customerName = trim($validated['customer_name'] ?? '');
        if (empty($customerName)) {
            $customerName = 'Pelanggan Umum';
        }

        DB::transaction(function () use ($validated, $customerName, $invoice) {
            // Update invoice header
            $invoice->update([
                'customer_name'  => $customerName,
                'issue_date'     => $validated['issue_date'],
                'due_date'       => $validated['due_date'],
                'notes'          => $validated['notes'] ?? null,
                'payment_status' => $validated['payment_status'],
            ]);

            // Remove all existing items and re-create from form
            $invoice->items()->delete();

            $totalAmount = 0;

            foreach ($validated['items'] as $itemData) {
                $product   = Product::findOrFail($itemData['product_id']);
                $qty       = (int) $itemData['quantity'];
                $unitPrice = (float) $product->unit_price;
                $subtotal  = $qty * $unitPrice;
                $totalAmount += $subtotal;

                InvoiceItem::create([
                    'invoice_id' => $invoice->id,
                    'order_date' => $itemData['order_date'],
                    'product_id' => $product->id,
                    'quantity'   => $qty,
                    'unit_price' => $unitPrice,
                    'subtotal'   => $subtotal,
                ]);
            }

            $invoice->update(['total_amount' => $totalAmount]);
        });

        return redirect()->route('invoices.show', $invoice->id)
            ->with('success', 'Invoice ' . $invoice->invoice_number . ' updated successfully!');
    }


    public function updateStatus(Request $request, Invoice $invoice)
    {
        $request->validate([
            'payment_status' => 'required|in:paid,unpaid,overdue',
        ]);


        $invoice->update(['payment_status' => $request->payment_status]);

        return back()->with('success', 'Invoice ' . $invoice->invoice_number . ' status updated to ' . ucfirst($request->payment_status) . '!');
    }

    public function destroy(Invoice $invoice)
    {
        $invNum = $invoice->invoice_number;
        $invoice->delete();

        return redirect()->route('invoices.index')
            ->with('success', 'Invoice ' . $invNum . ' deleted successfully!');
    }
}
