<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Billing_detail;
use App\Models\Country;
use App\Models\City;
use App\Models\Order;
use App\Models\Shipping_detail;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use function GuzzleHttp\json_encode;

class CheckoutController extends Controller
{
    public function index()
    {
        $country = Country::get();
        $city = City::get();
        $state = State::get();
        return view('user.pages.checkout', compact('country', 'city', 'state'));
    }

    public function billing_address(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'country' => 'required',
            'city' => 'required',
            'state' => 'required',
            'email' => 'required|email',
        ]);
        $billing_address = Billing_detail::UpdateOrCreate([
            'user_id' => auth()->id()
        ], [
            'user_id' => auth()->id(),
            'name' => $request['firstname'],
            'email' => $request['email'],
            'last_name' => $request['lastname'],
            'address' => $request['address'],
            'country_id' => $request['country'],
            'state_id' => $request['state'],
            'city_id' => $request['city'],
            'postCode' => $request['postCode'] . '-' . $request['phone'],
        ]);

        if ($billing_address) {
            return redirect()->back()->with('msg', 'Your Billing Address has been Saved');
        } else {
            return redirect()->back()->with('msg', 'something went wrong please try again later');
        }
    }

    public function Shipping_address(Request $request)
    {
        $billing_details = Billing_detail::where('user_id', auth()->id())->first();
        if ($request->has('shipping_toggle') == true) {
            $shipping_address = Shipping_detail::UpdateOrCreate([
                'billing_details' => $billing_details->id
            ], [
                'billing_details' => $billing_details->id,
                'name' => $billing_details->name,
                'email' => $billing_details->email,
                'last_name' => $billing_details->last_name,
                'address' => $billing_details->address,
                'country_id' => $billing_details->country_id,
                'state_id' => $billing_details->state_id,
                'city_id' => $billing_details->city_id,
                'postCode' => $billing_details->postCode,
                'Order_notes' => $request['order-notes'] ?? NULL,
            ]);
        } else {
            $shipping_address = Shipping_detail::UpdateOrCreate([
                'billing_details' => $billing_details->id
            ], [
                'billing_details' => $billing_details->id,
                'name' => $request->shipping_name,
                'email' => $billing_details->email,
                'last_name' => $request->shipping_lastname,
                'address' => $request->address_1 . ' ' . $request->address_2,
                'country_id' => $billing_details->country_id,
                'state_id' => $billing_details->state_id,
                'city_id' => $billing_details->city_id,
                'postCode' => $request->postcode,
                'Order_notes' => $request['order-notes'] ?? NULL,
            ]);
        }



        if ($shipping_address) {
            return json_encode([
                'success' => true,
                'message' => 'Your Shipping Address has been saved successfully',
            ]);
        }
    }

    public function place_order(Request $request)
    {
        $billing_details = Billing_detail::where('user_id', auth()->id())->first();
        $shipping_details = Shipping_detail::where('billing_details', $billing_details->id)->first();

        $orderNumber = Str::uuid()->toString();
        $total = $request->total;
        $payment_method = $request->payment_method;
        $shipping_method = $request->shipping_method;
        $cart_items = serialize(session()->get('cart'));
        $place_order = Order::create([
            'user_id' => auth()->id(),
            'order_id' => $orderNumber,
            'billing_address' => $billing_details->id,
            'shipping_address' => $shipping_details->id,
            'status' => 0,
            'cart_items' => $cart_items,
            'total' => $total,
            'payment_method' => $payment_method,
            'shipping_method' => $shipping_method,
        ]);

        session()->forget('cart');
        if ($place_order) {
            return redirect()->route('order', $place_order->order_id);
        }
    }

    public function generate_invoice($orderNumber)
    {
        $order = Order::query()->with('getBillingAddress')->where('user_id', auth()->id())->where('order_id', $orderNumber)->first();
        return view('user.pages.order', compact('order'));
    }
}
