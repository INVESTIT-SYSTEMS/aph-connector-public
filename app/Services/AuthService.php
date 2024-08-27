<?php

namespace App\Services;

use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthService
{
    public function validateLogin(string $email, string $password): bool
    {
        return Auth::guard('web')->attempt(['email' => $email, 'password' => $password]);
    }

    public function invalidateUser(string $redirectRoute): RedirectResponse
    {
        try {
            request()->session()->invalidate();

            request()->session()->regenerateToken();
            Auth::guard('front')->logout();

        } catch (Exception $err){
            Log::info($err->getMessage());
        }
        return redirect()->route($redirectRoute);
    }
}
