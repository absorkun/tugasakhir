<?php

namespace App\Livewire;

use App\Models\Pemilik;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Pemiliks extends Component
{
    public function render()
    {
        if (Auth::user()->role === 'admin') { // 99999 adalah ID superadmin
            $pemiliks = Pemilik::latest()->paginate(10);
        } else {
            $pemilik_id = Auth::user()->pemilik->id ?? null;

            if (!$pemilik_id) {
                abort(403, 'Anda tidak memiliki akses ke Pemilik.');
            }

            $pemiliks = Pemilik::where('id', $pemilik_id)
                ->latest()
                ->paginate(10);
        }

        return view('livewire.pemiliks', ["pemiliks" => $pemiliks]);
    }
}
