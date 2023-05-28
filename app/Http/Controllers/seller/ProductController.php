<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\seller\AddProductRequest;
use App\Http\Requests\seller\EditProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Variant;
use App\Models\VariantValue;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(10);
        $pending_products = Product::where('status', 0)->get();
        $published_products = Product::where('status', 1)->get();
        return view('seller.pages.products', compact('products', 'pending_products', 'published_products'));
    }
    public function admin_products()
    {
        $products = Product::latest()->paginate(10);
        $pending_products = Product::where('status', 0)->get();
        $published_products = Product::where('status', 1)->get();
        return view('admin.pages.products', compact('products', 'pending_products', 'published_products'));
    }
    public function addProductView()
    {
        $data['category'] = Category::get();
        $data['variant'] = Variant::with('values')->get();
        return view('seller.pages.create_product')->with($data);
    }
    public function add_category(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
        ]);
        $category = Category::create([
            'name' => $request['name'],
            'status' => 'draft',
            'addedBy' => auth('seller')->id()
        ]);
        if ($category) {
            return json_encode([
                'success' => true,
                'message' => 'Category has been added successfully..'
            ]);
        } else {
            return json_encode([
                'success' => false,
                'message' => 'Something went wrong..'
            ]);
        }
    }

    public function add_product(AddProductRequest $request)
    {
        $files = [];
        if ($request->hasfile('fileUpload')) {
            foreach ($request->file('fileUpload') as $file) {
                $name = time() . mt_rand(300, 9000) . '.' . $file->extension();
                $file->storeAs('public/product-images', $name);
                $files[] = 'storage/product-images/' . $name;
            }
        }

        $coverImage = '';
        if ($request->hasfile('thumbnail')) {
            $name = time() . mt_rand(300, 9000) . '.' . $file->extension();
            $file->storeAs('public/product-thumbnail', $name);
            $coverImage = 'storage/product-thumbnail/' . $name;
        }
        $product = Product::create([
            'category_id' => $request['product_category'],
            'title' => $request['title'],
            'added_id' => auth()->id(),
            'description' => $request['description'],
            'images' => $files,
            'price' => $request['price'],
            'thumbnail' => $coverImage,
            'quantity' => $request['quantity'],
            'sku' => $request->sku,
            'manufacturer_name' => $request['manufacturer_name'] ?? null,
            'brand' => $request['brand'] ?? null,
            'discount' => $request['discount'] ?? null,
            'product_tags' => $request['product_tags'] ?? null,
            'status' => 0,
            'visibility' => $request['visibility'],
        ]);

        $slug = Product::where('id', $product->id)->update([
            'slug' => Str::slug($product->title . '-' . $product->id)
        ]);

        if ($product) {
           for ($i  = 0; $i < count($request->v_price); $i++) {
               ProductVariant::create([
                   'product_id' => $product->id,
                   'price' => $request->v_price[$i],
                   'quantity' => $request->v_quantity[$i],
                   'sku' => $request->v_sku[$i],
                   'variant_string' => json_decode($request->combination_val_json[$i], true),
                   'variant_array' => json_decode($request->combination_key_json[$i], true)
               ]);
           }
            return json_encode([
                'success' => true,
                'message' => 'Product has been added successfully',
            ]);
        } else {
            return json_encode([
                'success' => false,
                'message' => 'Something went wrong please try again later',
            ]);
        }
    }

    public function edit_product_view($slug)
    {
        $product = Product::where('slug', $slug)->first();

        $variant = Variant::with('values')->get();
        
        $data = [];
        foreach($variant as $key => $value)
        {
            $data[$value->name]['key'] = $value->id;
            $data[$value->name]['val'] = array_unique($product->variant->pluck('variant_string')->pluck($value->name)->toArray());
            $data[$value->name]['id'] = array_unique($product->variant->pluck('variant_array')->pluck($value->id)->toArray());
            $data[$value->name]['val'] = array_values($data[$value->name]['val']);
            $data[$value->name]['id'] = array_values($data[$value->name]['id']);
        }
        $product->v_data = $data;
        $category = Category::get();
        return view('seller.pages.edit_product', compact('product', 'variant', 'category'));
    }

    public function edit_product(EditProductRequest $request)
    {
        $product = Product::where('slug', $request->slug)->first();
        $photos = $product->images;
        if ($request->hasFile('thumbnail')) {
            $name = time() . mt_rand(300, 9000) . '.' . $request->thumbnail->extension();
            $request->thumbnail->storeAs('public/product-thumbnail', $name);
            $data['thumbnail'] = 'storage/product-thumbnail/' . $name;
        } else {
            $data['thumbnail'] = $product->thumbnail;
        }
        if ($request->hasfile('fileUpload')) {
            foreach ($request->file('fileUpload') as $file) {
                $name = time() . mt_rand(300, 9000) . '.' . $file->extension();
                $path = $file->storeAs('public/product-images', $name);
                $path = 'storage/product-images/' . $name;
                array_push($photos, $path);
            }
            $data['images'] = $photos;
        } else {
            $data['images'] = $product->images;
        }

        $data['title'] = $request['title'] ?? $product->title;
        $data['description'] = $request['description'] ?? $product->description;
        $data['manufacturer_name'] = $request['manufacturer_name'] ?? $product->manufacturer_name;
        $data['brand'] = $request['brand'] ?? $product->brand;
        $data['sku'] = $request['sku'] ?? $product->sku;
        $data['discount'] = $request['discount'] ?? $product->discount;
        $data['quantity'] = $request['quantity'] ?? $product->quantity;
        $data['price'] = $request['price'] ?? $product->price;
        $data['visibility'] = $request['visibility'] ?? $product->visibility;
        $data['product_tags'] = $request['product_tags'] ?? $product->product_tags;
        $data['category_id'] = $request['product_category'] ?? $product->category_id;

        $Updatedproduct = Product::where('id', $request->id)->update($data);
        $string = $request['title'];
        $words = explode(" ", $string); // break the string into words using a space as a delimiter
        $modified_string = implode("-", $words); // join the words using a dash as a delimiter

        $UpdateSlug = Product::where('id', $request->id)->update([
            'slug' => $modified_string . '-' . $request['id'],
            'added_id' => auth('seller')->id()
        ]);
        
        ProductVariant::where('product_id',$product->id)->delete();
        for ($i  = 0; $i < count($request->v_price); $i++) {
            ProductVariant::create([
                'product_id' => $product->id,
                'price' => $request->v_price[$i],
                'quantity' => $request->v_quantity[$i],
                'sku' => $request->v_sku[$i],
                'variant_string' => json_decode($request->combination_val_json[$i], true),
                'variant_array' => json_decode($request->combination_key_json[$i], true)
            ]);
        }

        if ($Updatedproduct) {
            return response()->json([
                'success' => true,
                'message' => 'Product updated successfully',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong',
            ]);
        }
    }


    public function delete_product(Request $request)
    {
        Product::where('id', $request->id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product deleted successfully'
        ]);
    }

    public function deleteProductImage(Request $request)
    {
        $product = Product::where('id', $request->id)->first();
        $myArray = $product->images;
        $key = array_search($request['selected_image'], $myArray);
        unset($myArray[$key]);
        $newArray = array_values($myArray);
        $updateProductImage = Product::where('id', $request->id)->update([
            'images' => $newArray
        ]);

        if ($updateProductImage) {
            return json_encode([
                'success' => true,
                'message' => "The product Image has been successfully deleted"
            ]);
        } else {
            return json_encode([
                'success' => false,
                'message' => "Something went wrong please try again later"
            ]);
        }
    }
}
