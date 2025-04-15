<?php

namespace App\Livewire;

use App\Models\Kendaraan;
use App\Models\Pemilik;
use Flux\Flux;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class KendaraanCreate extends Component
{
    public $model;
    public $merek;
    public $nomor_polisi;
    public $nomor_mesin;
    public $tanggal_rilis;
    public $pemilikList;
    public $pemilik_id;

    public function mount()
    {
        $this->pemilikList = Pemilik::with('user')->get();
    }

    public function submit()
    {
        Kendaraan::create([
            'pemilik_id' => $this->pemilik_id,
            'model' => $this->model,
            'merek' => $this->merek,
            'nomor_polisi' => $this->nomor_polisi,
            'nomor_mesin' => $this->nomor_mesin,
            'tanggal_rilis' => $this->tanggal_rilis,
        ]);

        Flux::modals()->close();

        redirect()->route('kendaraan');
    }

    public function render()
    {
        return view('livewire.kendaraan-create');
    }
}
