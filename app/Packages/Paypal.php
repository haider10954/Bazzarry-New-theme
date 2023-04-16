<?php

namespace App\Packages;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\config;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class Paypal
{

    private string $publishKey,$secretKey,$apiURL;

    public function __construct()
    {
        if(config('paypal.settings.mode') == 'live')
        {
            $this->publishKey = config('paypal.client_id');
            $this->secretKey = config('paypal.secret');
            $this->apiURL = 'https://api.paypal.com/';
        }elseif(config('paypal.settings.mode') == 'sandbox')
        {
            $this->publishKey = config('paypal.client_id');
            $this->secretKey = config('paypal.secret');
            $this->apiURL = 'https://api-m.sandbox.paypal.com/';
        }else{
            abort(404);
        }
    }

    public function getAccessToken()
    {
        $response = Http::contentType('application/x-www-form-urlencoded')
            ->withBasicAuth($this->publishKey, $this->secretKey)
            ->asForm()
            ->post($this->apiURL . 'v1/oauth2/token', [
                'grant_type' => 'client_credentials'
            ])->collect();
        if ($response->has('access_token')) {
            return $response['access_token'];
        }
        abort(500);
    }

    public function createOrder($total): Collection
    {
        return Http::acceptJson()->withHeaders([
            'Authorization' => 'Bearer '.$this->getAccessToken(),
            'PayPal-Request-Id' => Str::random(4).'-'.Str::random(4).'-'.Str::random(4).'-'.Str::random(4).'-'.Str::random(4)
        ])->post($this->apiURL.'v2/checkout/orders',[
            'intent' => 'CAPTURE',
            'purchase_units' => [
                [
                    'reference_id' => Str::random(16).time(),
                    'amount' => [
                        'currency_code' => 'USD',
                        'value' => round($total,2),
                        'breakdown' => [
                            'item_total' => [
                                'currency_code' => 'USD',
                                'value' => round($total,2)
                            ]
                        ]
                    ],
//                    'items' => $items
                ]
            ],
            'payment_source' => [
                'paypal' => [
                    'experience_context' => [
                        'payment_method_preference' => 'IMMEDIATE_PAYMENT_REQUIRED',
                        'payment_method_selected' => 'PAYPAL',
                        'user_action' => 'CONTINUE',
                        'return_url' => route('paypal.executePayment'),
                        'cancel_url' => route('paypal.cancelPayment')
                    ]
                ]
            ]
        ])->collect();
    }

    public function orderDetails($orderID)
    {
        return Http::acceptJson()->withHeaders([
            'Authorization' => 'Bearer '.$this->getAccessToken()
        ])->get($this->apiURL.'v2/checkout/orders/'.$orderID)->collect();
    }

    public function capturePayment($orderID)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api-m.sandbox.paypal.com/v2/checkout/orders/'.$orderID.'/capture');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: Bearer '.$this->getAccessToken();
        $headers[] = 'Paypal-Request-Id: '.Str::random(4).'-'.Str::random(4).'-'.Str::random(4).'-'.Str::random(4).'-'.Str::random(4);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        return collect(json_decode($result,true));
    }

}
