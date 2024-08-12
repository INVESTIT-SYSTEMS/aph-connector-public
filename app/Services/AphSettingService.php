<?php

namespace App\Services;


use App\Interfaces\AphSettingInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AphSettingService
{
    protected string $baseAphUrl;
    protected string $baseUrl;

    protected string $tokenHeaderName;
    public function __construct(private readonly AphSettingInterface $repository){
        $this->baseAphUrl = config('aphserwis.base_url');
        $this->baseUrl = config('app.url');
        $this->tokenHeaderName = config('aphserwis.aph_token_header_name');
        $this->tokenAphHeaderName = config('aphserwis.token_header_name');
    }

    public function validatedAphVendor(): array
    {
        try {
            $dbData = $this->repository->getData();
            $result = Http::withHeaders([
                $this->tokenAphHeaderName => $dbData->aphApiToken
            ])
                ->get($this->baseAphUrl.'/test-aph');
            return ['status' => $result->status() == 200, 'message' => $result->collect()['success']];
        } catch (Exception)
        {
            return ['status' => false, 'message' => 'Niepoprawne dane!'];
        }
    }

    public function validatedIncomingAphRequest(Request $request): bool
    {
        if(!$request->hasHeader($this->tokenAphHeaderName)) return false;
        $incomingToken = $request->header($this->tokenAphHeaderName);
        $aphData = $this->repository->getData();
        if($incomingToken != $aphData->token) return false;

        return true;
    }

    public function validateCommunication(Request $request): bool
    {
        if(!$request->hasHeader($this->tokenHeaderName) || !$request->hasHeader($this->tokenAphHeaderName)) return false;
        $incomingConnectorToken = $request->header($this->tokenHeaderName);
        $incomingAphToken = $request->header($this->tokenAphHeaderName);
        $aphData = $this->repository->getData();
        if($incomingConnectorToken != $aphData->token || $incomingAphToken != $aphData->aphApiToken) return false;

        return true;
    }


}
