<x-layouts.app title="Tagihan">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <h1 class="text-4xl font-bold">Daftar Tagihan</h1>
        @if (auth()->user()->role === 'admin')
            <livewire:tagihan-create />
        @endif
        <livewire:tagihans />
    </div>
</x-layouts.app>
