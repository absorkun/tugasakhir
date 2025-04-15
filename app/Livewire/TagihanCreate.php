<?php

namespace App\Livewire;

use App\Models\Tagihan;
use App\Models\Pemilik;
use App\Models\Kendaraan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TagihanCreate extends Component
{
    public $kendaraan_id;
    public $pemilik_id;
    public $jenis;
    public $jatuh_tempo;
    public $jumlah_bayar;

    public $pemilikList;
    public $kendaraanList;

    public function mount()
    {
        // Ambil data untuk dropdown
        $this->pemilikList = Pemilik::with('user')->get();
        $this->kendaraanList = Kendaraan::all();
    }

    protected function generateKode()
    {
        return 'INV-' . Str::upper(Str::random(6)) . date('-Ymd');
    }

    public function submit()
    {
        $this->validate([
            'pemilik_id' => 'required|exists:pemiliks,id',
            'kendaraan_id' => 'required|exists:kendaraans,id',
            'jenis' => 'required|in:pajak,administrasi,denda',
            'jatuh_tempo' => 'required|date|after_or_equal:today',
            'jumlah_bayar' => 'required|numeric|min:1000',
        ]);

        try {
            DB::transaction(function () {
                Tagihan::create([
                    'kode' => $this->generateKode(),
                    'kendaraan_id' => $this->kendaraan_id,
                    'pemilik_id' => $this->pemilik_id,
                    'jenis' => $this->jenis,
                    'jatuh_tempo' => $this->jatuh_tempo,
                    'jumlah_bayar' => $this->jumlah_bayar,
                    'status' => 'pending' // Status default
                ]);
            });

            // Reset form
            $this->reset();
            session()->flash('success', 'Tagihan berhasil dibuat!');
            return redirect()->route('tagihan');
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal membuat tagihan: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.tagihan-create');
    }
}
