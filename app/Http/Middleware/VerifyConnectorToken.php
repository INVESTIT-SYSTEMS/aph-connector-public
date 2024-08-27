<?php

namespace App\Http\Middleware;

use App\Services\AphSettingService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyConnectorToken
{
    public function __construct(readonly AphSettingService $service){}

    public function handle(Request $request, Closure $next): Response
    {
        if(!$this->service->validatedIncomingAphRequest($request))
            return response()->json(['status' => 'Unauthenticated'], 401);
        return $next($request);
    }
}
