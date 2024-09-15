<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rekening_Admin;
use App\Models\Transaksi_Transfer;

use App\Http\Controllers\Controller;

class TransferController extends Controller
{
    public function createTransfer(Request $request)
    {
        $user = auth()->user();

        $this->validate($request, [
            'nilai_transfer' => 'required|numeric',
            'bank_tujuan' => 'required',
            'rekening_tujuan' => 'required',
            'atasnama_tujuan' => 'required',
            'bank_pengirim' => 'required'
        ]);

        // Dummy data untuk rekening admin
        $rekeningAdmin = Rekening_Admin::where('bank_id', $request->bank_pengirim)->first();

        $kodeUnik = rand(100, 999);
        $totalTransfer = $request->nilai_transfer + $kodeUnik;

        // Generate ID Transaksi
        $count = Transaksi_Transfer::count() + 1;
        $idTransaksi = 'TF' . now()->format('ymd') . str_pad($count, 5, '0', STR_PAD_LEFT);

        $transfer = Transaksi_Transfer::create([
            'id_transaksi' => $idTransaksi,
            'user_id' => $user->id,
            'bank_pengirim_id' => $request->bank_pengirim,
            'bank_tujuan_id' => $request->bank_tujuan,
            'rekening_tujuan' => $request->rekening_tujuan,
            'atasnama_tujuan' => $request->atasnama_tujuan,
            'nilai_transfer' => $request->nilai_transfer,
            'kode_unik' => $kodeUnik,
            'biaya_admin' => 0,
            'total_transfer' => $totalTransfer,
            'rekening_admin_id' => $rekeningAdmin->id,
            'berlaku_hingga' => now()->addDays(1)
        ]);

        return response()->json([
            'id_transaksi' => $transfer->id_transaksi,
            'nilai_transfer' => $request->nilai_transfer,
            'kode_unik' => $kodeUnik,
            'biaya_admin' => 0,
            'total_transfer' => $totalTransfer,
            'bank_perantara' => $rekeningAdmin->bank->name,
            'rekening_perantara' => $rekeningAdmin->rekening,
            'berlaku_hingga' => $transfer->berlaku_hingga,
        ]);
    }

}
