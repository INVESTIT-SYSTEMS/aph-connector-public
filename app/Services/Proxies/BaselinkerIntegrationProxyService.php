<?php

namespace App\Services\Proxies;


use App\Enums\Integrations\BaselinkerIntegrationEnum;
use App\Interfaces\BaselinkerIntegrationInterface;
use Baselinker\Baselinker;

class BaselinkerIntegrationProxyService
{
    public function __construct(readonly BaselinkerIntegrationInterface $repository){}
    private array $availableInterfaces = [
        'productCatalog',
        'orders'
    ];
    public function __call($method, $parameters)
    {
        $client = $this->makeClient();
        foreach ($this->availableInterfaces as $interface)
        {
            try {
                return $client->$interface()->$method();
            } catch (\Exception){}
        }

        throw new \BadMethodCallException("Method {$method} does not exist.");
    }

    private function makeClient(): ?Baselinker
    {
        try {
            $data = $this->repository->getIntegrationData();
            return new Baselinker(['token' => $data[BaselinkerIntegrationEnum::Token->value]['value']] ?? []);
        } catch (\Exception){
            return null;
        }
    }
}
