<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBaselinkerItemsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'inventory' => ['nullable', 'string', 'max:255'],
            'warehouse' => ['nullable', 'string', 'max:255'],
            'pricing' => ['nullable', 'string', 'max:255']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
