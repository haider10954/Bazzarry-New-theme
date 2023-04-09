<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Billing_detail;
use App\Models\City;
use App\Models\Country;
use App\Models\Order;
use App\Models\Shipping_detail;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Laravel\Socialite\Facades\Socialite;
use mysql_xdevapi\Exception;

class AuthController extends Controller
{
    public function fetchStates(Request $request)
    {
        $States = State::where('country_id', $request->Country_id)->orderBy('name', 'ASC')->get();
        return json_encode([
            'Error' => false,
            'States' => $States
        ]);
    }

    public function fetchCities(Request $request): false|string
    {
        $Cities = City::where('state_id', $request->State_id)->orderBy('name', 'ASC')->get();
        return json_encode([
            'Error' => false,
            'City' => $Cities
        ]);
    }
    public function signUpView()
    {
        $countries = Country::get();
        return view('user.pages.signup', compact('countries'));
    }
    public function user_signUp(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'gender' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'phonenumber' => 'required',
            'avatar' => 'nullable|mimes:jpg,jpeg,png',
        ]);
        $mainImageName = "";
        if ($request->hasFile('avatar')) {
            $mainImageName = time() . '.' . $request->avatar->extension();
            $request->avatar->storeAs('public/user/profile-image', $mainImageName);
            $mainImageName = 'storage/user/profile-image/' . $mainImageName;
        }
        $user = User::create([
            'name' => $request['name'],
            'last_name' => $request['lastname'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'country_id' => $request['country_id'],
            'state_id' => $request['state_id'],
            'city_id' => $request['city_id'],
            'address' => $request['address'] ?? null,
            'phone' => $request['phonenumber'],
            'avatar' => $mainImageName ?? null,
            'gender' => $request['gender'],
            'postCode' => $request['post_code'],
        ]);
        if ($user) {
            return json_encode([
                'success' => true,
                'message' => 'Your account has been registered successfully',
            ]);
        } else {
            return json_encode([
                'success' => false,
                'message' => 'Something went wrong please try again',
            ]);
        }
    }

    public function userLoginView()
    {
        return view('user.pages.login');
    }

    public function userLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return json_encode([
                'success' => true,
                'message' => 'Login successfully',
            ]);
        } else {
            return json_encode([
                'success' => false,
                'message' => 'Email or Password is Incorrect',
            ]);
        }
    }


    public function userlogout()
    {
        auth()->logout();
        return redirect()->route('index');
    }
    public function redirect()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }
    public function callback()
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();
            $existUser = User::where('google_id', $user->id)->first();

            if ($existUser) {
                Auth::login($existUser);
                return redirect()->route('user_index');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'google_id' => $user->id,
                    'email' => $user->email,
                ]);
                Auth::login($newUser);
                return redirect()->route('user_index');
            }
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }

    public function userProfileView()
    {
        $countries = Country::get();
        $states = State::get();
        $cities = City::get();
        $order = Order::query()->where('user_id',auth()->id())->get();
        $billing_address = Billing_detail::query()->where('user_id',auth()->id())->first();
        $shipping_detail = Shipping_detail::query()->where('billing_details',$billing_address->id)->first();
        return view('user.pages.profile', compact('countries', 'states', 'cities', 'order' , 'billing_address','shipping_detail'));
    }

    public function userProfileUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'avatar' => 'nullable|mimes:jpg,jpeg,png',
            'banner_image' => 'nullable|mimes:jpg,jpeg,png',
        ]);

        $mainImageName = "";
        if ($request->hasFile('avatar')) {
            $mainImageName = time() . '.' . $request->avatar->extension();
            $request->avatar->storeAs('public/user/profile-image', $mainImageName);
            $mainImageName = 'storage/user/profile-image/' . $mainImageName;
        }

        $userBannerImage = "";
        if ($request->hasFile('banner_image')) {
            $userBannerImage = time() . '.' . $request->banner_image->extension();
            $request->banner_image->storeAs('public/user/banner-image', $userBannerImage);
            $userBannerImage = 'storage/user/banner-image/' . $userBannerImage;
        }

        $user = User::where('id', $request->id)->update([
            'name' => $request['name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'country_id' => $request['country'],
            'state_id' => $request['state'],
            'city_id' => $request['city'],
            'address' => $request['address'] ?? null,
            'phone' => $request['phone'],
            'avatar' => $mainImageName ?? null,
            'profile_banner' => $userBannerImage ?? null,
        ]);

        if ($user) {
            return json_encode([
                'success' => true,
                'message' => 'Your account has been updated successfully',
            ]);
        } else {
            return json_encode([
                'success' => false,
                'message' => 'Something went wrong please try again',
            ]);
        }
    }
}
