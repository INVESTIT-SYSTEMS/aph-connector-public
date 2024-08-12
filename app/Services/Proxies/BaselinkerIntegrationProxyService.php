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
        foreach ($this->availableInterfaces as $interface) {
            try {
                $interfaceInstance = $client->$interface();

                if (method_exists($interfaceInstance, $method)) {
                    return call_user_func_array([$interfaceInstance, $method], $parameters);
                }
            } catch (\Exception $e) {
                continue;
            }
        }

        throw new \BadMethodCallException("Method {$method} does not exist on any available interfaces.");
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
