<?php

namespace Database\Factories;

use App\Models\RekeningAdmin;
use App\Models\Bank;
use Illuminate\Database\Eloquent\Factories\Factory;

class RekeningAdminFactory extends Factory
{
    protected $model = RekeningAdmin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'bank_id' => Bank::factory(),  // Membuat data bank baru secara otomatis
            'rekening' => $this->faker->bankAccountNumber,  // Nomor rekening acak
            'atas_nama' => $this->faker->name,  // Nama pemilik rekening
        ];
    }
}
