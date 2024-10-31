<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try {
            $google_user = Socialite::driver('google')->user();

            $user = User::where('google_id', $google_user->getId())->first();

            if (!$user) {
                $new_user = User::create([
                    'username' => $google_user->getNickname(),
                    'nama_depan' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                    'level_id' => 2,
                ]);

                Auth::login($new_user);

                return redirect()->intended('/pemesanan-kamar');
            } else {
                Auth::login($user);

                return redirect()->intended('/pemesanan-kamar');
            }
        } catch (\Throwable $th) {
            dd('something went wrong wrong' . $th->getMessage());
        }
    }
}
