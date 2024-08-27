<?php

namespace App\Repositories;

use App\DataTransferObjects\AdminGeneratorDTO;
use App\Interfaces\UserInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserRepository implements UserInterface
{
    public function __construct(private readonly User $model){}

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

    public function makeAdmin(): AdminGeneratorDTO
    {
        $password = Str::password(12);
        $email = 'admin@admin'.Str::random(4).'.com';
        if($this->model->count() > 0)
        {
            return new AdminGeneratorDTO(true);
        }
        $this->create([
            'name' => 'SuperAdmin',
            'email' => $email,
            'password' => Hash::make($password)
        ]);
        return new AdminGeneratorDTO(false, $email, $password);

    }
}
