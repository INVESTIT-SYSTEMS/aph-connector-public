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
        'orders',
        'courierShipments',
        'externalStorages',

    ];
    public function __call($method, $parameters)
    {
        $client = $this->makeClient();

        foreach ($this->availableInterfaces as $interface) {
            try {
                $interfaceInstance = $client->$interface();

                if (method_exists($interfaceInstance, $method)) {
                    $parameters = $parameters[0] ?? $parameters;

                    $reflection = new \ReflectionMethod($interfaceInstance, $method);
                    $args = [];

                    foreach ($reflection->getParameters() as $param) {
                        $paramName = $param->getName();

                        if (isset($parameters[$paramName])) {
                            $args[] = $parameters[$paramName];
                        } elseif ($param->isDefaultValueAvailable()) {
                            $args[] = $param->getDefaultValue();
                        } else {
                            throw new \InvalidArgumentException("Missing parameter: {$paramName}");
                        }
                    }

                    return json_decode(call_user_func_array([$interfaceInstance, $method], $args)?->contents(), true);
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
