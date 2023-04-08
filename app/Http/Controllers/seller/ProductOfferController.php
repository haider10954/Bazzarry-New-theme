<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\seller\AddProductOffer;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductOffer;
use Illuminate\Http\Request;

class ProductOfferController extends Controller
{
    public function fetchCategory(Request $request)
    {
        $category = Category::where('id', $request->CategoryID)->get();
        return json_encode([
            'success' => true,
            'Category' => $category
        ]);
    }
    public function index()
    {
        $product = Product::where('added_id', auth('seller')->id())->where('status', 1)->get();
        $offers = ProductOffer::paginate(10);
        $offers_pending = ProductOffer::where('status', 0)->paginate(10);
        $offers_active = ProductOffer::where('status', 1)->paginate(10);
        return view('seller.pages.offers', compact('product', 'offers_active', 'offers_pending', 'offers'));
    }
    public function add_product_offer(AddProductOffer $request)
    {
        $bannerImage = "";
        if ($request->hasFile('banner_image')) {
            $bannerImage = time() . '.' . $request->banner_image->extension();
            $request->banner_image->storeAs('public/product-offer-image', $bannerImage);
            $bannerImage = 'storage/product-offer-image/' . $bannerImage;
        }

        $productOffer = ProductOffer::create([
            'product_id' => $request['product'],
            'category_id' => $request['category'],
            'description' => $request['description'],
            'banner_image' => $bannerImage,
            'EndDate' => $request['end_date'],
            'Discount' => $request['Discount'],
            'status' => 0,
        ]);

        if ($productOffer) {
            return json_encode([
                'success' => true,
                'message' => 'Product Offer has been created successfully'
            ]);
        } else {
            return json_encode([
                'success' => false,
                'message' => 'Something went wrong with your request'
            ]);
        }
    }

    public function delete_product_offer(Request $request)
    {
        $delete = ProductOffer::where('id', $request->id)->delete();
        if ($delete) {
            return json_encode([
                'success' => true,
                'message' => 'Product Offer has been deleted successfully'
            ]);
        } else {
            return json_encode([
                'success' => false,
                'message' => 'Something went wrong please try again later'
            ]);
        }
    }
}
