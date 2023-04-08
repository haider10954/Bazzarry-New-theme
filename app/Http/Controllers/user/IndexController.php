<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductOffer;
use App\Models\Review;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $banner = Banner::latest()->get();

        $offers = ProductOffer::query()
            ->inRandomOrder()
            ->where('status', 1)
            ->take(2)
            ->get();

        $advertisement = Advertisement::where('status', 1)
            ->inRandomOrder()
            ->latest()
            ->first();

        //Get Categories
        $categories = Category::where('status', 'published')->get();
        //Get Random Product
        $product = Product::orderByRaw('RAND()')->whereNotNull('discount')->take(2)->get();

        $new_arrival = Product::query()
            ->where('status', 1)
            ->where('visibility', 1)
            ->get();

        // Top Rated Product
        $top_rated_product = Review::with('getProduct')->where('rating' , '<=', '4')->get();

        return view('user.pages.index', compact('banner', 'offers', 'advertisement', 'product', 'categories', 'new_arrival' , 'top_rated_product'));
    }

    public function getProductByCategory(Request $request)
    {
        $html = '';
        $product = Product::where('category_id', $request->categoryId)->where('status', 1)->first();
        $html .= view('user.render.product')->with('product', $product)->render();
        if ($product) {
            return json_encode([
                'success' => true,
                'data' => $html
            ]);
        }
    }
}
