<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Seller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
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

        $list = [
            [
                'month' => 'Jan',
                'ordersCount' => 0,
                'totalAmount' => 0
            ],
            [
                'month' => 'Feb',
                'ordersCount' => 0,
                'totalAmount' => 0
            ],
            [
                'month' => 'Mar',
                'ordersCount' => 0,
                'totalAmount' => 0
            ],
            [
                'month' => 'Apr',
                'ordersCount' => 0,
                'totalAmount' => 0
            ],
            [
                'month' => 'May',
                'ordersCount' => 0,
                'totalAmount' => 0
            ],
            [
                'month' => 'Jun',
                'ordersCount' => 0,
                'totalAmount' => 0
            ],
            [
                'month' => 'Jul',
                'ordersCount' => 0,
                'totalAmount' => 0
            ],
            [
                'month' => 'Aug',
                'ordersCount' => 0,
                'totalAmount' => 0
            ],
            [
                'month' => 'Sep',
                'ordersCount' => 0,
                'totalAmount' => 0
            ],
            [
                'month' => 'Oct',
                'ordersCount' => 0,
                'totalAmount' => 0
            ],
            [
                'month' => 'Nov',
                'ordersCount' => 0,
                'totalAmount' => 0
            ],
            [
                'month' => 'Dec',
                'ordersCount' => 0,
                'totalAmount' => 0
            ]
        ];
        foreach ($orders as $order) {
            if (isset($list[$order->month - 1])) {
                $list[$order->month - 1]['ordersCount'] = $order->total_count;
                $list[$order->month - 1]['totalAmount'] = $order->total_amount;
            }
        }

        $list = collect($list);

        // Recent Orders 
        $recent_orders = Order::query()->latest()->get();

        // Best Products
        $best_product = Product::query()->where('added_id', auth('seller')->id())->where('sale_count', '>', 0)->orderBy('sale_count', 'DESC')->get();
        // dd($best_product);




        return view('seller.pages.index', compact(
            'seller',
            'all_products',
            'published_product',
            'unpublished_product',
            'all_sellers',
            'all_customers',
            'all_orders',
            'list',
            'recent_orders',
            'best_products',
        ));
    }
}
