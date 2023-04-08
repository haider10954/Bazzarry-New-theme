<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class ProductWishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::with('Products')
            ->where('user_id', auth()->id())
            ->where('status', 1)
            ->get();
        return view('user.pages.wishlist', compact('wishlist'));
    }
    public function add_wishlist(Request $request)
    {
        $add_wishlist = Wishlist::create([
            'product_id' => $request['product_id'],
            'user_id' => $request['user_id'],
            'status' => 1,
        ]);

        if ($add_wishlist) {
            return json_encode([
                'success' => true,
                'message' => 'Product Successfully add to wishlist'
            ]);
        } else {
            return json_encode([
                'success' => false,
                'message' => 'Something Went Wrong! Please try again...',
            ]);
        }
    }

    public function delete_wishlist(Request $request)
    {
        $delte_wishlist = Wishlist::where('user_id', auth()->id())->where('id',$request->id)->delete();

        if($delte_wishlist)
        {
            return json_encode([
                'success' => true,
                'message' => 'Product Successfully remove from wishlist'
            ]);
        }
        else
        {
            return json_encode([
                'success' => false,
                'message' => 'Something Went Wrong! Please try again...',
            ]);
        }
    }

}
