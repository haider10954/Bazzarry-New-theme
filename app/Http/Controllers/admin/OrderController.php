<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin.pages.orders', compact('orders'));
    }
    public function Delete_Record(Request $request)
    {
        $delete = Order::where('id', $request->id)->delete();
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
    public function view_orders($id)
    {
        $order = Order::query()->where('id',$id)->first();
        return view('admin.pages.order_details',compact('order'));
    }
    public function update_order_status(Request $request)
    {
        $order = Order::where('id',$request->id)->update([
            'status'=>1,
        ]);
        if($order)
        {
            return json_encode([
                'success'=>true,
                'message'=>'Order has been updated'
            ]);
        }
        else
        {
            return json_encode([
                'success'=>false,
                'message'=>'Order not conpleted'
            ]);
        }
    }
    
}
