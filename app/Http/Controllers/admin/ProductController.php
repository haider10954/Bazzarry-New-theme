<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductOffer;
use App\Models\Variant;
use App\Models\VariantValue;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function change_status_active(Request $request)
    {
        $status = Product::where('id', $request->id)->where('status', 0)->update(
            [
                'status' => 1
            ]
        );;
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
    public function variants()
    {
        $category = Category::where('status','published')->get();
        $variants = Variant::query()->latest()->get();
        return view('admin.pages.variants',compact('category' , 'variants'));
    }

    public function change_status_Inactive(Request $request)
    {
        $status = Product::where('id', $request->id)->where('status', 1)->update(
            [
                'status' => 0
            ]
        );;
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

    public function admin_offers()
    {
        $product = Product::where('added_id', auth('seller')->id())->where('status', 1)->get();
        $offers = ProductOffer::paginate(10);
        $offers_pending = ProductOffer::where('status', 0)->paginate(10);
        $offers_active = ProductOffer::where('status', 1)->paginate(10);
        return view('admin.pages.offers', compact('product', 'offers_active', 'offers_pending', 'offers'));
    }

    public function change_offer_status_active(Request $request)
    {
        $status = ProductOffer::where('id', $request->id)->where('status', 0)->update(
            [
                'status' => 1
            ]
        );;
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

    public function change_offer_status(Request $request)
    {
        $status = ProductOffer::where('id', $request->id)->where('status', 1)->update(
            [
                'status' => 0
            ]
        );;
        if ($status) {
            return json_encode([
                'success' => true,
                'message' => 'Product offer status Updated successfully',
            ]);
        } else {
            return json_encode([
                'success' => false,
                'message' => 'Not changed',
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

    public function addProductVariant(Request $request)
    {
        if($request->has('type'))
        {
            $request->validate([
                'variant_value' => ['required','array','min:1'],
            ]);
            VariantValue::where('variant_id',$request->type)->delete();
            foreach($request->variant_value as $item)
            {
                VariantValue::create([
                    'variant_id' => $request->type,
                    'value' => $item
                ]);
            }
            $addProductVariant = true;
        }else{
            $request->validate([
                'variant_name' => 'required',
                'category' => 'required',
            ]);
            $addProductVariant = Variant::create([
                'category_id' => $request['category'],
                'name' => $request['variant_name'],
            ]);
        }
        if($addProductVariant)
        {
            return redirect()->back();
        }
        else
        {
            return redirect()->back('msg', 'Something went wrong please try again');
        }
    }
}
