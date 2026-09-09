<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Financial Accounting & Invoice System' }} - MotoShop Financials</title>
    
    <!-- Tailwind CSS v4 CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js CDN -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- html2canvas CDN for PNG/JPG Invoice Export -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

    <!-- Font Family (Inter) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        @media print {
            .no-print {
                display: none !important;
            }
            body {
                background-color: white !important;
            }
            .print-container {
                box-shadow: none !important;
                border: none !important;
                width: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
            }
        }
    </style>
</head>
<body class="h-full text-slate-800 antialiased bg-slate-100 flex flex-col min-h-screen">

    <!-- Dark Slate Top Navigation Header -->
    <header class="bg-slate-900 text-white shadow-lg sticky top-0 z-50 no-print">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                
                <!-- Logo & Brand Title -->
                <div class="flex items-center space-x-3">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 group">
                        <div class="w-10 h-10 rounded-xl bg-black border border-slate-700 p-0.5 flex items-center justify-center shadow-md group-hover:scale-105 transition-transform shrink-0 overflow-hidden">
                            <img src="{{ asset('images/logo-20motoshop.jpg') }}" alt="20MOTOSHOP Logo" class="w-full h-full object-cover rounded-lg">
                        </div>
                        <div>
                            <span class="font-extrabold text-lg tracking-tight text-white block">20<span class="text-amber-400">MOTOSHOP</span></span>
                            <span class="text-xs text-slate-400 font-medium">Invoice & Financial Accounting</span>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <nav class="hidden md:flex items-center space-x-1">
                    <a href="{{ route('dashboard') }}" 
                       class="px-3 py-2 rounded-lg text-sm font-semibold transition-colors {{ request()->routeIs('dashboard') ? 'bg-blue-600 text-white shadow' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                       <span class="mr-1.5">📊</span> Dashboard & Financials
                    </a>

                    <a href="{{ route('invoices.index') }}" 
                       class="px-3 py-2 rounded-lg text-sm font-semibold transition-colors {{ request()->routeIs('invoices.*') ? 'bg-blue-600 text-white shadow' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                       <span class="mr-1.5">📄</span> Invoices Management
                    </a>

                    <a href="{{ route('products.index') }}" 
                       class="px-3 py-2 rounded-lg text-sm font-semibold transition-colors {{ request()->routeIs('products.*') ? 'bg-blue-600 text-white shadow' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                       <span class="mr-1.5">🏷️</span> Product Catalog & Prices
                    </a>
                </nav>

                <!-- Quick Actions Header Buttons -->
                <div class="flex items-center space-x-2 no-print">
                    <a href="{{ route('products.create') }}" 
                       class="inline-flex items-center px-3 py-1.5 border border-slate-700 rounded-lg text-xs font-semibold text-slate-200 hover:bg-slate-800 hover:text-white transition shadow-sm">
                       <span>+ New Product</span>
                    </a>

                    <a href="{{ route('invoices.create') }}" 
                       class="inline-flex items-center px-3.5 py-1.5 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white text-xs font-bold rounded-lg transition shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                       <span>+ Create Invoice</span>
                    </a>
                </div>

            </div>
        </div>

        <!-- Mobile Navigation Sub-bar -->
        <div class="md:hidden bg-slate-800 px-4 py-2 flex justify-around border-t border-slate-700 text-xs font-medium no-print">
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'text-blue-400 font-bold' : 'text-slate-300' }}">Dashboard</a>
            <a href="{{ route('invoices.index') }}" class="{{ request()->routeIs('invoices.*') ? 'text-blue-400 font-bold' : 'text-slate-300' }}">Invoices</a>
            <a href="{{ route('products.index') }}" class="{{ request()->routeIs('products.*') ? 'text-blue-400 font-bold' : 'text-slate-300' }}">Products</a>
        </div>
    </header>

    <!-- Main Container Content -->
    <main class="flex-grow py-8 max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Global Notification Banner -->
        @if (session('success'))
            <div x-data="{ show: true }" x-show="show" class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl p-4 flex items-center justify-between shadow-sm no-print">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold">✓</div>
                    <p class="text-sm font-semibold">{{ session('success') }}</p>
                </div>
                <button @click="show = false" class="text-emerald-500 hover:text-emerald-800 text-sm font-bold">&times;</button>
            </div>
        @endif

        @if (session('error'))
            <div x-data="{ show: true }" x-show="show" class="mb-6 bg-rose-50 border border-rose-200 text-rose-800 rounded-xl p-4 flex items-center justify-between shadow-sm no-print">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center font-bold">!</div>
                    <p class="text-sm font-semibold">{{ session('error') }}</p>
                </div>
                <button @click="show = false" class="text-rose-500 hover:text-rose-800 text-sm font-bold">&times;</button>
            </div>
        @endif

        {{ $slot ?? '' }}
        @yield('content')

    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-slate-200 mt-auto py-6 no-print">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-xs text-slate-500">
            <p>&copy; {{ date('Y') }} 20MOTOSHOP - Financial Accounting & Invoice Application System. Built with Laravel 12 & Alpine.js.</p>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
