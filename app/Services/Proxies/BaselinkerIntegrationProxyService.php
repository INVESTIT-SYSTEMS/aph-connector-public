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
        return $this->post($method, $parameters)->getBody()->getContents();
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
