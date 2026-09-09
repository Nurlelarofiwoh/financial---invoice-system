<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#0f172a">
    <title>{{ $title ?? 'Financial Accounting & Invoice System' }} - MotoShop Financials</title>
    
    <!-- Tailwind CSS v4 CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js CDN -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- html2canvas CDN for PNG/JPG Invoice Export -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

    <!-- Font Family (Plus Jakarta Sans) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            -webkit-text-size-adjust: 100%;
            overflow-x: hidden;
        }

        /* Smooth mobile transitions */
        #mobile-menu {
            transition: max-height 0.3s ease, opacity 0.3s ease;
            overflow: hidden;
        }

        /* Responsive table utility */
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            border-radius: 0 0 1rem 1rem;
        }

        /* Mobile card view: hide table, show cards on mobile */
        .mobile-card-view .desktop-table { display: none; }
        .mobile-card-view .mobile-cards  { display: block; }

        @media (min-width: 768px) {
            .mobile-card-view .desktop-table { display: block; }
            .mobile-card-view .mobile-cards  { display: none; }
        }

        /* Invoice card on mobile */
        .invoice-mobile-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 1rem;
            padding: 1rem;
            margin-bottom: 0.75rem;
            transition: box-shadow 0.15s;
        }
        .invoice-mobile-card:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        /* Touch-friendly minimum tap size */
        @media (max-width: 767px) {
            button, a[href], input, select, textarea {
                touch-action: manipulation;
            }
            .tap-target {
                min-height: 44px;
                display: flex;
                align-items: center;
            }
            /* Wrap action buttons on mobile */
            .action-btn-group {
                display: flex;
                flex-wrap: wrap;
                gap: 0.5rem;
            }
        }

        /* Safe area for notch devices */
        @supports (padding: max(0px)) {
            body {
                padding-left: max(0px, env(safe-area-inset-left));
                padding-right: max(0px, env(safe-area-inset-right));
            }
        }

        /* Number/currency truncation on small screens */
        .currency-sm {
            max-width: 120px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
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
    <header class="bg-slate-900 text-white shadow-lg sticky top-0 z-50 no-print" x-data="{ mobileMenuOpen: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-14 sm:h-16">
                
                <!-- Logo & Brand Title -->
                <div class="flex items-center space-x-2 sm:space-x-3">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 sm:space-x-3 group">
                        <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl bg-black border border-slate-700 p-0.5 flex items-center justify-center shadow-md group-hover:scale-105 transition-transform shrink-0 overflow-hidden">
                            <img src="{{ asset('images/logo-20motoshop.jpg') }}" alt="20MOTOSHOP Logo" class="w-full h-full object-cover rounded-lg">
                        </div>
                        <div>
                            <span class="font-extrabold text-base sm:text-lg tracking-tight text-white block">20<span class="text-amber-400">MOTOSHOP</span></span>
                            <span class="hidden sm:block text-xs text-slate-400 font-medium">Invoice & Financial Accounting</span>
                        </div>
                    </a>
                </div>

                <!-- Desktop Navigation Links -->
                <nav class="hidden lg:flex items-center space-x-1">
                    <a href="{{ route('dashboard') }}" 
                       class="px-3 py-2 rounded-lg text-sm font-semibold transition-colors {{ request()->routeIs('dashboard') ? 'bg-blue-600 text-white shadow' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                       <span class="mr-1.5">📊</span> Dashboard & Financials
                    </a>

                    <a href="{{ route('invoices.index') }}" 
                       class="px-3 py-2 rounded-lg text-sm font-semibold transition-colors {{ request()->routeIs('invoices.*') ? 'bg-blue-600 text-white shadow' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                       <span class="mr-1.5">📄</span> Invoices
                    </a>

                    <a href="{{ route('products.index') }}" 
                       class="px-3 py-2 rounded-lg text-sm font-semibold transition-colors {{ request()->routeIs('products.*') ? 'bg-blue-600 text-white shadow' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                       <span class="mr-1.5">🏷️</span> Products
                    </a>
                </nav>

                <!-- Right Side: Quick Actions + Hamburger -->
                <div class="flex items-center space-x-2 no-print">
                    <!-- Desktop Quick Action Buttons -->
                    <div class="hidden md:flex items-center space-x-2">
                        <a href="{{ route('products.create') }}" 
                           class="inline-flex items-center px-3 py-1.5 border border-slate-700 rounded-lg text-xs font-semibold text-slate-200 hover:bg-slate-800 hover:text-white transition shadow-sm">
                           <span>+ Product</span>
                        </a>
                        <a href="{{ route('invoices.create') }}" 
                           class="inline-flex items-center px-3.5 py-1.5 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white text-xs font-bold rounded-lg transition shadow-md">
                           <span>+ Invoice</span>
                        </a>
                    </div>

                    <!-- Mobile Create Invoice Button (always visible on mobile) -->
                    <a href="{{ route('invoices.create') }}" 
                       class="md:hidden inline-flex items-center px-2.5 py-1.5 bg-blue-600 text-white text-xs font-bold rounded-lg transition shadow-md">
                       <span>+ Invoice</span>
                    </a>

                    <!-- Hamburger Menu Button (mobile only) -->
                    <button @click="mobileMenuOpen = !mobileMenuOpen" 
                            class="lg:hidden p-2 rounded-lg text-slate-300 hover:bg-slate-800 hover:text-white transition"
                            aria-label="Toggle navigation">
                        <svg x-show="!mobileMenuOpen" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <svg x-show="mobileMenuOpen" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

            </div>
        </div>

        <!-- Mobile Dropdown Menu -->
        <div id="mobile-menu" x-show="mobileMenuOpen" x-cloak
             class="lg:hidden bg-slate-800 border-t border-slate-700 no-print">
            <nav class="px-4 py-3 space-y-1">
                <a href="{{ route('dashboard') }}" 
                   class="flex items-center space-x-3 px-3 py-3 rounded-xl text-sm font-semibold transition {{ request()->routeIs('dashboard') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-slate-700 hover:text-white' }}">
                   <span class="text-base">📊</span><span>Dashboard & Financials</span>
                </a>
                <a href="{{ route('invoices.index') }}" 
                   class="flex items-center space-x-3 px-3 py-3 rounded-xl text-sm font-semibold transition {{ request()->routeIs('invoices.*') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-slate-700 hover:text-white' }}">
                   <span class="text-base">📄</span><span>Invoices Management</span>
                </a>
                <a href="{{ route('products.index') }}" 
                   class="flex items-center space-x-3 px-3 py-3 rounded-xl text-sm font-semibold transition {{ request()->routeIs('products.*') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-slate-700 hover:text-white' }}">
                   <span class="text-base">🏷️</span><span>Product Catalog & Prices</span>
                </a>
                <!-- Mobile Quick Actions -->
                <div class="pt-2 border-t border-slate-700 grid grid-cols-2 gap-2">
                    <a href="{{ route('products.create') }}" 
                       class="flex items-center justify-center px-3 py-2.5 border border-slate-600 rounded-xl text-xs font-semibold text-slate-200 hover:bg-slate-700 transition">
                       ➕ New Product
                    </a>
                    <a href="{{ route('invoices.create') }}" 
                       class="flex items-center justify-center px-3 py-2.5 bg-blue-600 hover:bg-blue-500 text-white text-xs font-bold rounded-xl transition">
                       📄 Create Invoice
                    </a>
                </div>
            </nav>
        </div>

        <!-- Tablet Bottom Navigation Sub-bar (md only, not lg) -->
        <div class="hidden md:flex lg:hidden bg-slate-800 px-4 py-2 justify-around border-t border-slate-700 text-xs font-medium no-print">
            <a href="{{ route('dashboard') }}" class="flex items-center space-x-1.5 py-1 {{ request()->routeIs('dashboard') ? 'text-blue-400 font-bold' : 'text-slate-300' }}">
                <span>📊</span><span>Dashboard</span>
            </a>
            <a href="{{ route('invoices.index') }}" class="flex items-center space-x-1.5 py-1 {{ request()->routeIs('invoices.*') ? 'text-blue-400 font-bold' : 'text-slate-300' }}">
                <span>📄</span><span>Invoices</span>
            </a>
            <a href="{{ route('products.index') }}" class="flex items-center space-x-1.5 py-1 {{ request()->routeIs('products.*') ? 'text-blue-400 font-bold' : 'text-slate-300' }}">
                <span>🏷️</span><span>Products</span>
            </a>
        </div>
    </header>

    <!-- Main Container Content -->
    <main class="flex-grow py-4 sm:py-6 lg:py-8 max-w-7xl w-full mx-auto px-3 sm:px-6 lg:px-8">
        
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
