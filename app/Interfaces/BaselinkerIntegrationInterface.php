<?php

namespace App\Interfaces;

use App\Models\IntegrationInformation;

interface BaselinkerIntegrationInterface extends IntegrationInformationInterface
{
    public function storeToken(string $token): ?IntegrationInformation;
}
