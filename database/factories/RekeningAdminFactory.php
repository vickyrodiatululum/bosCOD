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
            // Menggunakan factory bank yang sudah dibuat sebelumnya untuk memilih bank acak dari daftar bank Indonesia
            'bank' => Bank::all()->random()->name,
            'rekening' => $this->faker->bankAccountNumber,  // Nomor rekening acak
            'atas_nama' => 'PT. Bos COD',  // Nama pemilik rekening di-set sebagai PT. Bos COD
        ];
    }
}
