<?php

namespace App\Livewire;

use App\Interfaces\AphSettingInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Livewire\Component;

class AphTokenGenerator extends Component
{
    public string $token;

    public string $aphToken;

    private AphSettingInterface $repository;
    public function boot(AphSettingInterface $repository): void
    {
        $this->repository = $repository;
    }

    public function mount(): void
    {
        $data = $this->repository->getData();
        $this->token = $data->token ?? '';
        $this->aphToken = $data->aphApiToken ?? '';
    }
    public function generateToken(): void
    {
        $this->repository->storeToken(Str::uuid());
        $dbData = $this->repository->getData();
        $this->token = $dbData->token;
    }

    public function storeAphToken(string $token): void
    {
        $this->repository->storeAphToken($token);
        $dbData = $this->repository->getData();
        $this->aphToken = $dbData->aphApiToken;
    }

    public function render(): View
    {
        return view('livewire.aph-token-generator');
    }
}
