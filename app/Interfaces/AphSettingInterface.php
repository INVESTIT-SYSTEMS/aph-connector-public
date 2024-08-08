<?php

namespace App\Interfaces;

use App\DataTransferObjects\AphSettingDTO;
use App\Interfaces\Core\BaseRepositoryInterface;

interface AphSettingInterface extends BaseRepositoryInterface
{
    public function getData(): AphSettingDTO;

    public function storeToken(string $token): void;

}
