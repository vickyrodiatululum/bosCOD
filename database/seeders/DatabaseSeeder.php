<?php

namespace Database\Seeders;

use App\Models\RekeningAdmin;
use App\Models\User;
use App\Models\Bank;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        RekeningAdmin::factory()->count(10)->create();

        Bank::factory(10)->create();
    }
}

