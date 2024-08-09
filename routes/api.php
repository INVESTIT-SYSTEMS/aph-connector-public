<?php

use App\Http\Controllers\API\AphSettingsAPIController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')
    ->name('v1.')
    ->group(static function (){
        Route::prefix('default')
            ->name('default.')
            ->middleware('aph.token.verify')
            ->controller(AphSettingsAPIController::class)
            ->group(static function (){
                Route::get('test-incoming-aph', 'testIncomingRequest')
                    ->name('test-incoming-aph');
            });
    });

