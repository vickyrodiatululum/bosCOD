<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekeningAdmin extends Model
{
    use HasFactory;

    protected $fillable = [
        'bank_id',
        'rekening',
        'atas_nama',
    ];

    // Relasi ke model Bank (assuming you have a Bank model)
    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
