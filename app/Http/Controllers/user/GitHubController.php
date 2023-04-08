<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GitHubController extends Controller
{
    public function gitRedirect()
    {
        return Socialite::driver('github')->stateless()->redirect();
    }

    public function gitCallback()
    {
        try {

            $user = Socialite::driver('github')->stateless()->user();

            $searchUser = User::where('github_id', $user->id)->first();

            if ($searchUser) {

                Auth::login($searchUser);

                return redirect()->route('user_index');

            } else {
                $gitUser = User::create([
                    'name' => $user->nickname,
                    'email' => $user->email,
                    'github_id' => $user->id,
                ]);

                Auth::login($gitUser);
                return redirect()->route('user_index');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
