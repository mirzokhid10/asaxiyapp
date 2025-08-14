<?php

namespace App\Http\Controllers\Socialite;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class ProviderCallbackController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $provider)
    {

        function generateUniqueUserCode($name)
        {
            $nameParts = explode(' ', trim($name));
            $firstInitial = strtolower(substr($nameParts[0] ?? '', 0, 1));
            $lastInitial = strtolower(substr($nameParts[1] ?? '', 0, 1)); // might be empty

            $initials = $firstInitial . $lastInitial;
            $randomNumber = rand(1000, 9999);
            $code = $initials . $randomNumber;

            // Ensure uniqueness
            while (User::where('user_code', $code)->exists()) {
                $randomNumber = rand(1000, 9999);
                $code = $initials . $randomNumber;
            }

            return $code;
        }


        if (!in_array($provider, ['facebook', 'google'])) {
            return redirect(route('login'))->withErrors(['provider' => 'Invalid provider']);
        }


        $socialUser = Socialite::driver($provider)->user();

        $user = User::updateOrCreate([
            'provider_id' => $socialUser->id,
            'provider_name' => $provider,
        ], [
            'name' => $socialUser->name,
            'email' => $socialUser->email,
            'password' => Hash::make(Str::random(16)),
            'user_code' => generateUniqueUserCode($socialUser->getName()),
            'user_token' => $socialUser->token,
            'user_refresh_token' => $socialUser->refreshToken,
        ]);

        Auth::login($user);

        return redirect('/user/dashboard');
    }
}