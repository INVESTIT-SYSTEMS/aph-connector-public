<?php

namespace Database\Seeders;

use App\Interfaces\AphSettingInterface;
use Illuminate\Database\Seeder;

class AphSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(AphSettingInterface $repository): void
    {
        if($repository->getList()->count() == 0)
        {
            $repository->create([
                'api_token' => null,
                'domain' => config('app.url')
            ]);
        }

    }
}
