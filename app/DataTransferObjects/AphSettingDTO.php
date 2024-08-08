<?php

namespace App\DataTransferObjects;
class AphSettingDTO
{
    public ?string $token;
    public ?string $domain;
    public function __construct(?string $token){
        $this->token = $token;
        $this->domain = config('app.url');
    }
}
