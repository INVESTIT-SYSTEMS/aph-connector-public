<?php

namespace App\Livewire;

use App\Interfaces\AphSettingInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Livewire\Component;

class AphTokenGenerator extends Component
{
    public string $token;

    private AphSettingInterface $repository;
    public function boot(AphSettingInterface $repository): void
    {
        $this->repository = $repository;
    }
    public function generateToken(): void
    {
        $this->repository->storeToken(Str::uuid());
        $dbData = $this->repository->getData();
        $this->token = $dbData->token;

    }
    public function render(): View
    {
        return view('livewire.aph-token-generator');
    }
}
