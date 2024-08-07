<?php

namespace App\Repositories;

use App\Enums\IntegrationNameEnum;
use App\Enums\Integrations\BaselinkerIntegrationEnum;
use App\Interfaces\BaselinkerIntegrationInterface;
use App\Models\IntegrationInformation;

class BaselinkerIntegrationRepository implements BaselinkerIntegrationInterface
{
    public function __construct(private readonly IntegrationInformation $model){}

    public function getIntegrationData(): ?array
    {
        return $this->model->getTransformedIntegrationData(IntegrationNameEnum::Baselinker) ?? [];
    }

    public function storeToken(string $token): ?IntegrationInformation
    {
        return $this->model->updateOrCreate([
            'integration_name' => IntegrationNameEnum::Baselinker,
            'key' => BaselinkerIntegrationEnum::Token
        ], [
            'integration_name' => IntegrationNameEnum::Baselinker,
            'key' => BaselinkerIntegrationEnum::Token,
            'value' => $token
        ]);
    }
}
