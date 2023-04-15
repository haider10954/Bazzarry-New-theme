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
use Stripe\Stripe;
use Stripe\Charge;
use GuzzleHttp\Client;

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use function GuzzleHttp\json_encode;

class CheckoutController extends Controller
{
    //Check out Page
    public function index()
    {
        $country = Country::get();
        $city = City::get();
        $state = State::get();
        return view('user.pages.checkout', compact('country', 'city', 'state'));
    }

    //Billing Address
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

    //Shipping Address
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

    // Stripe

    public function redirectToStripe(Request $request)
    {
        $data = [];
        $cart_items = session()->get('cart');

        $order_details = session()->get('order_details', []);
        $order_details = [
            "total" => $request->total,
            "payment_method" => $request->payment_method,
            "shipping_method" => $request->shipping_method
        ];
        session()->put('order_details', $order_details);
        foreach ($cart_items as $item) {
            $data[] = [
                'price_data' => [
                    'currency' => 'pkr',
                    'unit_amount' => $order_details['total'],
                    'product_data' => [
                        'name' => $item['product_name'],
                    ],
                ],
                'quantity' => $item['quantity'],
            ];
        }
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));

        $session = $stripe->checkout->sessions->create([
            'payment_method_types' => ['card'],
            'line_items' => [$data],
            'mode' => 'payment',
            'success_url' => route('stripe_redirect') . '?id={CHECKOUT_SESSION_ID}&type=success',
            'cancel_url' => route('stripe_redirect') . '?id={CHECKOUT_SESSION_ID}&type=error',
        ]);

        $session_url = $session->url;

        return redirect($session_url);
    }

    public function storeStripePayment(Request $request)
    {
        $order_details = session()->get('order_details');
        $billing_details = Billing_detail::where('user_id', auth()->id())->first();
        $shipping_details = Shipping_detail::where('billing_details', $billing_details->id)->first();
        if ($request->type == 'success') {
            $stripe = new \Stripe\StripeClient(
                env('STRIPE_SECRET_KEY')
            );
            $data = $stripe->checkout->sessions->retrieve(
                $request->id,
                []
            );
            $orderNumber = Str::uuid()->toString(2);
            $total = $order_details['total'];
            $payment_method = $order_details['payment_method'];
            $shipping_method = $order_details['shipping_method'];
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
                'transcation_id' => $request->id
            ]);
            session()->forget('cart');
            session()->forget('order_details');
            if ($place_order) {
                return redirect()->route('order', $place_order->order_id);
            }
        } else {
            return redirect()->route('checkout');
        }

        // Id db Save


    }

    //Pay Pal

    public function getAccessToken()
    {
        // Get the API credentials from the configuration file
        $clientId = 'Adt6D_5-xgpP2bMk11THjzJ6QiUJJ2c6pOQcmY2fO1QsdOqe_QVQrzxGOPEkDEKPfS7gTOLhfvt6_-le';
        $clientSecret = 'EGg1qNXjNLUt_L9FiJXxL1qLTwjKcToIgtk-LR1-cmHp1ncwrReRnb3QiJhXcjWSVE0N8OumYft2YEoB';

        // Define the OAuth 2.0 endpoint URL
        $url = 'https://api.sandbox.paypal.com/v1/oauth2/token';

        // Create a new Guzzle HTTP client instance
        $client = new Client();

        // Send a POST request to the OAuth 2.0 endpoint with the API credentials
        $response = $client->post($url, [
            'auth' => [$clientId, $clientSecret],
            'form_params' => [
                'grant_type' => 'client_credentials'
            ]
        ]);

        // Parse the JSON response and extract the access token
        $data = json_decode($response->getBody(), true);
        $accessToken = $data['access_token'];

        // Cache the access token for an hour
        cache(['paypal_access_token' => $accessToken], now()->addHour());

        return $accessToken;
    }

    public function createPaypalPayment(Request $request)
    {
        // Set up the PayPal SDK with your client ID and secret
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'Adt6D_5-xgpP2bMk11THjzJ6QiUJJ2c6pOQcmY2fO1QsdOqe_QVQrzxGOPEkDEKPfS7gTOLhfvt6_-le', // Client ID
                'EGg1qNXjNLUt_L9FiJXxL1qLTwjKcToIgtk-LR1-cmHp1ncwrReRnb3QiJhXcjWSVE0N8OumYft2YEoB' // Client Secret
            )
        );

        // Create a new payer object and set payment method to PayPal
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        // Set up the item details
        $item = new Item();
        $item->setName('My Item')
            ->setCurrency('PKR')
            ->setQuantity(1)
            ->setPrice('10');

        $data = array($item);
        dd($data);
        $itemList = new ItemList();
        $itemList->setItems();

        // Set up the transaction details
        $transaction = new Transaction();
        $transaction->setItemList($itemList)
            ->setDescription('My Item')
            ->setAmount(new Amount([
                'total' => '10.00',
                'currency' => 'USD',
                'details' => new Details([
                    'subtotal' => '10.00',
                    'tax' => '0.00',
                    'shipping' => '0.00'
                ])
            ]));

        // Set up the redirect URLs
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('paypal.executePayment'))
            ->setCancelUrl(route('paypal.cancelPayment'));

        // Create the payment object
        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions([$transaction]);

        // Create the payment
        $payment->create($apiContext);

        // Get the approval URL and redirect the user
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() === 'approval_url') {
                $redirectUrl = $link->getHref();
                return redirect()->away($redirectUrl);
            }
        }

        dd('error');
    }

    public function executePayPalPayment(Request $request)
    {
        $payerId = $request->get('PayerID');
        $paymentId = $request->get('paymentId');

        $client = new Client();
        $response = $client->post("https://api.sandbox.paypal.com/v1/payments/payment/$paymentId/execute", [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $this->getAccessToken()
            ],
            'json' => [
                'payer_id' => $payerId,
                'transactions' => [
                    [
                        'amount' => [
                            'total' => '10.00',
                            'currency' => 'USD'
                        ]
                    ]
                ]
            ]
        ]);

        $data = json_decode($response->getBody(), true);
        dd($data);
    }

    public function cancelPayment()
    {
        return 'Payment cancelled';
    }

    public function place_order(Request $request)
    {
        $billing_details = Billing_detail::where('user_id', auth()->id())->first();
        $shipping_details = Shipping_detail::where('billing_details', $billing_details->id)->first();
        if ($request->payment_method == "Stripe") {
            return $this->redirectToStripe($request);
        } elseif ($request->payment_method == "Paypal") {
            return $this->createPaypalPayment($request);
        } else {
            $orderNumber = Str::uuid()->toString();
            if ($request->shipping_method == "flat Rate") {
                $total = $request->total - ($request->total * 5 / 100);
            } else {
                $total = $request->total;
            }
            $payment_method = $request->payment_method;
            $shipping_method = $request->shipping_method;
            $transcation_id = 'COD-' . Str::uuid()->toString(2);
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
                'transcation_id' => $transcation_id
            ]);
        }

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

    public function processPayment(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $charge = Charge::create([
            'amount' => 100,
            'currency' => 'usd',
            'source' => $request->stripeToken,
            'description' => 'Payment for your product or service'
        ]);
        dd($charge);
        // Process the payment and return a response
    }
}
