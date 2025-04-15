<x-layouts.app title="Pemilik">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <h1 class="text-4xl font-bold">Daftar Pemilik</h1>
        @if (auth()->user()->role === 'admin')
            <livewire:pemilik-create />
        @endif
        <livewire:pemiliks />
    </div>
</x-layouts.app>
