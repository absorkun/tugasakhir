<?php

namespace App\Livewire;

use App\Models\Kendaraan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Kendaraans extends Component
{
    public function render()
    {
        if (Auth::user()->role === 'admin') { // 99999 adalah ID superadmin
            $kendaraans = Kendaraan::latest()->paginate(10);
        } else {
            $pemilik_id = Auth::user()->pemilik->id ?? null;

            if (!$pemilik_id) {
                abort(403, 'Anda tidak memiliki akses ke Kendaraan.');
            }

            $kendaraans = Kendaraan::where('pemilik_id', $pemilik_id)
                ->latest()
                ->paginate(10);
        }

        return view('livewire.kendaraans', ["kendaraans" => $kendaraans]);
    }
}
