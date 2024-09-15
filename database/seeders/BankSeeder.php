<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('banks')->insert([
            ['name' => 'BCA'],
            ['name' => 'BNI'],
            ['name' => 'BRI'],
            ['name' => 'BTN'],
            ['name' => 'CIMB Niaga'],
            ['name' => 'Danamon'],
            ['name' => 'Mega'],
            ['name' => 'OCBC NISP'],
            ['name' => 'Permata'],
            ['name' => 'Sinarmas'],
            ['name' => 'Syariah Indonesia'],
        ]);
    }
}
