<?php

namespace App\Enums\Integrations;

enum BaselinkerIntegrationEnum : string
{
    case Token = 'token';
    case Inventory = 'inventory';
    case Warehouse = 'warehouse';
    case Pricing = 'pricing';
}
