<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SocialController extends Controller
{
    public function redirect($provider)
    {
        try {
         return Socialite::driver($provider)
            ->with(['prompt' => 'select_account'])
            ->redirect();
        } catch (\Exception $e) {
            Log::error("Socialite redirect error: " . $e->getMessage());
            return redirect('/login')->with('error', 'Lỗi kết nối: ' . $e->getMessage());
        }
    }

   public function callback($provider)
{
    try {
        $allowed = ['facebook', 'google'];
        if (!in_array($provider, $allowed)) {
            abort(404);
        }

        $socialUser = Socialite::driver($provider)
            ->stateless()
            ->user();

        $email = $socialUser->getEmail() 
            ?? $socialUser->getId().'@'.$provider.'.com';

        $user = User::where('provider', $provider)
            ->where('provider_id', $socialUser->getId())
            ->first();

        if (!$user) {
            $user = User::create([
                'name' => $socialUser->getName() ?? 'No Name',
                'email' => $email,
                'avatar' => $socialUser->getAvatar(),
                'provider' => $provider,
                'provider_id' => $socialUser->getId(),
                'student_id' => '23810310152',
                'password' => null
            ]);
        }

        Auth::login($user);

        return redirect('/dashboard');

    } catch (\Exception $e) {
        Log::error("Social login error: ".$e->getMessage());

        return redirect('/login')
            ->with('error', 'Đăng nhập thất bại!');
    }
}
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}