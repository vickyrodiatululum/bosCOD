<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi_Transfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_transaksi',
        'user_id',
        'bank_pengirim_id',
        'bank_tujuan_id',
        'rekening_tujuan',
        'atasnama_tujuan',
        'nilai_transfer',
        'kode_unik',
        'biaya_admin',
        'total_transfer',
        'rekening_admin_id',
        'berlaku_hingga',
    ];
}
