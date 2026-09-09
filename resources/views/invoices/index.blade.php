@extends('layouts.app')

@section('content')
<div class="space-y-6">
    
    <!-- Page Header & Action Button -->
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200/80 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Invoices & Financial Records</h1>
            <p class="text-sm text-slate-500 mt-1">Manage customer billing, track payment status, and generate exportable invoices.</p>
        </div>

        <div class="flex items-center space-x-3">
            <a href="{{ route('invoices.create') }}" 
               class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white font-bold text-sm rounded-xl transition shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
               <span class="mr-2">➕</span> Create New Invoice
            </a>
        </div>
    </div>

    <!-- Filter & Search Controls -->
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200/80">
        <form method="GET" action="{{ route('invoices.index') }}" class="flex flex-col md:flex-row items-center justify-between gap-4">
            
            <!-- Search Keyword -->
            <div class="w-full md:w-1/2">
                <label class="block text-xs font-bold text-slate-600 uppercase mb-1">Search Invoice</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search Invoice #, Customer Name or Email..."
                       class="w-full px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Status Filter Pills -->
            <div class="w-full md:w-auto flex items-center space-x-2">
                <a href="{{ route('invoices.index') }}" 
                   class="px-3.5 py-2 rounded-xl text-xs font-bold transition {{ !request('status') ? 'bg-slate-900 text-white shadow' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                   All Statuses
                </a>
                <a href="{{ route('invoices.index', ['status' => 'paid']) }}" 
                   class="px-3.5 py-2 rounded-xl text-xs font-bold transition {{ request('status') === 'paid' ? 'bg-emerald-600 text-white shadow' : 'bg-emerald-50 text-emerald-700 hover:bg-emerald-100' }}">
                   Paid
                </a>
                <a href="{{ route('invoices.index', ['status' => 'unpaid']) }}" 
                   class="px-3.5 py-2 rounded-xl text-xs font-bold transition {{ request('status') === 'unpaid' ? 'bg-amber-600 text-white shadow' : 'bg-amber-50 text-amber-700 hover:bg-amber-100' }}">
                   Unpaid
                </a>
                <a href="{{ route('invoices.index', ['status' => 'overdue']) }}" 
                   class="px-3.5 py-2 rounded-xl text-xs font-bold transition {{ request('status') === 'overdue' ? 'bg-rose-600 text-white shadow' : 'bg-rose-50 text-rose-700 hover:bg-rose-100' }}">
                   Overdue
                </a>
            </div>

        </form>
    </div>

    <!-- Invoices Data Table -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600">
                <thead class="bg-slate-50 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-200">
                    <tr>
                        <th class="py-3.5 px-6">Invoice #</th>
                        <th class="py-3.5 px-6">Customer</th>
                        <th class="py-3.5 px-6">Issue Date</th>
                        <th class="py-3.5 px-6">Due Date</th>
                        <th class="py-3.5 px-6 text-center">Items & Qty</th>
                        <th class="py-3.5 px-6 text-right">Total Amount (Rp)</th>
                        <th class="py-3.5 px-6 text-center">Status</th>
                        <th class="py-3.5 px-6 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($invoices as $invoice)
                        <tr class="hover:bg-slate-50/80 transition">
                            <td class="py-4 px-6 font-mono font-bold text-xs text-blue-600">
                                <a href="{{ route('invoices.show', $invoice->id) }}" class="hover:underline">
                                    {{ $invoice->invoice_number }}
                                </a>
                            </td>
                            <td class="py-4 px-6">
                                <span class="font-bold text-slate-900 block">{{ $invoice->customer_name }}</span>
                                <span class="text-xs text-slate-400">{{ $invoice->customer_email }}</span>
                            </td>
                            <td class="py-4 px-6 text-xs text-slate-600 font-medium">
                                {{ $invoice->issue_date->format('d M Y') }}
                            </td>
                            <td class="py-4 px-6 text-xs text-slate-600 font-medium">
                                {{ $invoice->due_date->format('d M Y') }}
                            </td>
                            <td class="py-4 px-6 text-center">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-slate-100 text-slate-800">
                                    {{ $invoice->total_items_count }} items ({{ $invoice->total_quantity_sum }} qty)
                                </span>
                            </td>
                            <td class="py-4 px-6 text-right font-extrabold text-slate-900">
                                Rp {{ number_format($invoice->total_amount, 0, ',', '.') }}
                            </td>
                            <td class="py-4 px-6 text-center">
                                @if($invoice->payment_status === 'paid')
                                    <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-emerald-100 text-emerald-800">Paid</span>
                                @elseif($invoice->payment_status === 'unpaid')
                                    <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-800">Unpaid</span>
                                @else
                                    <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-rose-100 text-rose-800">Overdue</span>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-center">
                                <div class="flex items-center justify-center space-x-2">
                                    <a href="{{ route('invoices.show', $invoice->id) }}" 
                                       class="px-2.5 py-1 bg-blue-50 hover:bg-blue-100 text-blue-600 rounded-lg text-xs font-bold transition">
                                       View & Print
                                    </a>

                                    <a href="{{ route('invoices.edit', $invoice->id) }}"
                                       class="px-2.5 py-1 bg-amber-50 hover:bg-amber-100 text-amber-600 rounded-lg text-xs font-bold transition">
                                       ✏️ Edit
                                    </a>

                                    <form method="POST" action="{{ route('invoices.destroy', $invoice->id) }}" 
                                          onsubmit="return confirm('Are you sure you want to delete invoice {{ $invoice->invoice_number }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-2.5 py-1 bg-rose-50 hover:bg-rose-100 text-rose-600 rounded-lg text-xs font-bold transition">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="py-8 text-center text-slate-400 text-sm">
                                No invoices found. Click "+ Create New Invoice" to start billing.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($invoices->hasPages())
            <div class="p-4 border-t border-slate-100 bg-slate-50">
                {{ $invoices->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
