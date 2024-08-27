<?php

namespace App\Interfaces;

use App\DataTransferObjects\AdminGeneratorDTO;
use App\Interfaces\Core\BaseRepositoryInterface;

interface UserInterface extends BaseRepositoryInterface
{
    public function makeAdmin(): AdminGeneratorDTO;
}
