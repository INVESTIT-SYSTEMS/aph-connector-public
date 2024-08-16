<?php

namespace App\Services\Proxies;


use App\Enums\Integrations\BaselinkerIntegrationEnum;
use App\Interfaces\BaselinkerIntegrationInterface;
use Baselinker\Api\Response\Response;
use Baselinker\Baselinker;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;

class BaselinkerIntegrationProxyService
{
    public function __construct(readonly BaselinkerIntegrationInterface $repository){}
    private array $availableInterfaces = [
        'productCatalog',
        'orders',
        'courierShipments',
        'externalStorages',
        'orderReturns',
        'baselinkerConnect'

    ];
    public function __call($method, $parameters)
    {
        if(isset($parameters[0])) $parameters = $parameters[0];
        return $this->post($method, $parameters);

       /* foreach ($this->availableInterfaces as $interface) {
            try {
                $interfaceInstance = $client->$interface();
                if (method_exists($interfaceInstance, $method)) {
                    $params = $parameters[0] ?? $parameters;
                    error_log("Interface instance: " . get_class($interfaceInstance));

                    $reflection = new \ReflectionMethod($interfaceInstance, $method);
                    $args = [];

                    foreach ($reflection->getParameters() as $param) {
                        $paramName = $param->getName();

                        if (isset($params[$paramName])) {
                            $args[] = $params[$paramName];
                        } elseif ($param->isDefaultValueAvailable()) {
                            $args[] = $param->getDefaultValue();
                        } else {
                            throw new \InvalidArgumentException("Missing parameter: {$paramName}");
                        }
                    }
                    $response = call_user_func_array([$interfaceInstance, $method], $args);

                    return json_decode($response->contents(), true);
                }
            } catch (\Exception $e) {
                continue;
            }
        }

        throw new \BadMethodCallException("Method {$method} does not exist on any available interfaces.");*/
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

    protected function post(string $function, array $parameters = []): ResponseInterface
    {
        return $this->client()->post('connector.php', [
            RequestOptions::HEADERS => [
                'X-BLToken' => $this->repository->getIntegrationData()[BaselinkerIntegrationEnum::Token->value]['value'],
            ],
            RequestOptions::FORM_PARAMS => [
                'method' => $function,
                'parameters' => json_encode($parameters),
            ],
        ]);
    }

    protected function client(): GuzzleClient
    {
        return new GuzzleClient([
            'base_uri' => 'https://api.baselinker.com/',
            RequestOptions::CONNECT_TIMEOUT => 10,
            RequestOptions::TIMEOUT => 30,
        ]);
    }
}
