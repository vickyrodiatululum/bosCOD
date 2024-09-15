<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi_Transfer extends Model
{
    use HasFactory;

    protected $table = 'transaksi_transfer';

    protected $fillable = [
        'id_transaksi',
        'user_id',
        'bank_pengirim',
        'bank_tujuan',
        'rekening_tujuan',
        'atasnama_tujuan',
        'nilai_transfer',
        'kode_unik',
        'biaya_admin',
        'total_transfer',
        'rekening_admin',
        'berlaku_hingga',
    ];
}
