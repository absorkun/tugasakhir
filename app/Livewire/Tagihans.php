<?php

namespace App\Livewire;

use App\Models\Tagihan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Midtrans\Transaction;

class Tagihans extends Component
{

    public function process($kode, $jumlah_bayar)
    {
        return redirect()->route('payment', ["order_id" => $kode, "amount" => $jumlah_bayar]);
    }

    public function render()
    {
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        if (Auth::user()->role === 'admin') { // 99999 adalah ID superadmin
            $tagihans = Tagihan::latest()->paginate(10);
        } else {
            $pemilik_id = Auth::user()->pemilik->id ?? null;

            if (!$pemilik_id) {
                abort(403, 'Anda tidak memiliki akses ke tagihan.');
            }

            $tagihans = Tagihan::where('pemilik_id', $pemilik_id)
                ->latest()
                ->paginate(10);
        }

        // Loop untuk mendapatkan status pembayaran setiap tagihan
        foreach ($tagihans as $tagihan) {
            try {
                $status = Transaction::status($tagihan->kode);
                $tagihan->status = $status->transaction_status;
            } catch (\Exception $e) {
                $tagihan->status = 'unpaid'; // Default jika gagal mengambil data dari Midtrans
                Log::error('Midtrans API error: ' . $e->getMessage());
            }
        }

        return view('livewire.tagihans', ["tagihans" => $tagihans]);
    }
}
