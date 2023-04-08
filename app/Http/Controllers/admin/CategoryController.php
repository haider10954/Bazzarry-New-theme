<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        $published_category = Category::where('status', 'published')->get();
        $draft_category = Category::where('status', 'draft')->get();
        return view('admin.pages.category', compact('category', 'published_category', 'draft_category'));
    }

    public function add_category(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
        ]);
        $category = Category::create([
            'name' => $request['name'],
            'status' => 'draft',
            'addedBy' => 'admin'
        ]);
        if ($category) {
            return redirect()->back();
        } else {
            return redirect()->with('msg', 'something went wrong please try again later');
        }

    }

    public function change_status(Request $request)
    {
        $status_publish = Category::where('id', $request->id)->where('status', 'published')->update(
            [
                'status' => 'draft'
            ]);
        if ($status_publish) {
            return json_encode([
                'success' => true,
                'message' => 'Status Updated successfully',
            ]);
        } else {
            return json_encode([
                'success' => false,
                'message' => 'Not changed',
            ]);
        }
    }

    public function change_status_draft(Request $request)
    {
        $status_draft = Category::where('id', $request->id)->where('status', 'draft')->update(
            [
                'status' => 'published'
            ]);;
        if ($status_draft) {
            return json_encode([
                'success' => true,
                'message' => 'Status Updated successfully',
            ]);
        } else {
            return json_encode([
                'success' => false,
                'message' => 'Not changed',
            ]);
        }
    }


    public function delete_category(Request $request)
    {
        $delete = Category::where('id', $request->id)->delete();
        if ($delete) {
            return json_encode([
                'success' => true,
                'message' => 'Category has been deleted successfully'
            ]);
        } else {
            return json_encode([
                'success' => false,
                'message' => 'Something went wrong please try again later'
            ]);
        }
    }
    public function edit_category(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $category = Category::where('id', $request['id'])->update([
            'name' => $request['name']
        ]);
        if ($category) {
            return redirect()->back();
        } else {
            return redirect()->back()->with('error', 'Something went wrong Please try again.');
        }
    }
}
