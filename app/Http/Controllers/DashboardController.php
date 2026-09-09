<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $currentMonthStart = Carbon::now()->startOfMonth()->format('Y-m-d');
        $currentMonthEnd = Carbon::now()->endOfMonth()->format('Y-m-d');

        // 1. Core Summary Metrics
        $totalInvoicesCount = Invoice::count();
        $totalRevenueOverall = Invoice::where('payment_status', 'paid')->sum('total_amount');
        
        $currentMonthPaidRevenue = Invoice::where('payment_status', 'paid')
            ->whereBetween('issue_date', [$currentMonthStart, $currentMonthEnd])
            ->sum('total_amount');

        $paidInvoicesCount = Invoice::where('payment_status', 'paid')->count();
        $paidInvoicesAmount = $totalRevenueOverall;

        $unpaidInvoicesCount = Invoice::where('payment_status', 'unpaid')->count();
        $unpaidInvoicesAmount = Invoice::where('payment_status', 'unpaid')->sum('total_amount');

        $overdueInvoicesCount = Invoice::where('payment_status', 'overdue')->count();
        $overdueInvoicesAmount = Invoice::where('payment_status', 'overdue')->sum('total_amount');

        // 2. Monthly Financial Breakdown Table (grouped by Month & Year)
        $monthlyBreakdown = DB::table('invoices')
            ->select(
                DB::raw("DATE_FORMAT(issue_date, '%Y-%m') as month_key"),
                DB::raw("DATE_FORMAT(issue_date, '%M %Y') as month_label"),
                DB::raw("COUNT(id) as total_invoices"),
                DB::raw("SUM(CASE WHEN payment_status = 'paid' THEN total_amount ELSE 0 END) as paid_revenue"),
                DB::raw("SUM(CASE WHEN payment_status != 'paid' THEN total_amount ELSE 0 END) as pending_amount"),
                DB::raw("SUM(total_amount) as aggregate_income")
            )
            ->groupBy('month_key', 'month_label')
            ->orderBy('month_key', 'desc')
            ->get();

        // 3. Past 6 Months Chart Data
        $chartLabels = [];
        $chartPaidData = [];
        $chartPendingData = [];

        for ($i = 5; $i >= 0; $i--) {
            $monthObj = Carbon::now()->subMonths($i);
            $key = $monthObj->format('Y-m');
            $label = $monthObj->format('M Y');

            $row = $monthlyBreakdown->firstWhere('month_key', $key);

            $chartLabels[] = $label;
            $chartPaidData[] = $row ? (float) $row->paid_revenue : 0;
            $chartPendingData[] = $row ? (float) $row->pending_amount : 0;
        }

        // 4. "Top Frequent Products" Sales Analytics
        // Ranked by total quantity sold & overall revenue generated
        $topProducts = DB::table('invoice_items')
            ->join('products', 'invoice_items.product_id', '=', 'products.id')
            ->select(
                'products.id',
                'products.product_code',
                'products.name',
                'products.category',
                'products.unit_price',
                DB::raw('SUM(invoice_items.quantity) as total_quantity_sold'),
                DB::raw('SUM(invoice_items.subtotal) as total_revenue_generated'),
                DB::raw('COUNT(DISTINCT invoice_items.invoice_id) as total_invoices_appeared')
            )
            ->groupBy('products.id', 'products.product_code', 'products.name', 'products.category', 'products.unit_price')
            ->orderBy('total_quantity_sold', 'desc')
            ->take(5)
            ->get();

        $maxQtySold = $topProducts->max('total_quantity_sold') ?: 1;

        return view('dashboard.index', compact(
            'totalInvoicesCount',
            'totalRevenueOverall',
            'currentMonthPaidRevenue',
            'paidInvoicesCount',
            'paidInvoicesAmount',
            'unpaidInvoicesCount',
            'unpaidInvoicesAmount',
            'overdueInvoicesCount',
            'overdueInvoicesAmount',
            'monthlyBreakdown',
            'chartLabels',
            'chartPaidData',
            'chartPendingData',
            'topProducts',
            'maxQtySold'
        ));
    }
}
