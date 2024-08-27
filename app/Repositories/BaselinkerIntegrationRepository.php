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
            'value' => $token,
            'identifier' => null
        ]);
    }

    public function markTokenAsVerified(): void
    {
        $this->model->updateOrCreate([
            'integration_name' => IntegrationNameEnum::Baselinker,
            'key' => BaselinkerIntegrationEnum::Token
        ], [
            'identifier' => 1
        ]);
    }

    public function storeBaselinkerItems(array $data): void
    {
        //update warehouse
        [$warehouseName, $warehouseId, $warehouseType] = explode('.#.', $data['warehouse']);
        $this->model->updateOrCreate([
            'integration_name' => IntegrationNameEnum::Baselinker,
            'key' => BaselinkerIntegrationEnum::Warehouse
        ], [
            'integration_name' => IntegrationNameEnum::Baselinker,
            'key' => BaselinkerIntegrationEnum::Warehouse,
            'value' => $warehouseName,
            'identifier' => $warehouseType.'_'.$warehouseId
        ]);

        //update inventory
        [$inventoryName, $inventoryId] = explode('.#.', $data['inventory']);
        $this->model->updateOrCreate([
            'integration_name' => IntegrationNameEnum::Baselinker,
            'key' => BaselinkerIntegrationEnum::Inventory
        ], [
            'integration_name' => IntegrationNameEnum::Baselinker,
            'key' => BaselinkerIntegrationEnum::Inventory,
            'value' => $inventoryName,
            'identifier' => $inventoryId
        ]);

        //update pricing
        [$pricingName, $pricingId] = explode('.#.', $data['pricing']);
        $this->model->updateOrCreate([
            'integration_name' => IntegrationNameEnum::Baselinker,
            'key' => BaselinkerIntegrationEnum::Pricing
        ], [
            'integration_name' => IntegrationNameEnum::Baselinker,
            'key' => BaselinkerIntegrationEnum::Pricing,
            'value' => $pricingName,
            'identifier' => $pricingId
        ]);
    }

    public function baselinkerDataNoToken(): ?array
    {
        $data = collect($this->getIntegrationData());
        if(count($data) > 0){
            return $data->filter(function (array $item){
                return $item['key'] != 'token';
            })->toArray();
        }
        return [];
    }
}
