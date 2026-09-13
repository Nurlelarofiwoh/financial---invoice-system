@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    
    <!-- Action Toolbar (Hidden during print) -->
    <div class="bg-white rounded-2xl p-4 shadow-sm border border-slate-200/80 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 no-print">
        <a href="{{ route('invoices.index') }}" class="text-xs font-bold text-slate-600 hover:text-slate-900 flex items-center space-x-1">
            <span>&larr; Back to Invoices</span>
        </a>

        <!-- Download & Print Action Buttons -->
        <div class="flex flex-wrap items-center gap-2 w-full sm:w-auto">
            
            <!-- Payment Status Form Switcher -->
            <form method="POST" action="{{ route('invoices.update-status', $invoice->id) }}" class="inline-flex items-center">
                @csrf
                @method('PATCH')
                <select name="payment_status" onchange="this.form.submit()" 
                        class="px-3 py-1.5 bg-slate-100 border border-slate-200 rounded-xl text-xs font-bold text-slate-800 outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="paid" {{ $invoice->payment_status === 'paid' ? 'selected' : '' }}>Status: Paid</option>
                    <option value="unpaid" {{ $invoice->payment_status === 'unpaid' ? 'selected' : '' }}>Status: Unpaid</option>
                    <option value="overdue" {{ $invoice->payment_status === 'overdue' ? 'selected' : '' }}>Status: Overdue</option>
                </select>
            </form>

            <a href="{{ route('invoices.edit', $invoice->id) }}"
               class="px-3.5 py-2 bg-amber-500 hover:bg-amber-400 text-white font-bold text-xs rounded-xl transition shadow flex items-center space-x-1.5 whitespace-nowrap">
                <span>Edit Invoice</span>
            </a>

            <button onclick="downloadInvoiceImage('png')" 
                    class="px-3.5 py-2 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs rounded-xl transition shadow flex items-center space-x-1.5 whitespace-nowrap">
                <span>PNG</span>
            </button>

            <button onclick="downloadInvoiceImage('jpg')" 
                    class="px-3.5 py-2 bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs rounded-xl transition shadow flex items-center space-x-1.5 whitespace-nowrap">
                <span>JPG</span>
            </button>

            <button onclick="window.print()" 
                    class="px-4 py-2 bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs rounded-xl transition shadow flex items-center space-x-1.5 whitespace-nowrap">
                <span>Print / PDF</span>
            </button>
        </div>
    </div>

    <!-- Printable Invoice Document Box -->
    <div id="invoice-document" class="bg-white shadow-xl border border-slate-200/80 overflow-hidden print-container" style="border-radius: 1rem;">
        
        <!-- Dark Slate Invoice Header (Seamless Edges) -->
        <div class="bg-slate-900 text-white p-6 sm:p-8 border-b border-slate-800" style="border-radius: 1rem 1rem 0 0;">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6">
                
                <!-- Company Branding -->
                <div class="flex items-center space-x-4">
                    <!-- Official 20MOTOSHOP Logo -->
                    <div class="w-16 h-16 rounded-2xl bg-black border border-slate-700/80 p-1 flex items-center justify-center shadow-lg shrink-0 overflow-hidden">
                        <img src="{{ asset('images/logo-20motoshop.jpg') }}" alt="20MOTOSHOP Logo" class="w-full h-full object-cover rounded-xl">
                    </div>
                    <div>
                        <h2 class="text-2xl font-black tracking-tight text-white uppercase">20motoshop</h2>
                        <p class="text-xs text-slate-300 mt-1 font-medium">jl.Bojong Gede Kab. Bogor &bull; CS: (+62) 5893012852</p>
                    </div>
                </div>

                <!-- Invoice Badge & Number -->
                <div class="text-left sm:text-right flex flex-col items-start sm:items-end">
                    <span class="inline-block px-3 py-1 bg-blue-500/20 text-blue-300 font-mono text-xs font-bold rounded-lg border border-blue-400/30 uppercase tracking-widest mb-1">
                        INVOICE
                    </span>
                    <h3 class="text-2xl font-mono font-extrabold tracking-tight text-white">{{ $invoice->invoice_number }}</h3>
                    
                    <!-- Status Badge (Spacious & centered pill box) -->
                    <div style="margin-top:10px; display:inline-block; padding:7px 20px; border-radius:9999px; text-align:center; line-height:1; vertical-align:middle;
                        {{ $invoice->payment_status === 'paid' ? 'background:#10b981; color:#ffffff;' : ($invoice->payment_status === 'unpaid' ? 'background:#f59e0b; color:#0f172a;' : 'background:#dc2626; color:#ffffff;') }}">
                        <span style="display:inline-block; font-size:12px; font-weight:800; text-transform:uppercase; letter-spacing:.06em; line-height:1; vertical-align:middle; margin:0; padding:0;">
                            STATUS : {{ strtoupper($invoice->payment_status) }}
                        </span>
                    </div>
                </div>

            </div>
        </div>

        <!-- Customer Info & Dates Grid -->
        <div class="p-8 border-b border-slate-100 bg-slate-50/50 grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <!-- Billed To -->
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-slate-400 block mb-1">Nama Klien (Billed To)</span>
                <h4 class="text-base font-extrabold text-slate-900">{{ $invoice->customer_name }}</h4>
                @if($invoice->customer_email)
                    <p class="text-xs text-slate-500 mt-0.5 font-medium">{{ $invoice->customer_email }}</p>
                @endif
            </div>

            <!-- Invoice Details -->
            <div class="md:text-right space-y-1 text-xs">
                <div>
                    <span class="text-slate-400 font-medium">Tanggal Invoice:</span>
                    <span class="font-bold text-slate-900 ml-2">{{ $invoice->issue_date->format('d F Y') }}</span>
                </div>
                <div>
                    <span class="text-slate-400 font-medium">Jatuh Tempo:</span>
                    <span class="font-bold text-rose-600 ml-2">{{ $invoice->due_date->format('d F Y') }}</span>
                </div>
            </div>

        </div>

        <!-- Itemized Line Items Table — Grouped by Order Date -->
        <div class="px-6 pb-6 pt-2">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-slate-700" style="border-collapse: collapse; font-size: 11.5px;">
                    <thead>
                        <tr style="background:#f1f5f9; border-bottom: 2px solid #e2e8f0;">
                            <th style="padding:7px 10px; font-size:10px; font-weight:800; text-transform:uppercase; letter-spacing:.05em; color:#64748b; white-space:nowrap;">Tanggal</th>
                            <th style="padding:7px 6px; font-size:10px; font-weight:800; text-transform:uppercase; letter-spacing:.05em; color:#64748b; text-align:center; width:32px;">NO</th>
                            <th style="padding:7px 10px; font-size:10px; font-weight:800; text-transform:uppercase; letter-spacing:.05em; color:#64748b;">List Barang</th>
                            <th style="padding:7px 10px; font-size:10px; font-weight:800; text-transform:uppercase; letter-spacing:.05em; color:#64748b; text-align:center; white-space:nowrap;">Jumlah Barang</th>
                            <th style="padding:7px 10px; font-size:10px; font-weight:800; text-transform:uppercase; letter-spacing:.05em; color:#64748b; text-align:right; white-space:nowrap;">Harga / Item</th>
                            <th style="padding:7px 10px; font-size:10px; font-weight:800; text-transform:uppercase; letter-spacing:.05em; color:#64748b; text-align:right;">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($groupedItems as $dateLabel => $dateItems)
                            @foreach($dateItems as $idx => $item)
                                <tr style="border-bottom: 1px solid #f1f5f9; {{ $idx === 0 && !$loop->parent->first ? 'border-top: 2px solid #e2e8f0;' : '' }}">
                                    {{-- Date cell: only on first row of group (rowspan) --}}
                                    @if($idx === 0)
                                        <td rowspan="{{ $dateItems->count() }}"
                                            style="padding:5px 10px; font-weight:700; color:#1e293b; white-space:nowrap; vertical-align:middle; border-right:2px solid #e2e8f0; font-size:11px; background:#f8fafc;">
                                            {{ $dateLabel !== '-' ? $dateLabel : '' }}
                                        </td>
                                    @endif
                                    <td style="padding:5px 6px; text-align:center; font-weight:700; color:#94a3b8; font-size:10px;">{{ $idx + 1 }}.</td>
                                    <td style="padding:5px 10px; font-weight:600; color:#0f172a; line-height:1.3;">
                                        {{ $item->product->name ?? 'Custom Item' }}
                                    </td>
                                    <td style="padding:5px 10px; text-align:center; font-weight:700; color:#1e293b;">
                                        {{ $item->quantity }}
                                    </td>
                                    <td style="padding:5px 10px; text-align:right; font-family:monospace; color:#334155;">
                                        Rp{{ number_format($item->unit_price, 2, ',', '.') }}
                                    </td>
                                    <td style="padding:5px 10px; text-align:right; font-weight:700; color:#1e293b;">
                                        Rp{{ number_format($item->subtotal, 2, ',', '.') }}
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach

                        {{-- Grand Total Row --}}
                        <tr style="border-top: 2px solid #cbd5e1; background:#f8fafc;">
                            <td colspan="5" style="padding:8px 10px; text-align:right; font-weight:800; font-size:12px; color:#1e293b; text-transform:uppercase; letter-spacing:.04em;">TOTAL</td>
                            <td style="padding:8px 10px; text-align:right; font-weight:900; font-size:13px; color:#2563eb;">
                                Rp{{ number_format($invoice->total_amount, 2, ',', '.') }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Notes & Summary Totals Box -->
            <div class="mt-5 pt-4 border-t border-slate-200 grid grid-cols-1 md:grid-cols-2 gap-4 items-end">
                
                <!-- Additional Notes / Remarks -->
                <div>
                    @if($invoice->notes)
                        <div class="p-3 bg-slate-50 border border-slate-200/80 rounded-xl">
                            <span class="text-xs font-bold uppercase tracking-wider text-slate-400 block mb-1">Catatan (Notes):</span>
                            <p class="text-xs text-slate-600 leading-relaxed font-medium">{{ $invoice->notes }}</p>
                        </div>
                    @endif
                </div>

                <!-- Summary Stats (compact) -->
                <div class="bg-slate-50 p-4 rounded-xl border border-slate-200 space-y-1.5 text-xs">
                    <div class="flex items-center justify-between text-slate-500">
                        <span>Total Jenis Barang:</span>
                        <span class="font-bold text-slate-900">{{ $invoice->total_items_count }} items</span>
                    </div>
                    <div class="flex items-center justify-between text-slate-500">
                        <span>Total Akumulasi Qty:</span>
                        <span class="font-bold text-slate-900">{{ $invoice->total_quantity_sum }} units</span>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="mt-5 pt-4 border-t border-slate-100 flex items-center justify-between text-xs text-slate-400">
                <div>
                    <p class="font-bold text-slate-700">Terima kasih atas pesanan Anda!</p>
                    <p class="mt-0.5">Pembayaran via Bank BCA Rek: 8720842841 a.n YOGI WAHYU RAMADAN</p>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection

@push('scripts')
<script>
    function downloadInvoiceImage(format) {
        const original = document.getElementById('invoice-document');
        const invNum = '{{ $invoice->invoice_number }}';
        const radius = 16; // 1rem = 16px

        // Clone element to force fixed desktop width (950px) for landscape high-detail rendering on all devices
        const clone = original.cloneNode(true);
        clone.id = 'invoice-document-export';
        clone.style.position = 'absolute';
        clone.style.left = '-9999px';
        clone.style.top = '0';
        clone.style.width = '950px';
        clone.style.minWidth = '950px';

        // Force key responsive containers in clone to desktop row/grid layouts
        const headerFlex = clone.querySelector('.bg-slate-900 > div');
        if (headerFlex) {
            headerFlex.style.display = 'flex';
            headerFlex.style.flexDirection = 'row';
            headerFlex.style.alignItems = 'center';
            headerFlex.style.justifyContent = 'space-between';
        }

        const headerRight = clone.querySelector('.bg-slate-900 .text-left');
        if (headerRight) {
            headerRight.style.textAlign = 'right';
            headerRight.style.alignItems = 'flex-end';
        }

        const gridInfo = clone.querySelector('.grid-cols-1');
        if (gridInfo) {
            gridInfo.style.display = 'grid';
            gridInfo.style.gridTemplateColumns = 'repeat(2, minmax(0, 1fr))';
        }

        const gridInfoRight = clone.querySelector('.md\\:text-right');
        if (gridInfoRight) {
            gridInfoRight.style.textAlign = 'right';
        }

        const footerFlex = clone.querySelector('.mt-5.pt-4.border-t.border-slate-200');
        if (footerFlex) {
            footerFlex.style.display = 'grid';
            footerFlex.style.gridTemplateColumns = 'repeat(2, minmax(0, 1fr))';
        }

        document.body.appendChild(clone);

        html2canvas(clone, {
            scale: 3,
            useCORS: true,
            allowTaint: true,
            backgroundColor: null,
            logging: false,
            width: 950,
            windowWidth: 1000
        }).then(canvas => {
            document.body.removeChild(clone);

            const roundedCanvas = document.createElement('canvas');
            roundedCanvas.width = canvas.width;
            roundedCanvas.height = canvas.height;
            const ctx = roundedCanvas.getContext('2d');

            const r = radius * 3;
            const w = canvas.width;
            const h = canvas.height;

            ctx.beginPath();
            ctx.moveTo(r, 0);
            ctx.lineTo(w - r, 0);
            ctx.quadraticCurveTo(w, 0, w, r);
            ctx.lineTo(w, h - r);
            ctx.quadraticCurveTo(w, h, w - r, h);
            ctx.lineTo(r, h);
            ctx.quadraticCurveTo(0, h, 0, h - r);
            ctx.lineTo(0, r);
            ctx.quadraticCurveTo(0, 0, r, 0);
            ctx.closePath();
            ctx.clip();

            ctx.fillStyle = '#ffffff';
            ctx.fillRect(0, 0, w, h);

            ctx.drawImage(canvas, 0, 0);

            const link = document.createElement('a');
            link.download = invNum + '.' + format;
            link.href = roundedCanvas.toDataURL('image/' + (format === 'jpg' ? 'jpeg' : 'png'), 0.97);
            link.click();
        }).catch(err => {
            if (document.body.contains(clone)) {
                document.body.removeChild(clone);
            }
            console.error('Failed to export invoice image:', err);
        });
    }
</script>
@endpush
