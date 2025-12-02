<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Order;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Produk::count();
        $totalOrders = Order::count();
        $totalRevenue = Order::sum('total_price');

        // Penjualan 7 hari terakhir untuk chart
        $salesData = Order::where('created_at', '>=', Carbon::now()->subDays(6))
            ->selectRaw('DATE(created_at) as date, SUM(total_price) as total')
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();

        // Format untuk Chart.js
        $labels = $salesData->pluck('date');
        $totals = $salesData->pluck('total');

        $recentOrders = Order::latest()->take(10)->get();

        return view('admin.dashboard', compact(
            'totalProducts',
            'totalOrders',
            'totalRevenue',
            'labels',
            'totals',
            'recentOrders'
        ));
    }
}