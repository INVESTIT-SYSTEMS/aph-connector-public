<?php

namespace App\Livewire;

use App\Interfaces\BaselinkerIntegrationInterface;
use App\Services\BaselinkerIntegrationService;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class BaselinkerTester extends Component
{
    public string $resultInfo = '';
    public ?string $token;
    public bool $isTokenVerified = false;
    public bool $isLocked = false;

    protected BaselinkerIntegrationService $service;
    protected BaselinkerIntegrationInterface $repository;

    public function boot(BaselinkerIntegrationService $service, BaselinkerIntegrationInterface $repository): void
    {
        $this->service = $service;
        $this->repository = $repository;
    }

    public function mount(string $token, $isTokenVerified): void
    {
        $this->token = $token;
        $this->isTokenVerified = $isTokenVerified;
    }

    public function checkToken(): void
    {
        if(!$this->isTokenVerified)
        {
            if(!!$this->service->testBaselinkerToken($this->token ?? ''))
            {
                $this->isTokenVerified = true;
                $this->repository->markTokenAsVerified();
            }
        }
    }

    public function render(): View
    {
        return view('livewire.baselinker-tester');
    }
}
