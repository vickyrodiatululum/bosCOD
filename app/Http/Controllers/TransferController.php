<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RekeningAdmin;
use App\Models\Transaksi_Transfer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TransferController extends Controller
{
    public function createTransfer(Request $request)
    {
        // Mendapatkan user yang sedang login
        $user = auth()->user();

        // Validasi request
        $validator = Validator::make($request->all(), [
            'nilai_transfer' => 'required|numeric',
            'bank_tujuan' => 'required',
            'rekening_tujuan' => 'required',
            'atasnama_tujuan' => 'required',
            'bank_pengirim' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        // Dummy data untuk rekening admin berdasarkan bank pengirim
        $rekeningAdmin = RekeningAdmin::where('bank', $request->bank_pengirim)->first();

        if (!$rekeningAdmin) {
            return response()->json(['message' => 'Rekening admin not found'], 404);
        }

        // Membuat kode unik transfer
        $kodeUnik = rand(100, 999);
        $totalTransfer = $request->nilai_transfer + $kodeUnik;

        // Generate ID Transaksi
        $count = Transaksi_Transfer::count() + 1;
        $idTransaksi = 'TF' . now()->format('ymd') . str_pad($count, 5, '0', STR_PAD_LEFT);

        // Simpan data transfer ke database
        $transfer = Transaksi_Transfer::create([
            'id_transaksi' => $idTransaksi,
            'user_id' => $user->id,
            'bank_pengirim' => $request->bank_pengirim,
            'bank_tujuan' => $request->bank_tujuan,
            'rekening_tujuan' => $request->rekening_tujuan,
            'atasnama_tujuan' => $request->atasnama_tujuan,
            'nilai_transfer' => $request->nilai_transfer,
            'kode_unik' => $kodeUnik,
            'biaya_admin' => 0,
            'total_transfer' => $totalTransfer,
            'rekening_admin' => $rekeningAdmin,
            'berlaku_hingga' => now()->addDays(1)
        ]);

        // Response sesuai dengan format yang diinginkan
        return response()->json([
            'id_transaksi' => $transfer->id_transaksi,
            'nilai_transfer' => $request->nilai_transfer,
            'kode_unik' => $kodeUnik,
            'biaya_admin' => 0,
            'total_transfer' => $totalTransfer,
            'bank_perantara' => $rekeningAdmin,
            'rekening_perantara' => $rekeningAdmin->rekening,
            'berlaku_hingga' => $transfer->berlaku_hingga->toIso8601String(),
        ]);
    }
}
