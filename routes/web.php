<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::fallback(fn () => redirect()->route('panel.auth.login'));

Route::prefix('panel')
    ->name('panel.')
    ->group(static function (){
        Route::prefix('auth')
            ->name('auth.')
            ->controller(AuthController::class)
            ->group(static function (){
                Route::get('login', 'showLogin')
                    ->name('show-login-form');
                Route::post('login', 'login')
                    ->name('login');
            });
    });
