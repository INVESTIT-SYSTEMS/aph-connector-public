<?php

namespace App\Interfaces\Core;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface BaseRepositoryInterface
{
    public function getById(int $id): ?Model;

    public function getList(int $perPage = 10): LengthAwarePaginator;

    public function create(array $data): ?Model;
}
