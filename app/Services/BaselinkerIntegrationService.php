<?php

namespace App\Services;

use App\Enums\Integrations\BaselinkerIntegrationEnum;
use App\Interfaces\BaselinkerIntegrationInterface;
use Baselinker\Baselinker;
use Exception;
use Illuminate\Support\Facades\Log;

class BaselinkerIntegrationService
{
    public function __construct(private readonly BaselinkerIntegrationInterface $repository){}
    public function testBaselinkerToken(string $token): bool
    {
        try {
            $baselinkerClient = new Baselinker(['token' => $token]);
            $pingResult = $baselinkerClient->orders()?->getOrders([])?->toArray() ?? ['status' => 'ERROR'];
        } catch (Exception)
        {
            $pingResult = ['status' => 'ERROR'];
        }

        return $pingResult['status'] == 'SUCCESS';
    }

    public function getBaselinkerDataItems(): array
    {
        try {
            $dbData = $this->repository->getIntegrationData();
            if($dbData[BaselinkerIntegrationEnum::Token->value]['identifier'] == 1)
            {
                $baselinkerClient = new Baselinker(['token' => $dbData[BaselinkerIntegrationEnum::Token->value]['value']]);
                return [
                    'success' => true,
                    'warehouses' => $baselinkerClient->productCatalog()->getInventoryWarehouses()->toArray()['warehouses'],
                    'price_groups' => $baselinkerClient->productCatalog()->getInventoryPriceGroups()->toArray()['price_groups'],
                    'inventories' => $baselinkerClient->productCatalog()->getInventories()->toArray()['inventories'],
                ];
            }
        } catch (Exception $err){
            Log::info($err->getMessage());
        }

        return [
            'success' => false
        ];
    }
}
