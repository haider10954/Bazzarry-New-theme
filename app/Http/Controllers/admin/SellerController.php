<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index()
    {
        $seller = Seller::orderBy('id' , 'desc')->get();
        return view('admin.pages.sellers', compact('seller'));
    }

    public function delete_seller(Request $request)
    {
        $seller = Seller::where('id', $request->id)->delete();

        if ($seller) {
            return json_encode([
                'success' => true,
                'message' => 'Successfully deleted',
            ]);
        } else {
            return json_encode([
                'success' => false,
                'message' => 'Something went wrong please try again',
            ]);
        }
    }
}
