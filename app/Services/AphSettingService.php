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
        $this->tokenHeaderName = config('aphserwis.token_header_name');
    }

    public function validatedAphVendor(): bool
    {
        try {
            $dbData = $this->repository->getData();
            $result = Http::get($this->baseAphUrl, [

            ])->collect();
            return !!$result['success'];
        } catch (Exception)
        {
            return false;
        }
    }

    public function validatedIncomingAphRequest(Request $request): bool
    {
        if(!$request->hasHeader($this->tokenHeaderName)) dd('no header'); return false;
        if(!$request->getHost() != $this->baseAphUrl) dd('server'); return false;
        $incomingToken = $request->header($this->tokenHeaderName);
        $aphData = $this->repository->getData();
        if($incomingToken != $aphData->token) dd('bad token'); return false;

        return true;
    }


}
