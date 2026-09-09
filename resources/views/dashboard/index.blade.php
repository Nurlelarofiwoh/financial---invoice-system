@extends('layouts.app')

@section('content')
<div class="space-y-8">
    
    <!-- Page Header & Quick Actions -->
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200/80 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Financial Overview & Analytics</h1>
            <p class="text-sm text-slate-500 mt-1">Real-time revenue monitoring, paid vs unpaid recap, and product performance metrics.</p>
        </div>

        <div class="flex flex-wrap items-center gap-3">
            <a href="{{ route('products.index') }}" 
               class="inline-flex items-center px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-sm rounded-xl transition shadow-sm border border-slate-200">
               <span class="mr-2">🏷️</span> Update Prices / Products
            </a>
            
            <a href="{{ route('invoices.create') }}" 
               class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white font-bold text-sm rounded-xl transition shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
               <span class="mr-2">➕</span> Create New Invoice
            </a>
        </div>
    </div>

    <!-- Metric Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        
        <!-- Monthly Revenue Card -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200/80 hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold uppercase tracking-wider text-slate-400">This Month Revenue</span>
                <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center font-bold text-lg">
                    💵
                </div>
            </div>
            <div class="mt-4">
                <h2 class="text-2xl font-extrabold text-slate-900">Rp {{ number_format($currentMonthPaidRevenue, 0, ',', '.') }}</h2>
                <div class="mt-2 flex items-center justify-between text-xs">
                    <span class="text-slate-500 font-medium">All-time Paid Revenue:</span>
                    <span class="font-bold text-blue-600">Rp {{ number_format($totalRevenueOverall, 0, ',', '.') }}</span>
                </div>
            </div>
        </div>

        <!-- Paid Invoices Card -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200/80 hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold uppercase tracking-wider text-emerald-600">Paid Invoices</span>
                <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold text-lg">
                    ✅
                </div>
            </div>
            <div class="mt-4">
                <h2 class="text-2xl font-extrabold text-emerald-600">Rp {{ number_format($paidInvoicesAmount, 0, ',', '.') }}</h2>
                <div class="mt-2 flex items-center justify-between text-xs">
                    <span class="text-slate-500 font-medium">Total Paid Count:</span>
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-emerald-100 text-emerald-800">
                        {{ $paidInvoicesCount }} Invoices
                    </span>
                </div>
            </div>
        </div>

        <!-- Unpaid Invoices Card -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200/80 hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold uppercase tracking-wider text-amber-600">Unpaid Invoices</span>
                <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center font-bold text-lg">
                    ⏳
                </div>
            </div>
            <div class="mt-4">
                <h2 class="text-2xl font-extrabold text-amber-600">Rp {{ number_format($unpaidInvoicesAmount, 0, ',', '.') }}</h2>
                <div class="mt-2 flex items-center justify-between text-xs">
                    <span class="text-slate-500 font-medium">Pending Payments:</span>
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-amber-100 text-amber-800">
                        {{ $unpaidInvoicesCount }} Pending
                    </span>
                </div>
            </div>
        </div>

        <!-- Overdue Invoices Card -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200/80 hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold uppercase tracking-wider text-rose-600">Overdue Invoices</span>
                <div class="w-10 h-10 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center font-bold text-lg">
                    ⚠️
                </div>
            </div>
            <div class="mt-4">
                <h2 class="text-2xl font-extrabold text-rose-600">Rp {{ number_format($overdueInvoicesAmount, 0, ',', '.') }}</h2>
                <div class="mt-2 flex items-center justify-between text-xs">
                    <span class="text-slate-500 font-medium">Action Required:</span>
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-rose-100 text-rose-800">
                        {{ $overdueInvoicesCount }} Overdue
                    </span>
                </div>
            </div>
        </div>

    </div>

    <!-- Charts & Product Analytics Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Monthly Revenue & Profit Visual Chart (2 Cols) -->
        <div class="lg:col-span-2 bg-white rounded-2xl p-6 shadow-sm border border-slate-200/80 flex flex-col">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="text-lg font-bold text-slate-900">Monthly Revenue & Profit Overview</h3>
                    <p class="text-xs text-slate-500">6-Month historical comparison of paid revenue vs pending invoices</p>
                </div>
                <div class="flex items-center space-x-4 text-xs font-semibold">
                    <div class="flex items-center space-x-1.5">
                        <span class="w-3 h-3 rounded-full bg-blue-600"></span>
                        <span class="text-slate-600">Paid Revenue</span>
                    </div>
                    <div class="flex items-center space-x-1.5">
                        <span class="w-3 h-3 rounded-full bg-amber-400"></span>
                        <span class="text-slate-600">Pending Amount</span>
                    </div>
                </div>
            </div>

            <div class="relative flex-grow w-full min-h-[280px]">
                <canvas id="monthlyRevenueChart"></canvas>
            </div>
        </div>

        <!-- Product Sales Analytics: "Top Frequent Products" (1 Col) -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200/80 flex flex-col">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="text-lg font-bold text-slate-900">Top Frequent Products</h3>
                    <p class="text-xs text-slate-500">Most featured products by quantity sold & revenue</p>
                </div>
                <a href="{{ route('products.index') }}" class="text-xs font-bold text-blue-600 hover:text-blue-700">View All &rarr;</a>
            </div>

            <div class="space-y-4 overflow-y-auto max-h-[340px] pr-1">
                @forelse($topProducts as $index => $prod)
                    @php
                        $percentage = round(($prod->total_quantity_sold / $maxQtySold) * 100);
                        $badgeColors = ['bg-amber-500', 'bg-slate-400', 'bg-amber-700', 'bg-blue-500', 'bg-slate-500'];
                    @endphp
                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-100 hover:bg-blue-50/50 transition">
                        <div class="flex items-start justify-between">
                            <div class="flex items-center space-x-3">
                                <span class="w-6 h-6 rounded-full text-white text-xs font-bold flex items-center justify-center shrink-0 {{ $badgeColors[$index] ?? 'bg-slate-500' }}">
                                    #{{ $index + 1 }}
                                </span>
                                <div>
                                    <h4 class="text-xs font-bold text-slate-900 line-clamp-1">{{ $prod->name }}</h4>
                                    <p class="text-[10px] text-slate-400 font-mono">{{ $prod->product_code }} &bull; {{ $prod->category }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="text-xs font-extrabold text-blue-600 block">{{ $prod->total_quantity_sold }} Qty</span>
                                <span class="text-[10px] font-semibold text-slate-500">Rp {{ number_format($prod->total_revenue_generated, 0, ',', '.') }}</span>
                            </div>
                        </div>

                        <!-- Progress Bar -->
                        <div class="mt-2.5 w-full bg-slate-200 rounded-full h-1.5 overflow-hidden">
                            <div class="bg-gradient-to-r from-blue-500 to-indigo-600 h-1.5 rounded-full transition-all duration-500" 
                                 style="width: {{ $percentage }}%"></div>
                        </div>
                    </div>
                @empty
                    <p class="text-xs text-slate-400 py-6 text-center">No product sales data recorded yet.</p>
                @endforelse
            </div>
        </div>

    </div>

    <!-- Monthly Financial Breakdown Table -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex items-center justify-between">
            <div>
                <h3 class="text-lg font-bold text-slate-900">Monthly Financial Breakdown</h3>
                <p class="text-xs text-slate-500 mt-0.5">Aggregate invoice generation and total income grouped by month/year</p>
            </div>
            <span class="text-xs font-bold px-3 py-1 bg-slate-100 text-slate-600 rounded-full">
                {{ count($monthlyBreakdown) }} Months Recorded
            </span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600">
                <thead class="bg-slate-50 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-200">
                    <tr>
                        <th class="py-3.5 px-6">Month / Year</th>
                        <th class="py-3.5 px-6 text-center">Total Invoices</th>
                        <th class="py-3.5 px-6 text-right">Paid Revenue</th>
                        <th class="py-3.5 px-6 text-right">Pending Amount</th>
                        <th class="py-3.5 px-6 text-right">Aggregate Income</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($monthlyBreakdown as $row)
                        <tr class="hover:bg-slate-50/80 transition">
                            <td class="py-4 px-6 font-bold text-slate-900">
                                {{ $row->month_label }}
                            </td>
                            <td class="py-4 px-6 text-center">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-slate-100 text-slate-700">
                                    {{ $row->total_invoices }} Invoices
                                </span>
                            </td>
                            <td class="py-4 px-6 text-right font-semibold text-emerald-600">
                                Rp {{ number_format($row->paid_revenue, 0, ',', '.') }}
                            </td>
                            <td class="py-4 px-6 text-right font-semibold text-amber-600">
                                Rp {{ number_format($row->pending_amount, 0, ',', '.') }}
                            </td>
                            <td class="py-4 px-6 text-right font-extrabold text-slate-900">
                                Rp {{ number_format($row->aggregate_income, 0, ',', '.') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-8 text-center text-slate-400 text-sm">
                                No financial records available.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('monthlyRevenueChart').getContext('2d');
        
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($chartLabels),
                datasets: [
                    {
                        label: 'Paid Revenue (Rp)',
                        data: @json($chartPaidData),
                        backgroundColor: '#2563eb',
                        borderRadius: 6,
                    },
                    {
                        label: 'Pending Amount (Rp)',
                        data: @json($chartPendingData),
                        backgroundColor: '#fbbf24',
                        borderRadius: 6,
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (context.parsed.y !== null) {
                                    label += new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(context.parsed.y);
                                }
                                return label;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        grid: { display: false },
                        ticks: { font: { family: 'Plus Jakarta Sans', size: 11 } }
                    },
                    y: {
                        grid: { color: '#f1f5f9' },
                        ticks: { 
                            font: { family: 'Plus Jakarta Sans', size: 11 },
                            callback: function(value) {
                                return 'Rp ' + (value / 1000000).toFixed(1) + 'M';
                            }
                        }
                    }
                }
            }
        });
    });
</script>
@endpush
