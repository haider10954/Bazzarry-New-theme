<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Seller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public  function index()
    {
        $seller = Seller::get()->count();

        //Data For Donut Chart

        $all_products = Product::query()->get()->count();
        $published_product = Product::query()->where('status', 1)->get()->count();
        $unpublished_product = Product::query()->where('status', 0)->get()->count();

        //Bar Chart Data
        $all_sellers = Seller::query()->get()->count();
        $all_customers = User::query()->get()->count();
        $all_orders = Order::query()->get()->count();

        // Retrieve all orders grouped by month
        $orders = Order::select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as total_count ,SUM(total) as total_amount'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();
        foreach ($orders as $order) {
            $month = \Carbon\Carbon::create()->month($order->month)->format('F');
            $orderCount = $order->total_count;
            $total_amount = number_format($order->total_amount);
            // dd("Month: $month, Order Count: $orderCount , Total Amount in Rs : $total_amount");
        }

        return view('admin.pages.index', compact(
            'seller',
            'all_products',
            'published_product',
            'unpublished_product',
            'all_sellers',
            'all_customers',
            'all_orders'
        ));
    }
}
