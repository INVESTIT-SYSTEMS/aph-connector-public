<?php

namespace App\Services\Proxies;


use App\Enums\Integrations\BaselinkerIntegrationEnum;
use App\Interfaces\BaselinkerIntegrationInterface;
use Baselinker\Baselinker;

class BaselinkerIntegrationProxyService
{
    public function __construct(readonly BaselinkerIntegrationInterface $repository){}
    private array $interfaces = [
        'productCatalog',
        'orders'
    ];
    public function call($interface, $method, $parameters)
    {
        if(in_array($interface, $this->interfaces))
        {
            $client = $this->makeClient();
            try {
                return $client->$interface()->$method($parameters);
            } catch (\Exception)
            {
                throw new \BadMethodCallException("Method {$method} does not exist.");
            }
        }
    }

    private function makeClient(): ?Baselinker
    {
        try {
            $data = $this->repository->getIntegrationData();
            return new Baselinker(['token' => $data[BaselinkerIntegrationEnum::Token->value] ?? []]);
        } catch (\Exception){
            return null;
        }
    }
}
