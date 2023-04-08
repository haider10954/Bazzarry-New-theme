<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\seller\AddAdvertisementRequest;
use App\Models\Advertisement;
use App\Models\Product;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    public function index()
    {
        $product = Product::get();
        $all_ADs = Advertisement::get();
        $ADs_active = Advertisement::where('status', 1)->get();
        $ADs_inactive = Advertisement::where('status', 0)->get();
        return view('seller.pages.advertisement', compact('product', 'all_ADs', 'ADs_active', 'ADs_inactive'));
    }
    public function admin_index()
    {
        $product = Product::get();
        $all_ADs = Advertisement::get();
        $ADs_active = Advertisement::where('status', 1)->get();
        $ADs_inactive = Advertisement::where('status', 0)->get();
        return view('admin.pages.advertisement', compact('product', 'all_ADs', 'ADs_active', 'ADs_inactive'));
    }

    public function advertisement_status_active(Request $request)
    {
        $status = Advertisement::where('id', $request->id)->where('status', 1)->update(
            [
                'status' => 0
            ]
        );
        if ($status) {
            return json_encode([
                'success' => true,
                'message' => 'Product status Updated successfully',
            ]);
        } else {
            return json_encode([
                'success' => false,
                'message' => 'Not changed',
            ]);
        }
    }
    public function advertisement_status_in_active(Request $request)
    {
        $status = Advertisement::where('id', $request->id)->where('status', 0)->update(
            [
                'status' => 1
            ]
        );
        if ($status) {
            return json_encode([
                'success' => true,
                'message' => 'Product status Updated successfully',
            ]);
        } else {
            return json_encode([
                'success' => false,
                'message' => 'Not changed',
            ]);
        }
    }
    public function add_advertisement(AddAdvertisementRequest $request)
    {
        $bannerImage = "";
        if ($request->hasFile('banner_image')) {
            $bannerImage = time() . '.' . $request->banner_image->extension();
            $request->banner_image->storeAs('public/product-advertisement-image', $bannerImage);
            $bannerImage = 'storage/product-advertisement-image/' . $bannerImage;
        }

        $productAdvertisement = Advertisement::create([
            'product_id' => $request['product'],
            'title' => $request['title'],
            'description' => $request['description'],
            'banner_image' => $bannerImage,
            'status' => 0,
        ]);

        if ($productAdvertisement) {
            return json_encode([
                'success' => true,
                'message' => 'Product Advertisement has been created successfully'
            ]);
        } else {
            return json_encode([
                'success' => false,
                'message' => 'Something went wrong with your request'
            ]);
        }
    }
}
