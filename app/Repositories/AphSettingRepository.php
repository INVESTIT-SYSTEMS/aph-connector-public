<?php

namespace App\Repositories;

use App\DataTransferObjects\AphSettingDTO;
use App\Interfaces\AphSettingInterface;
use App\Models\AphSetting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;


class AphSettingRepository implements AphSettingInterface
{
    public function __construct(private readonly AphSetting $model){}

    public function getById(int $id): ?Model
    {
        return $this->model->find($id);
    }

    public function getList(int $perPage = 10): LengthAwarePaginator
    {
        return $this->model->paginate($perPage);
    }

    public function create(array $data): ?Model
    {
        return $this->model->create($data);
    }

    public function getData(): AphSettingDTO
    {
        $data = $this->getById(1);
        return new AphSettingDTO($data->api_token);
    }

    public function storeToken(string $token): void
    {
        $this->getById(1)->update([
            'api_token' => $token
        ]);
    }
}
