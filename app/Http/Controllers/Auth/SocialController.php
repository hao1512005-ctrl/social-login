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
        Log::info("Starting callback for provider: " . $provider);

        $socialUser = Socialite::driver($provider)->user();

        // 🔥 FIX 1: Facebook có thể không có email
        $email = $socialUser->getEmail() ?? $socialUser->getId().'@'.$provider.'.com';

        Log::info("Email resolved: " . $email);

        $user = User::where('email', $email)->first();

        if (!$user) {
            Log::info("Creating new user: " . $email);

            $user = User::create([
                'name' => $socialUser->getName() ?? 'No Name',
                'email' => $email,
                'avatar' => $socialUser->getAvatar(),
                'provider' => $provider,
                'provider_id' => $socialUser->getId(),
                'student_id' => '23810310152', // 👉 sửa MSSV của bạn
                // 🔥 FIX 2: bắt buộc phải có password
                'password' => bcrypt('123456')
            ]);
        }

        Auth::login($user);

        Log::info("User logged in: " . $user->email);

        return redirect('/dashboard');

    } catch (\Exception $e) {
        Log::error("Social login error: " . $e->getMessage());
        return redirect('/login')->with('error', 'Đăng nhập thất bại: ' . $e->getMessage());
    }
}
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}