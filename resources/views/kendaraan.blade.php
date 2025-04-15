<x-layouts.app title="Kendaraan">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <h1 class="text-4xl font-bold">Daftar Kendaraan</h1>
        @if (auth()->user()->role === 'admin')
            <livewire:kendaraan-create />
        @endif
        <livewire:kendaraans />
    </div>
</x-layouts.app>
