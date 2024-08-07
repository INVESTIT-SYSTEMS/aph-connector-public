<?php

namespace App\Enums\Integrations;

enum BaselinkerIntegrationEnum : string
{
    case Token = 'token';
    case Storage = 'storage';
    case Warehouse = 'warehouse';
    case Pricing = 'pricing';
}
