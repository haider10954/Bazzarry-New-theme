<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
        $Product_review = Review::with('getProduct', 'getUser')->where('product_id', $product->id)->orderBy('id', 'desc')->limit(5)->get();

        $firstReview = Review::where('product_id', $product->id)->first();
        $reviews = Review::where('product_id', $product->id)->get();
        $averageRating = 0;
        $countrating = 0;
        if ($reviews->count() > 0) {

            $totalRatting = DB::table('reviews')->where('product_id', $product->id)->sum('rating');
            $averageRating = $totalRatting / ($reviews->count() * 5) * 100;

            $countrating = $totalRatting / $reviews->count();
        }

        return view('user.pages.product-details', compact('product', 'related_products', 'Product_review', 'reviews', 'firstReview', 'averageRating', 'countrating'));
    }

    public function add_to_cart(Request $request)
    {
        $id = $request->id;
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $actualPrize = $product->price - ($product->discount  / 100 * $product->price);
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
            if ($request->type == "Minus") {
                $cart[$request->id]["quantity"]--;
            } else {
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

    public function generateCombinations($arrays, $index = 0, $currentCombination = [])
    {
        if ($index >= count(array_keys($arrays))) {
            return [$currentCombination];
        }

        $results = [];

        foreach ($arrays[array_keys($arrays)[$index]] as $value) {
            $k = array_keys($arrays)[$index];
            $currentCombination[$k] = $value;

            $combinations = $this->generateCombinations($arrays, $index + 1, $currentCombination);
            foreach ($combinations as $combination) {
                $results[] = $combination;
            }
        }

        return $results;
    }

    public function getAllProducts()
    {
        $arr = request('variant') ?? [];
        $combinations = [];
        if (count($arr) > 0) {
            $combinations = $this->generateCombinations($arr);
        }


        $products = \App\Models\Product::query()
            ->when(count($combinations) > 0, function ($q) use ($combinations) {
                $q->whereIn('id', function ($query) use ($combinations) {
                    $query_str = $query->select('product_id')->from('product_variants');
                    foreach ($combinations as $val) {
                        $query_str->orWhere(function($subQuery) use($val){
                            foreach ($val as $k => $v) {
                                $comb = '"' . $k . '":"' . $v . '"';
                                $subQuery->where('variant_string', 'LIKE', '%' . $comb . '%');
                            }
                        });
                        
                    }
                });
            })
            ->when(request('category') && !empty(request('category')), function ($query) {
                $id = Category::select('id')->where('name', request('category'))->first();
                $query->where('category_id', $id->id);
            })
            ->with('getCategory')
            ->when(request('search') && !empty(request('search')), function ($query) {
                $query->where('title', 'LIKE', '%' . request('search') . '%');
            })
            ->orderBy('id', 'desc')
            ->get();
        return view('user.pages.products', compact('products'));
    }
    public function clearCart()
    {
        $cart = session()->get('cart');
        if ($cart) {
            session()->forget('cart');
            return response()->json([
                'success' => true,
                'message' => 'Cart items removed successfully'
            ]);
        }
    }
}
