<?php

namespace App\Livewire;

use App\Services\BaselinkerIntegrationService;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class BaselinkerTester extends Component
{
    public string $resultInfo = '';
    public ?string $token;
    public bool $isLocked = false;

    protected BaselinkerIntegrationService $service;

    public function boot(BaselinkerIntegrationService $service): void
    {
        $this->service = $service;
    }

    public function mount(string $token): void
    {
        $this->token = $token;
    }

    public function checkToken(): void
    {
        $testResult = $this->service->testBaselinkerToken($this->token ?? '');

        $this->resultInfo = $testResult ? 'Poprawnie zweryfikowano token API!' : 'Weryfikacja NIE powiodła się! Spróbuj zapisać inny token!';
        $this->isLocked = true;
    }

    public function render(): View
    {
        return view('livewire.baselinker-tester');
    }
}
