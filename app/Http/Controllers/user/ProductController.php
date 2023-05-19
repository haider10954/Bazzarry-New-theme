<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function cart()
    {
        return view('user.pages.cart');
    }
    public function index($slug)
    {
        $product = Product::with(['getCategory'])->where('slug', $slug)->first();

        $related_products = Product::query()
            ->where('id', '!=', $product->id)
            ->where('added_id', '=', $product->added_id)
            ->where('status', 1)
            ->get();

        // Get Review
        $Product_review = Review::where('product_id', $product->id)->get();

        $firstReview = Review::where('product_id', $product->id)->first();
        $reviews = Review::where('product_id', $product->id)->get();
        $averageRating = 0;
        if ($reviews->count() > 0) {

            $totalRatting = DB::table('reviews')->sum('rating');
            $averageRating = $totalRatting / ($reviews->count() * 5) * 100;
        }

        return view('user.pages.product-details', compact('product','related_products' ,'Product_review', 'reviews', 'firstReview', 'averageRating'));
    }

    public function add_to_cart(Request $request)
    {
        $id = $request->id;
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $actualPrize = $product->price - ($product->discount  /100 * $product->price);
            $cart[$id] = [
                "product_id" => $product->id,
                "product_name" => $product->title,
                "product_slug" => $product->slug,
                "photo" => $product->thumbnail,
                "price" => !empty($product->discount) ? $actualPrize : $product->price,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);
        return response()->json([
            'success' => true,
            'message' => 'Product has been successfully added to cart',
        ]);
    }

    public function update(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if($request->type == "Minus")
            {
                $cart[$request->id]["quantity"]--;
            }
            else
            {
                $cart[$request->id]["quantity"]++;
            }

            session()->put('cart', $cart);
            return response()->json([
                'success' => true,
                'message' => 'Cart successfully updated!',
            ]);
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return response()->json([
                'success' => true,
                'message' => 'Cart item removed successfully'
            ]);
        }
    }
    public function getAllProducts()
    {
        $products = \App\Models\Product::query()->with('getCategory')->orderBy('id','desc')->get();
        return view('user.pages.products',compact('products'));
    }
}
