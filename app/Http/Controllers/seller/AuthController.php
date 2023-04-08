<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function seller_signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:sellers',
            'phone_number' => 'required',
            'password' => 'required|min:6|max:15'
        ]);

        $seller = Seller::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone_number' => $request['phone_number'],
            'password' => Hash::make($request->password),
        ]);

        if ($seller) {
            return json_encode([
                'success' => true,
                'message' => 'Account has been registered successfully',
            ]);
        } else {
            return json_encode([
                'success' => false,
                'message' => 'Sorry! Something went wrong please try again',
            ]);
        }
    }
    public function seller_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:15'
        ]);
        
        if (Auth::guard('seller')->attempt([
            'email' => $request['email'],
            'password' => $request['password']
        ])) {
            return json_encode([
                'success' => true,
                'message' => 'Welcome to Seller Penal',
            ]);
        } else {
            return json_encode([
                'success' => false,
                'message' => 'Email or password is wrong.',
            ]);
        }
    }

    public function logout()
    {
        Auth::guard('seller')->logout();
        return redirect()->route('seller_login');
    }
}
