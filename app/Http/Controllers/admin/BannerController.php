<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banner = Banner::latest()->get();
        return View('admin.pages.banners', compact('banner'));
    }
    public function addBanner(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
        ]);
        $mainImageName = "";
        if ($request->hasFile('image')) {
            $mainImageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/banner-images', $mainImageName);
            $mainImageName = 'storage/banner-images/' . $mainImageName;
        }
        $banner = Banner::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'status' => $request['status'],
            'image' => $mainImageName
        ]);

        $CreateSlug = Banner::where('id', $banner->id)->update([
            'slug' => Str::slug('banner-' . $banner->id)
        ]);

        if ($banner) {
            return json_encode([
                'success' => true,
                'message' => 'Banner added successfully',
            ]);
        } else {
            return json_encode([
                'success' => false,
                'message' => 'Something went wrong please try again',
            ]);
        }
    }

    public function delete_cbanner(Request $request)
    {
        $delete = Banner::where('id', $request->id)->delete();
        if ($delete) {
            return json_encode([
                'success' => true,
                'message' => 'Banner has been deleted successfully'
            ]);
        } else {
            return json_encode([
                'success' => false,
                'message' => 'Something went wrong please try again later'
            ]);
        }
    }

    public function editBanner(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'image' => 'mimes:png,jpg,jpeg',
        ]);

        $data = [
            'title' => $request['title'],
            'description' => $request['description'],
            'status' => $request['status'],
        ];
        $mainImageName = "";
        if ($request->hasFile('image')) {
            $mainImageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/banner-images', $mainImageName);
            $mainImageName = 'storage/banner-images/' . $mainImageName;
            $data['image'] = $mainImageName;
        }

        $banner = Banner::where('id', $request->id)->update($data);

        if ($banner) {
            return json_encode([
                'success' => true,
                'message' => 'Banner has been updated successfully',
            ]);
        } else {
            return json_encode([
                'success' => false,
                'message' => 'Something went wrong please try again',
            ]);
        }
    }
}
