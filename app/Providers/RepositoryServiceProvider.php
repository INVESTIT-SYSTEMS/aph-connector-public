<?php

namespace App\Providers;

use App\Interfaces\BaselinkerIntegrationInterface;
use App\Interfaces\UserInterface;
use App\Repositories\BaselinkerIntegrationRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(UserInterface::class, UserRepository::class);
        $this->app->bind(BaselinkerIntegrationInterface::class, BaselinkerIntegrationRepository::class);
    }

    public function boot(): void {}
}
