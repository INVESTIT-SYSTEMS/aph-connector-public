<?php

namespace App\DataTransferObjects;
class AdminGeneratorDTO
{
    public bool $isError;
    public ?string $email;
    public ?string $password;
    public function __construct(bool $isError, ?string $email = null, ?string $password = null){
        $this->isError = $isError;
        $this->email = $email;
        $this->password = $password;

    }
}
