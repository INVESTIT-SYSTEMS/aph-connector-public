<?php

namespace App\Services;

use Baselinker\Baselinker;
use Exception;

class BaselinkerIntegrationService
{
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
}
