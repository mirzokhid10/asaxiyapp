<?php

namespace App\Http\Controllers\Socialite;

use App\Http\Controllers\Controller;
use Carbon\Exceptions\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class ProviderRedirectController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $provider)
    {
        if (!in_array($provider, ['facebook', 'google'])) {
            return redirect(route('login'))->withErrors(['provider' => 'Invalid Providers']);
        }

        try {
            return Socialite::driver($provider)->redirect();
        } catch (Exception $e) {
            Log::error('Socialite error: ' . $e);
            return redirect(route('login'))->withErrors(['provider' => 'Something Went Wrong']);
        }
    }
}