<?php

namespace App\Livewire;

use App\Interfaces\AphSettingInterface;
use App\Services\AphSettingService;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Livewire\Component;

class AphTokenGenerator extends Component
{
    public string $token;

    public string $aphToken;

    public bool $isVerified;

    private AphSettingInterface $repository;
    private AphSettingService $service;

    public array $checkAphResult;
    public function boot(AphSettingInterface $repository, AphSettingService $service): void
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function mount(): void
    {
        $data = $this->repository->getData();
        $this->token = $data->token ?? '';
        $this->aphToken = $data->aphApiToken ?? '';
        if(strlen($this->aphToken) > 1)
        {
            $this->isVerified = true;
        }
        $this->checkAphResult = ['status' => false, 'message' => 'Przetestuj połącznie z APH-Serwis'];
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

    public function testAphConnection(): void
    {
        $this->checkAphResult = $this->service->validatedAphVendor();
    }

    public function render(): View
    {
        return view('livewire.aph-token-generator');
    }
}
