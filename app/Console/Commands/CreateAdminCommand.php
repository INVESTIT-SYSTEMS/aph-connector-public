<?php

namespace App\Console\Commands;

use App\Interfaces\UserInterface;
use Illuminate\Console\Command;

class CreateAdminCommand extends Command
{
    protected $signature = 'create:admin';

    protected $description = 'Create basic system administrator account.';

    public function handle(UserInterface $repository): void
    {
        $result = $repository->makeAdmin();
        if($result->isError)
        {
            $this->error('Admin account already exists!');
        }
        else
        {
            $this->info('Admin account successfully created!');
            $this->info('Your credentials (save them!!!)');
            $this->info('Name: SuperAdmin');
            $this->info('Email: '.$result->email);
            $this->info('Password: '.$result->password);
        }

    }
}
