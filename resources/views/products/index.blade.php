@extends('layouts.app')

@section('content')
<div class="space-y-6" x-data="{ quickPriceModal: false, activeProduct: {}, newPrice: '' }">
    
    <!-- Page Header & Action Button -->
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200/80 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Product Catalog & Price List</h1>
            <p class="text-sm text-slate-500 mt-1">Manage spare parts price list, unit rates, and product master data.</p>
        </div>

        <div class="flex items-center space-x-3">
            <a href="{{ route('products.create') }}" 
               class="inline-flex items-center px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm rounded-xl transition shadow-md hover:shadow-lg">
               <span class="mr-2">➕</span> Add New Product
            </a>
        </div>
    </div>

    <!-- Search & Filter Controls Card -->
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200/80">
        <form method="GET" action="{{ route('products.index') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 items-end">
            
            <!-- Search Keyword -->
            <div class="lg:col-span-2">
                <label class="block text-xs font-bold text-slate-600 uppercase mb-1">Search Product</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search code or name..."
                       class="w-full px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Category Filter -->
            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase mb-1">Category</label>
                <select name="category" class="w-full px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">All Categories</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Status Filter -->
            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase mb-1">Status</label>
                <select name="status" class="w-full px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">All Statuses</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <!-- Submit Filter -->
            <div class="flex items-center space-x-2">
                <button type="submit" class="w-full py-2 px-4 bg-slate-900 hover:bg-slate-800 text-white font-bold text-sm rounded-xl transition shadow">
                    Filter
                </button>
                <a href="{{ route('products.index') }}" class="py-2 px-3 bg-slate-100 text-slate-600 font-semibold text-sm rounded-xl hover:bg-slate-200 transition">
                    Reset
                </a>
            </div>

        </form>
    </div>

    <!-- Product Data Table -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600">
                <thead class="bg-slate-50 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-200">
                    <tr>
                        <th class="py-3.5 px-6">Product Code</th>
                        <th class="py-3.5 px-6">Product Name</th>
                        <th class="py-3.5 px-6">Category</th>
                        <th class="py-3.5 px-6 text-right">Unit Price (Rp)</th>
                        <th class="py-3.5 px-6 text-center">Status</th>
                        <th class="py-3.5 px-6 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($products as $product)
                        <tr class="hover:bg-slate-50/80 transition">
                            <td class="py-4 px-6 font-mono font-semibold text-xs text-slate-500">
                                {{ $product->product_code }}
                            </td>
                            <td class="py-4 px-6 font-bold text-slate-900">
                                {{ $product->name }}
                            </td>
                            <td class="py-4 px-6 text-xs text-slate-500 font-medium">
                                <span class="px-2.5 py-1 bg-slate-100 text-slate-700 rounded-md">
                                    {{ $product->category }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-right font-extrabold text-slate-900">
                                <div class="flex items-center justify-end space-x-2">
                                    <span>Rp {{ number_format($product->unit_price, 0, ',', '.') }}</span>
                                    
                                    <!-- Quick Price Update Icon Button -->
                                    <button @click="quickPriceModal = true; activeProduct = {{ json_encode($product) }}; newPrice = '{{ $product->unit_price }}'" 
                                            class="text-blue-600 hover:text-blue-800 text-xs font-bold bg-blue-50 hover:bg-blue-100 px-2 py-0.5 rounded transition"
                                            title="Quick Edit Price">
                                        ✏️ Edit Price
                                    </button>
                                </div>
                            </td>
                            <td class="py-4 px-6 text-center">
                                @if($product->status === 'active')
                                    <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-emerald-100 text-emerald-800">Active</span>
                                @else
                                    <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-slate-100 text-slate-600">Inactive</span>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-center">
                                <div class="flex items-center justify-center space-x-2">
                                    <a href="{{ route('products.edit', $product->id) }}" 
                                       class="px-2.5 py-1 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg text-xs font-bold transition">
                                       Edit
                                    </a>
                                    
                                    <form method="POST" action="{{ route('products.destroy', $product->id) }}" 
                                          onsubmit="return confirm('Are you sure you want to delete this product?');">
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
                            <td colspan="6" class="py-8 text-center text-slate-400 text-sm">
                                No products found in catalog. Click "+ Add New Product" to add real products.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($products->hasPages())
            <div class="p-4 border-t border-slate-100 bg-slate-50">
                {{ $products->links() }}
            </div>
        @endif
    </div>

    <!-- Quick Price Update Modal -->
    <div x-show="quickPriceModal" 
         x-cloak 
         class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/50 backdrop-blur-sm p-4">
        <div class="bg-white rounded-2xl p-6 max-w-md w-full shadow-2xl space-y-4" @click.away="quickPriceModal = false">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <h3 class="font-bold text-slate-900">Quick Update Unit Price</h3>
                <button @click="quickPriceModal = false" class="text-slate-400 hover:text-slate-600 font-bold">&times;</button>
            </div>

            <form :action="'/products/' + activeProduct.id + '/quick-price'" method="POST" class="space-y-4">
                @csrf
                @method('PATCH')

                <div>
                    <label class="block text-xs font-bold text-slate-600 mb-1">Product Name</label>
                    <p class="text-sm font-bold text-slate-900" x-text="activeProduct.name"></p>
                    <p class="text-xs text-slate-400 font-mono" x-text="activeProduct.product_code"></p>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-600 mb-1">New Unit Price (Rp)</label>
                    <input type="number" name="unit_price" x-model="newPrice" step="500" required min="0"
                           class="w-full px-3.5 py-2 border border-slate-200 rounded-xl text-sm font-bold text-slate-900 focus:ring-2 focus:ring-blue-500 outline-none">
                </div>

                <div class="flex items-center justify-end space-x-2 pt-2">
                    <button type="button" @click="quickPriceModal = false" class="px-4 py-2 bg-slate-100 text-slate-600 text-xs font-bold rounded-xl hover:bg-slate-200">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white text-xs font-bold rounded-xl hover:bg-blue-700 shadow">
                        Save New Price
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
