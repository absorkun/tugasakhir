<div>
    <flux:modal.trigger name="create-kendaraan">
        <flux:button>Tambahkan Kendaraan</flux:button>
    </flux:modal.trigger>

    <flux:modal name="create-kendaraan" class="md:w-96">
        <form wire:submit.prevent='submit'>
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Tambah Kendaraan</flux:heading>
                    <flux:subheading>Masukan Kendaraan baru ke daftar.</flux:subheading>
                </div>

                <flux:select wire:model="pemilik_id">
                    <flux:select.option value="">.....</flux:select.option>
                    @foreach ($pemilikList as $pemilik)
                        <flux:select.option value="{{ $pemilik->id }}">
                            {{ $pemilik->user->name }}
                        </flux:select.option>
                    @endforeach
                </flux:select>
                <flux:input wire:model="model" placeholder="Nama Kendaraan" />
                <flux:input wire:model="merek" placeholder="Merek Kendaraan" />
                <flux:input wire:model="nomor_polisi" placeholder="Nomor Polisi Kendaraan" />
                <flux:input wire:model="nomor_mesin" placeholder="Nomor Mesin Kendaraan" />
                <flux:input wire:model="tanggal_rilis" type="date" />

                <div class="flex">
                    <flux:spacer />

                    <flux:button type="submit" variant="primary">Save changes</flux:button>
                </div>
            </div>
        </form>
    </flux:modal>
</div>
