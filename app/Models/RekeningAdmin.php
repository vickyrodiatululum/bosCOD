<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekeningAdmin extends Model
{
    use HasFactory;

    protected $table = 'rekening_admins';

    protected $fillable = [
        'bank',
        'rekening',
        'atas_nama',
    ];
}
