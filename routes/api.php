<?php

use App\Http\Controllers\API\AphSettingsAPIController;
use App\Http\Controllers\BaselinkerController;
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

        Route::prefix('integration')
            ->name('integration.')
            ->middleware('aph.communication.verify')
            ->group(static function (){
                Route::prefix('baselinker')
                    ->name('baselinker.')
                    ->controller(BaselinkerController::class)
                    ->group(static function (){
                        Route::post('{interface}/{method}', 'handleRequest');
                    });
            });
    });

