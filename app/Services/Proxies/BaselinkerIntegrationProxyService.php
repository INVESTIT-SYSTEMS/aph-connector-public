<?php

namespace App\Services\Proxies;


use App\Enums\Integrations\BaselinkerIntegrationEnum;
use App\Interfaces\BaselinkerIntegrationInterface;
use Baselinker\Baselinker;

class BaselinkerIntegrationProxyService
{
    public function __construct(readonly BaselinkerIntegrationInterface $repository){}

    public function __call($method, $parameters)
    {
        $client = $this->makeClient();
        dd($method, $parameters, $client);
        if (method_exists($client, $method)) {
            return call_user_func_array([$client, $method], $parameters);
        }

        throw new \BadMethodCallException("Method {$method} does not exist.");
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
