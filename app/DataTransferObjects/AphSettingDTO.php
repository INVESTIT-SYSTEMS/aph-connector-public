<?php

namespace App\DataTransferObjects;
class AphSettingDTO
{
    public ?string $token;
    public ?string $aphApiToken;
    public ?string $domain;
    public function __construct(?string $token = null, ?string $aphApiToken = null){
        $this->token = $token;
        $this->aphApiToken = $aphApiToken;
        $this->domain = config('app.url');
    }
}
