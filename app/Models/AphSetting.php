<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AphSetting extends Model
{
    protected $fillable = [
        'api_token',
        'domain',
        'aph_api_token'
    ];
}
