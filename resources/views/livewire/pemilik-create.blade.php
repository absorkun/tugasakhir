<div>
    <flux:modal.trigger name="create-pemilik">
        <flux:button>Tambahkan Pemilik</flux:button>
    </flux:modal.trigger>

    <flux:modal name="create-pemilik" class="md:w-96">
        <form wire:submit.prevent='submit'>
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Tambah Pemilik</flux:heading>
                <flux:subheading>Masukan pemilik baru ke daftar.</flux:subheading>
            </div>

            <flux:input wire:model="nama" placeholder="Nama Pemilik" />
            <flux:input wire:model="nomor_ktp" placeholder="NIK Pemilik" />
            <flux:input wire:model="tanggal_lahir" type="date" />
            <flux:input wire:model="alamat" placeholder="Alamat Pemilik" />
            <flux:input wire:model="nomor_telepon" placeholder="No. Telepon Pemilik" />

            <div class="flex">
                <flux:spacer />

                <flux:button type="submit" variant="primary">Save changes</flux:button>
            </div>
        </div>
        </form>
    </flux:modal>
</div>
