@extends('layouts.app')

@section('content')
<div class="space-y-6">
    
    <!-- Page Header & Action Button -->
    <div class="bg-white rounded-2xl p-4 sm:p-6 shadow-sm border border-slate-200/80 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-xl sm:text-2xl font-bold text-slate-900 tracking-tight">Invoices & Financial Records</h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-1">Manage customer billing, track payment status, and generate exportable invoices.</p>
        </div>

        <div class="w-full sm:w-auto">
            <a href="{{ route('invoices.create') }}" 
               class="flex sm:inline-flex items-center justify-center px-5 py-2.5 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white font-bold text-sm rounded-xl transition shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
               + Create New Invoice
            </a>
        </div>
    </div>

    <!-- Filter & Search Controls -->
    <div class="bg-white rounded-2xl p-4 sm:p-6 shadow-sm border border-slate-200/80">
        <form method="GET" action="{{ route('invoices.index') }}" class="space-y-3">
            
            <!-- Search Keyword -->
            <div class="w-full">
                <label class="block text-xs font-bold text-slate-600 uppercase mb-1">Search Invoice</label>
                <div class="flex gap-2">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search Invoice #, Customer Name or Email..."
                           class="flex-1 min-w-0 px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button type="submit" class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-white text-xs font-bold rounded-xl transition shrink-0">
                        Search
                    </button>
                </div>
            </div>

            <!-- Status Filter Pills with Count Badges -->
            <div class="flex flex-wrap items-center gap-2">
                <a href="{{ route('invoices.index') }}" 
                   class="px-3.5 py-2 rounded-xl text-xs font-bold transition flex items-center space-x-1.5 {{ !request('status') ? 'bg-slate-900 text-white shadow' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                   <span>All Statuses</span>
                   <span class="px-1.5 py-0.5 rounded-full text-[10px] font-mono {{ !request('status') ? 'bg-slate-700 text-slate-200' : 'bg-slate-200 text-slate-700' }}">
                       {{ $statusCounts['all'] ?? 0 }}
                   </span>
                </a>
                <a href="{{ route('invoices.index', ['status' => 'paid']) }}" 
                   class="px-3.5 py-2 rounded-xl text-xs font-bold transition flex items-center space-x-1.5 {{ request('status') === 'paid' ? 'bg-emerald-600 text-white shadow' : 'bg-emerald-50 text-emerald-700 hover:bg-emerald-100' }}">
                   <span>Paid</span>
                   <span class="px-1.5 py-0.5 rounded-full text-[10px] font-mono {{ request('status') === 'paid' ? 'bg-emerald-800 text-emerald-100' : 'bg-emerald-200 text-emerald-800' }}">
                       {{ $statusCounts['paid'] ?? 0 }}
                   </span>
                </a>
                <a href="{{ route('invoices.index', ['status' => 'unpaid']) }}" 
                   class="px-3.5 py-2 rounded-xl text-xs font-bold transition flex items-center space-x-1.5 {{ request('status') === 'unpaid' ? 'bg-amber-600 text-white shadow' : 'bg-amber-50 text-amber-700 hover:bg-amber-100' }}">
                   <span>Unpaid</span>
                   <span class="px-1.5 py-0.5 rounded-full text-[10px] font-mono {{ request('status') === 'unpaid' ? 'bg-amber-800 text-amber-100' : 'bg-amber-200 text-amber-800' }}">
                       {{ $statusCounts['unpaid'] ?? 0 }}
                   </span>
                </a>
                <a href="{{ route('invoices.index', ['status' => 'overdue']) }}" 
                   class="px-3.5 py-2 rounded-xl text-xs font-bold transition flex items-center space-x-1.5 {{ request('status') === 'overdue' ? 'bg-rose-600 text-white shadow' : 'bg-rose-50 text-rose-700 hover:bg-rose-100' }}">
                   <span>Overdue</span>
                   <span class="px-1.5 py-0.5 rounded-full text-[10px] font-mono {{ request('status') === 'overdue' ? 'bg-rose-800 text-rose-100' : 'bg-rose-200 text-rose-800' }}">
                       {{ $statusCounts['overdue'] ?? 0 }}
                   </span>
                </a>
            </div>

            @if(request('status') || request('search'))
                <div class="mt-3 pt-3 border-t border-slate-100 flex flex-wrap items-center justify-between gap-2 text-xs text-slate-600">
                    <div class="flex items-center space-x-2 font-medium">
                        <span class="text-slate-400">Filter Aktif:</span>
                        @if(request('status'))
                            <span class="px-2 py-0.5 rounded-md font-bold uppercase tracking-wider {{ request('status') === 'paid' ? 'bg-emerald-100 text-emerald-800' : (request('status') === 'unpaid' ? 'bg-amber-100 text-amber-800' : 'bg-rose-100 text-rose-800') }}">
                                Status: {{ request('status') }}
                            </span>
                        @endif
                        @if(request('search'))
                            <span class="px-2 py-0.5 rounded-md bg-blue-100 text-blue-800 font-bold">
                                Cari: "{{ request('search') }}"
                            </span>
                        @endif
                    </div>
                    <a href="{{ route('invoices.index') }}" class="text-blue-600 hover:text-blue-800 hover:underline font-bold flex items-center gap-1">
                        &times; Reset Filter (Tampilkan Semua {{ $statusCounts['all'] ?? '' }} Invoice)
                    </a>
                </div>
            @endif

        </form>
    </div>

    <!-- Invoices Data — Mobile Card View / Desktop Table -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden mobile-card-view">

        {{-- ── MOBILE CARDS (shown on < md) ── --}}
        <div class="mobile-cards p-3 space-y-3">
            @forelse($invoices as $invoice)
                <div class="invoice-mobile-card">
                    {{-- Top row: Invoice # + Status --}}
                    <div class="flex items-center justify-between mb-2">
                        <a href="{{ route('invoices.show', $invoice->id) }}" 
                           class="font-mono font-bold text-sm text-blue-600 hover:underline">
                            {{ $invoice->invoice_number }}
                        </a>
                        @if($invoice->payment_status === 'paid')
                            <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-emerald-100 text-emerald-800">Paid</span>
                        @elseif($invoice->payment_status === 'unpaid')
                            <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-800">Unpaid</span>
                        @else
                            <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-rose-100 text-rose-800">Overdue</span>
                        @endif
                    </div>

                    {{-- Customer --}}
                    <div class="mb-2">
                        <span class="font-bold text-slate-900 text-sm">{{ $invoice->customer_name }}</span>
                        @if($invoice->customer_email)
                            <span class="block text-xs text-slate-400">{{ $invoice->customer_email }}</span>
                        @endif
                    </div>

                    {{-- Dates & Items --}}
                    <div class="grid grid-cols-2 gap-2 text-xs text-slate-600 mb-3">
                        <div>
                            <span class="block text-slate-400 font-medium uppercase tracking-wide text-[10px] mb-0.5">Issue Date</span>
                            <span class="font-semibold">{{ $invoice->issue_date->format('d M Y') }}</span>
                        </div>
                        <div>
                            <span class="block text-slate-400 font-medium uppercase tracking-wide text-[10px] mb-0.5">Due Date</span>
                            <span class="font-semibold">{{ $invoice->due_date->format('d M Y') }}</span>
                        </div>
                        <div>
                            <span class="block text-slate-400 font-medium uppercase tracking-wide text-[10px] mb-0.5">Items</span>
                            <span class="font-semibold">{{ $invoice->total_items_count }} items ({{ $invoice->total_quantity_sum }} qty)</span>
                        </div>
                        <div>
                            <span class="block text-slate-400 font-medium uppercase tracking-wide text-[10px] mb-0.5">Total Amount</span>
                            <span class="font-extrabold text-slate-900">Rp {{ number_format($invoice->total_amount, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    {{-- Actions --}}
                    <div class="flex items-center gap-2 pt-2 border-t border-slate-100">
                        <a href="{{ route('invoices.show', $invoice->id) }}" 
                           class="flex-1 text-center py-2 bg-blue-50 hover:bg-blue-100 text-blue-600 rounded-lg text-xs font-bold transition">
                           View
                        </a>
                        <a href="{{ route('invoices.edit', $invoice->id) }}"
                           class="flex-1 text-center py-2 bg-amber-50 hover:bg-amber-100 text-amber-600 rounded-lg text-xs font-bold transition">
                           Edit
                        </a>
                        <form method="POST" action="{{ route('invoices.destroy', $invoice->id) }}" 
                              class="flex-1"
                              onsubmit="return confirm('Delete invoice {{ $invoice->invoice_number }}?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full py-2 bg-rose-50 hover:bg-rose-100 text-rose-600 rounded-lg text-xs font-bold transition">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="py-12 text-center text-slate-500 text-sm">
                    @if(request('status') || request('search'))
                        <p class="font-bold text-slate-800 text-base">Tidak ada invoice {{ request('status') ? 'berstatus ' . strtoupper(request('status')) : '' }} {{ request('search') ? 'dengan pencarian "' . request('search') . '"' : '' }}.</p>
                        <p class="text-xs text-slate-500 mt-1">Invoice Anda tetap tersimpan aman di sistem. Silakan klik tombol di bawah untuk melihat seluruh {{ $statusCounts['all'] ?? '' }} invoice.</p>
                        <a href="{{ route('invoices.index') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-500 text-white font-bold text-xs rounded-xl shadow transition">
                            Tampilkan Semua Invoice ({{ $statusCounts['all'] ?? 0 }})
                        </a>
                    @else
                        <p class="text-slate-400">Belum ada invoice. Klik "+ Create New Invoice" untuk membuat invoice baru.</p>
                    @endif
                </div>
            @endforelse
        </div>

        {{-- ── DESKTOP TABLE (shown on ≥ md) ── --}}
        <div class="desktop-table overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600">
                <thead class="bg-slate-50 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-200">
                    <tr>
                        <th class="py-3.5 px-5">Invoice #</th>
                        <th class="py-3.5 px-5">Customer</th>
                        <th class="py-3.5 px-5">Issue Date</th>
                        <th class="py-3.5 px-5">Due Date</th>
                        <th class="py-3.5 px-5 text-center">Items & Qty</th>
                        <th class="py-3.5 px-5 text-right">Total Amount (Rp)</th>
                        <th class="py-3.5 px-5 text-center">Status</th>
                        <th class="py-3.5 px-5 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($invoices as $invoice)
                        <tr class="hover:bg-slate-50/80 transition">
                            <td class="py-4 px-5 font-mono font-bold text-xs text-blue-600">
                                <a href="{{ route('invoices.show', $invoice->id) }}" class="hover:underline">
                                    {{ $invoice->invoice_number }}
                                </a>
                            </td>
                            <td class="py-4 px-5">
                                <span class="font-bold text-slate-900 block">{{ $invoice->customer_name }}</span>
                                <span class="text-xs text-slate-400">{{ $invoice->customer_email }}</span>
                            </td>
                            <td class="py-4 px-5 text-xs text-slate-600 font-medium">
                                {{ $invoice->issue_date->format('d M Y') }}
                            </td>
                            <td class="py-4 px-5 text-xs text-slate-600 font-medium">
                                {{ $invoice->due_date->format('d M Y') }}
                            </td>
                            <td class="py-4 px-5 text-center">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-slate-100 text-slate-800">
                                    {{ $invoice->total_items_count }} items ({{ $invoice->total_quantity_sum }} qty)
                                </span>
                            </td>
                            <td class="py-4 px-5 text-right font-extrabold text-slate-900">
                                Rp {{ number_format($invoice->total_amount, 0, ',', '.') }}
                            </td>
                            <td class="py-4 px-5 text-center">
                                @if($invoice->payment_status === 'paid')
                                    <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-emerald-100 text-emerald-800">Paid</span>
                                @elseif($invoice->payment_status === 'unpaid')
                                    <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-800">Unpaid</span>
                                @else
                                    <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-rose-100 text-rose-800">Overdue</span>
                                @endif
                            </td>
                            <td class="py-4 px-5 text-center">
                                <div class="flex items-center justify-center space-x-2">
                                    <a href="{{ route('invoices.show', $invoice->id) }}" 
                                       class="px-2.5 py-1 bg-blue-50 hover:bg-blue-100 text-blue-600 rounded-lg text-xs font-bold transition whitespace-nowrap">
                                       View & Print
                                    </a>
                                    <a href="{{ route('invoices.edit', $invoice->id) }}"
                                       class="px-2.5 py-1 bg-amber-50 hover:bg-amber-100 text-amber-600 rounded-lg text-xs font-bold transition">
                                       Edit
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
                            <td colspan="8" class="py-12 text-center text-slate-500 text-sm">
                                @if(request('status') || request('search'))
                                    <p class="font-bold text-slate-800 text-base">Tidak ada invoice {{ request('status') ? 'berstatus ' . strtoupper(request('status')) : '' }} {{ request('search') ? 'dengan pencarian "' . request('search') . '"' : '' }}.</p>
                                    <p class="text-xs text-slate-500 mt-1">Invoice Anda tetap tersimpan aman di sistem. Silakan klik tombol di bawah untuk melihat seluruh {{ $statusCounts['all'] ?? '' }} invoice.</p>
                                    <a href="{{ route('invoices.index') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-500 text-white font-bold text-xs rounded-xl shadow transition">
                                        Tampilkan Semua Invoice ({{ $statusCounts['all'] ?? 0 }})
                                    </a>
                                @else
                                    <p class="text-slate-400">Belum ada invoice. Klik "+ Create New Invoice" untuk membuat invoice baru.</p>
                                @endif
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
