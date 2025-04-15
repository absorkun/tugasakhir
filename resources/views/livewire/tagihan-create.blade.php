<div>
    <flux:modal.trigger name="create-tagihan">
        <flux:button>Tambahkan Tagihan</flux:button>
    </flux:modal.trigger>

    <flux:modal name="create-tagihan" class="md:w-96">
        <form wire:submit.prevent='submit'>
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Tambah Tagihan</flux:heading>
                    <flux:subheading>Masukan Tagihan baru</flux:subheading>
                </div>

                <!-- Nama Pemilik -->
                <flux:select wire:model="pemilik_id" label="Pilih Pemilik" required>
                    <flux:select.option value="">.....</flux:select.option>
                    @foreach ($pemilikList as $pemilik)
                        <flux:select.option value="{{ $pemilik->id }}">
                            {{ $pemilik->user->name }}
                        </flux:select.option>
                    @endforeach
                </flux:select>
                @error('pemilik_id')
                @enderror

                <!-- Nomor Polisi -->
                <flux:select wire:model="kendaraan_id" label="Pilih Kendaraan" required>
                    <flux:select.option value="">.....</flux:select.option>
                    @foreach ($kendaraanList as $kendaraan)
                        <flux:select.option value="{{ $kendaraan->id }}">
                            {{ $kendaraan->nomor_polisi }}
                        </flux:select.option>
                    @endforeach
                </flux:select>
                @error('kendaraan_id')
                @enderror

                <!-- Jenis Pembayaran -->
                <flux:select wire:model="jenis" label="Jenis Pembayaran" required>
                    <flux:select.option value="">.....</flux:select.option>
                    <flux:select.option value="pajak">Pajak Tahunan</flux:select.option>
                    <flux:select.option value="administrasi">Biaya Administrasi</flux:select.option>
                    <flux:select.option value="denda">Denda Keterlambatan</flux:select.option>
                </flux:select>
                @error('jenis')
                @enderror

                <!-- Tanggal Jatuh Tempo -->
                <flux:input type="date" wire:model="jatuh_tempo" label="Tanggal Jatuh Tempo"
                    min="{{ date('Y-m-d') }}" required />
                @error('jatuh_tempo')
                @enderror

                <!-- Jumlah Bayar -->
                <flux:input type="number" wire:model="jumlah_bayar" label="Jumlah Bayar (Rp)" min="1000"
                    step="500" required />
                @error('jumlah_bayar')
                @enderror

                <div class="flex items-center justify-end gap-3">
                    <flux:button type="button" variant="ghost" wire:click="$dispatch('close-modal')">
                        Batal
                    </flux:button>
                    <flux:button type="submit" variant="primary">
                        Simpan Tagihan
                    </flux:button>
                </div>
            </div>
        </form>
    </flux:modal>
</div>
