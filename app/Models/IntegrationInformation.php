<?php

namespace App\Models;

use App\Enums\IntegrationNameEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class IntegrationInformation extends Model
{
    public $fillable = [
        'integration_name',
        'key',
        'value',
        'identifier'
    ];

    public $casts = [
        'integration_name' => IntegrationNameEnum::class
    ];

    public function scopeIntegrationBaselinker(Builder $builder): void
    {
        $builder->where('integration_name', IntegrationNameEnum::Baselinker);
    }

    public function getTransformedIntegrationData(IntegrationNameEnum $enum): array
    {
        $data = $this->whereIntegrationName($enum)?->get()?->toArray() ?? [];

        $transformedData = [];
        foreach ($data as $item) {
            $transformedData[$item['key']] = $item;
        }

        return $transformedData;
    }
}
