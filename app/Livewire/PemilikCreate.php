<?php

namespace App\Livewire;

use App\Models\Pemilik;
use Flux\Flux;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PemilikCreate extends Component
{
    public $nama;
    public $nomor_ktp;
    public $tanggal_lahir;
    public $alamat;
    public $nomor_telepon;

    public function submit()
    {
        Pemilik::create([
            "user_id" => Auth::user()->id,
            "nama" => $this->nama,
            "nomor_ktp" => $this->nomor_ktp,
            "tanggal_lahir" => $this->tanggal_lahir,
            "alamat" => $this->alamat,
            "nomor_telepon" => $this->nomor_telepon,
        ]);

        Flux::modals()->close();

        redirect()->route('pemilik');
    }

    public function render()
    {
        return view('livewire.pemilik-create');
    }
}
