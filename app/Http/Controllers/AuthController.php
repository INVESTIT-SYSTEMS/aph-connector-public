<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function __construct(private readonly AuthService $service){}

    public function showLogin(): View
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        if($this->service->validateLogin($request->get('email'), $request->get('password')))
        {
            return redirect()->route('panel.dashboard.index');
        }
        return back()->withErrors('Niepoprawne dane!');
    }

    public function logout(): RedirectResponse
    {
        return $this->service->invalidateUser('panel.auth.login');
    }
}
