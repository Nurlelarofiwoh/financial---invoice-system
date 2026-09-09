@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Edit Product</h1>
            <p class="text-sm text-slate-500 mt-0.5">Update unit price or product details.</p>
        </div>
        <a href="{{ route('products.index') }}" class="text-xs font-bold text-slate-600 hover:text-slate-900 bg-white border border-slate-200 px-3.5 py-2 rounded-xl shadow-sm">
            &larr; Back to Catalog
        </a>
    </div>

    <!-- Edit Form Card -->
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200/80">
        <form method="POST" action="{{ route('products.update', $product->id) }}" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Product Code & Status -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Product Code *</label>
                    <input type="text" name="product_code" value="{{ old('product_code', $product->product_code) }}" required
                           class="w-full px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm font-mono focus:ring-2 focus:ring-blue-500 outline-none">
                    @error('product_code') <p class="text-xs text-rose-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Status *</label>
                    <select name="status" required class="w-full px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 outline-none">
                        <option value="active" {{ old('status', $product->status) === 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('status', $product->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status') <p class="text-xs text-rose-500 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Product Name -->
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Product Name *</label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}" required
                       class="w-full px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:ring-2 focus:ring-blue-500 outline-none">
                @error('name') <p class="text-xs text-rose-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Category -->
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Category *</label>
                <input type="text" name="category" list="category-list" value="{{ old('category', $product->category) }}" required
                       class="w-full px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 outline-none">
                <datalist id="category-list">
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}">
                    @endforeach
                </datalist>
                @error('category') <p class="text-xs text-rose-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Price -->
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Unit Price (Rp) *</label>
                <input type="number" name="unit_price" value="{{ old('unit_price', $product->unit_price) }}" step="500" min="0" required
                       class="w-full px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold text-slate-900 focus:ring-2 focus:ring-blue-500 outline-none">
                @error('unit_price') <p class="text-xs text-rose-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Submit Button -->
            <div class="pt-4 flex items-center justify-end space-x-3 border-t border-slate-100">
                <a href="{{ route('products.index') }}" class="px-5 py-2.5 bg-slate-100 text-slate-600 text-sm font-bold rounded-xl hover:bg-slate-200 transition">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold rounded-xl transition shadow">
                    Update Product
                </button>
            </div>

        </form>
    </div>

</div>
@endsection
