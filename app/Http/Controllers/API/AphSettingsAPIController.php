<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class AphSettingsAPIController extends Controller
{
    public function __construct(){}

    public function testIncomingRequest(): JsonResponse
    {
        return response()->json(['status' => 'OK']); //this endpoint is already checked by middleware
    }

}
