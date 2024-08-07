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

    public array $baselinkerItems;

    public ?string $currentWarehouseName;
    public ?string $currentInventoryName;
    public ?string $currentPricingName;

    public function boot(BaselinkerIntegrationService $service, BaselinkerIntegrationInterface $repository): void
    {
        $this->service = $service;
        $this->repository = $repository;
    }

    public function mount(string $token, bool $isTokenVerified, array $baselinkerItems, ?string $currentWarehouseName, ?string $currentInventoryName, ?string $currentPricingName): void
    {
        $this->token = $token;
        $this->isTokenVerified = $isTokenVerified;
        $this->baselinkerItems = $baselinkerItems;
        $this->currentWarehouseName = $currentWarehouseName;
        $this->currentInventoryName = $currentInventoryName;
        $this->currentPricingName = $currentPricingName;
    }

    public function checkToken(): void
    {
        if(!$this->isTokenVerified)
        {
            if(!!$this->service->testBaselinkerToken($this->token ?? ''))
            {
                $this->isTokenVerified = true;
                $this->repository->markTokenAsVerified();
                $this->baselinkerItems = $this->service->getBaselinkerDataItems();
            }
        }
    }

    public function render(): View
    {
        return view('livewire.baselinker-tester');
    }
}
