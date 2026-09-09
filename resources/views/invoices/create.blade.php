@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto space-y-6" x-data="invoiceForm()">
    
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Create Invoice</h1>
            <p class="text-sm text-slate-500 mt-0.5">Quickly select products by keyword, specify quantity, and save invoice instantly.</p>
        </div>
        <a href="{{ route('invoices.index') }}" class="text-xs font-bold text-slate-600 hover:text-slate-900 bg-white border border-slate-200 px-3.5 py-2 rounded-xl shadow-sm">
            &larr; Back to Invoices
        </a>
    </div>

    <!-- Invoice Creation Form Card -->
    <form method="POST" action="{{ route('invoices.store') }}" class="space-y-6">
        @csrf

        <!-- Customer & Date Metadata -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200/80 space-y-5">
            <h3 class="font-bold text-slate-900 text-lg border-b border-slate-100 pb-3 flex items-center justify-between">
                <span>1. Billing Information (Informasi Klien)</span>
                <span class="text-xs font-mono font-normal text-slate-400">Suggested Inv: {{ $suggestedNumber }}</span>
            </h3>

            <!-- Customer Name Field Only -->
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Nama Klien (Client Name)</label>
                <input type="text" name="customer_name" value="{{ old('customer_name', 'Pelanggan Umum') }}" placeholder="Contoh: Bengkel Honda Jaya / Budi"
                       class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold text-slate-900 focus:ring-2 focus:ring-blue-500 outline-none">
                <p class="text-[11px] text-slate-400 mt-1">*Jika dikosongkan, otomatis akan disimpan sebagai "Pelanggan Umum".</p>
                @error('customer_name') <p class="text-xs text-rose-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Issue Date *</label>
                    <input type="date" name="issue_date" value="{{ old('issue_date', date('Y-m-d')) }}" required
                           class="w-full px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium focus:ring-2 focus:ring-blue-500 outline-none">
                    @error('issue_date') <p class="text-xs text-rose-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Due Date *</label>
                    <input type="date" name="due_date" value="{{ old('due_date', date('Y-m-d', strtotime('+14 days'))) }}" required
                           class="w-full px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium focus:ring-2 focus:ring-blue-500 outline-none">
                    @error('due_date') <p class="text-xs text-rose-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Payment Status *</label>
                    <select name="payment_status" required class="w-full px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold focus:ring-2 focus:ring-blue-500 outline-none">
                        <option value="paid">Paid (Lunas)</option>
                        <option value="unpaid" selected>Unpaid (Belum Lunas)</option>
                        <option value="overdue">Overdue (Jatuh Tempo)</option>
                    </select>
                    @error('payment_status') <p class="text-xs text-rose-500 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        <!-- Dynamic Product Line Items Section -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200/80 space-y-5">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <div>
                    <h3 class="font-bold text-slate-900 text-lg">2. Dynamic Line Items</h3>
                    <p class="text-xs text-slate-500">Ketik kata kunci nama produk (misal: "vario", "beat", "mio", "kardus") untuk mencari barang.</p>
                </div>
                <button type="button" @click="addRow()" 
                        class="inline-flex items-center px-3.5 py-1.5 bg-blue-50 hover:bg-blue-100 text-blue-600 font-bold text-xs rounded-xl transition">
                    + Add Product Row
                </button>
            </div>

            <!-- Items Table -->
            <div class="overflow-visible">
                <table class="w-full text-left text-sm text-slate-600">
                    <thead class="bg-slate-50 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-200">
                        <tr>
                            <th class="py-2 px-3 w-10 text-center">#</th>
                            <th class="py-2 px-3 w-36">Tgl Pesan *</th>
                            <th class="py-2 px-3">Search & Select Product *</th>
                            <th class="py-2 px-3 w-28">Harga Unit</th>
                            <th class="py-2 px-3 w-24">Qty *</th>
                            <th class="py-2 px-3 w-32 text-right">Subtotal</th>
                            <th class="py-2 px-3 w-10 text-center">Del</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <template x-for="(item, index) in items" :key="index">
                            <tr class="hover:bg-slate-50/50 transition">
                                <td class="py-2 px-3 text-center font-bold text-slate-400 text-xs" x-text="index + 1"></td>

                                <!-- Tanggal Pemesanan per Item -->
                                <td class="py-2 px-3">
                                    <input type="date"
                                           :name="'items['+index+'][order_date]'"
                                           x-model="item.order_date"
                                           required
                                           class="w-full px-2 py-1.5 bg-slate-50 border border-slate-200 rounded-lg text-xs font-medium focus:ring-2 focus:ring-blue-500 outline-none">
                                </td>

                                <td class="py-2 px-3">
                                    <div class="relative" @click.outside="item.open = false">
                                        <input type="hidden" :name="'items['+index+'][product_id]'" x-model="item.product_id" required>
                                        
                                        <div class="relative">
                                            <input type="text" 
                                                   x-model="item.displayText" 
                                                   @focus="item.open = true" 
                                                   @input="item.open = true"
                                                   placeholder="🔍 Ketik nama produk..." 
                                                   required
                                                   class="w-full px-2.5 py-1.5 bg-slate-50 border border-slate-200 rounded-lg text-xs font-bold text-slate-900 focus:ring-2 focus:ring-blue-500 outline-none pr-7">
                                            <button type="button" @click="item.open = !item.open" class="absolute right-2 top-2 text-slate-400 text-xs">
                                                ▼
                                            </button>
                                        </div>

                                        <!-- Filtered Dropdown Options List -->
                                        <div x-show="item.open" 
                                             x-cloak 
                                             class="absolute z-50 left-0 right-0 mt-1 max-h-52 overflow-y-auto bg-white rounded-xl border border-slate-200 shadow-2xl divide-y divide-slate-100 text-xs">
                                            <template x-for="p in getFilteredProducts(item.displayText)" :key="p.id">
                                                <div @click="selectProduct(index, p)" 
                                                     class="px-3 py-2 hover:bg-blue-50 cursor-pointer flex items-center justify-between transition">
                                                    <div>
                                                        <span class="font-bold text-slate-900 block" x-text="p.name"></span>
                                                        <span class="text-xs text-slate-400 font-mono" x-text="p.product_code + ' • ' + p.category"></span>
                                                    </div>
                                                    <span class="font-extrabold text-blue-600 text-xs" x-text="formatCurrency(p.unit_price)"></span>
                                                </div>
                                            </template>
                                            <div x-show="getFilteredProducts(item.displayText).length === 0" class="p-2.5 text-xs text-slate-400 text-center font-medium">
                                                Barang tidak ditemukan.
                                            </div>
                                        </div>

                                    </div>
                                </td>

                                <!-- Unit Price Display -->
                                <td class="py-2 px-3 text-xs font-mono font-semibold text-slate-700">
                                    <span x-text="formatCurrency(item.unit_price)"></span>
                                </td>

                                <!-- Quantity Input -->
                                <td class="py-2 px-3">
                                    <input type="number" 
                                           :name="'items['+index+'][quantity]'" 
                                           x-model.number="item.quantity" 
                                           @input="calculateSubtotal(index)"
                                           min="1" 
                                           required 
                                           class="w-full px-2 py-1.5 bg-slate-50 border border-slate-200 rounded-lg text-xs font-bold text-center text-slate-900 focus:ring-2 focus:ring-blue-500 outline-none">
                                </td>

                                <!-- Subtotal Display -->
                                <td class="py-2 px-3 text-right font-extrabold text-slate-900 text-xs">
                                    <span x-text="formatCurrency(item.subtotal)"></span>
                                </td>

                                <!-- Remove Row -->
                                <td class="py-2 px-3 text-center">
                                    <button type="button" @click="removeRow(index)" 
                                            x-show="items.length > 1"
                                            class="text-rose-500 hover:text-rose-700 font-bold text-sm px-1.5 py-0.5 rounded hover:bg-rose-50">
                                        &times;
                                    </button>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>

            <!-- Add Row Button -->
            <div class="pt-2">
                <button type="button" @click="addRow()" 
                        class="w-full py-2.5 bg-slate-50 border-2 border-dashed border-slate-200 hover:border-blue-400 hover:bg-blue-50/50 text-slate-600 hover:text-blue-600 font-bold text-xs rounded-xl transition flex items-center justify-center space-x-2">
                    <span>➕ Add Another Product Line Item</span>
                </button>
            </div>
        </div>

        <!-- Additional Notes & Live Summary Card -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <!-- Additional Notes (Catatan Tambahan) -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200/80 space-y-3">
                <label class="block text-xs font-bold text-slate-700 uppercase">3. Invoice Notes / Remarks (Optional)</label>
                <textarea name="notes" rows="4" placeholder="Enter warranty terms, payment instructions, or special delivery notes..."
                          class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 outline-none">{{ old('notes') }}</textarea>
                <p class="text-xs text-slate-400">Catatan akan dicetak di bagian bawah lembar invoice.</p>
            </div>

            <!-- Real-time Live Summary Box -->
            <div class="bg-slate-900 text-white rounded-2xl p-6 shadow-lg flex flex-col justify-between space-y-4">
                <div>
                    <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400">Live Invoice Summary</h4>
                    <div class="mt-4 space-y-2 text-xs">
                        <div class="flex items-center justify-between border-b border-slate-800 pb-2">
                            <span class="text-slate-300">Total Distinct Product Types:</span>
                            <span class="font-bold text-blue-400 text-sm" x-text="totalDistinctProducts + ' items'"></span>
                        </div>
                        <div class="flex items-center justify-between border-b border-slate-800 pb-2">
                            <span class="text-slate-300">Total Aggregate Quantity:</span>
                            <span class="font-bold text-emerald-400 text-sm" x-text="totalQuantitySum + ' units'"></span>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between border-t border-slate-700 pt-3">
                        <span class="text-sm font-bold text-slate-300">Grand Total Amount:</span>
                        <span class="text-2xl font-extrabold text-blue-400" x-text="formatCurrency(grandTotal)"></span>
                    </div>

                    <button type="submit" 
                            class="mt-4 w-full py-3 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white font-extrabold text-sm rounded-xl transition shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        Generate & Save Invoice
                    </button>
                </div>
            </div>

        </div>

    </form>

</div>
@endsection

@push('scripts')
<script>
    function invoiceForm() {
        return {
            availableProducts: @json($products),
            items: [
                { product_id: '', displayText: '', open: false, quantity: 1, unit_price: 0, subtotal: 0, order_date: document.querySelector('[name="issue_date"]')?.value || '' }
            ],
            
            addRow() {
                const defaultDate = document.querySelector('[name="issue_date"]')?.value || '';
                this.items.push({ product_id: '', displayText: '', open: false, quantity: 1, unit_price: 0, subtotal: 0, order_date: defaultDate });
            },

            removeRow(index) {
                if (this.items.length > 1) {
                    this.items.splice(index, 1);
                }
            },

            getFilteredProducts(search) {
                if (!search || search.trim() === '') {
                    return this.availableProducts;
                }
                const q = search.toLowerCase();
                return this.availableProducts.filter(p => 
                    p.name.toLowerCase().includes(q) || 
                    p.product_code.toLowerCase().includes(q) || 
                    p.category.toLowerCase().includes(q)
                );
            },

            selectProduct(index, product) {
                this.items[index].product_id = product.id;
                this.items[index].displayText = product.name + ' (' + product.product_code + ')';
                this.items[index].unit_price = parseFloat(product.unit_price);
                this.items[index].open = false;
                this.calculateSubtotal(index);
            },

            calculateSubtotal(index) {
                const qty = parseInt(this.items[index].quantity) || 0;
                const price = parseFloat(this.items[index].unit_price) || 0;
                this.items[index].subtotal = qty * price;
            },

            get totalDistinctProducts() {
                return this.items.filter(i => i.product_id != '').length;
            },

            get totalQuantitySum() {
                return this.items.reduce((sum, i) => sum + (parseInt(i.quantity) || 0), 0);
            },

            get grandTotal() {
                return this.items.reduce((sum, i) => sum + (parseFloat(i.subtotal) || 0), 0);
            },

            formatCurrency(amount) {
                return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(amount || 0);
            }
        };
    }
</script>
@endpush
