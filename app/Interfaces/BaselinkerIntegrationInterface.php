<?php

namespace App\Interfaces;

use App\Models\IntegrationInformation;

interface BaselinkerIntegrationInterface extends IntegrationInformationInterface
{
    public function storeToken(string $token): ?IntegrationInformation;

    public function markTokenAsVerified(): void;

    public function storeBaselinkerItems(array $data): void;
}
