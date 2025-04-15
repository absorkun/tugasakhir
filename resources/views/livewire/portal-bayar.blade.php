<div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-sm">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-2">Pembayaran Manual</h1>
        <p class="text-gray-600">Silakan transfer ke salah satu rekening berikut:</p>
    </div>

    <!-- Bank BCA -->
    <div class="border rounded-lg p-6 mb-6">
        <div class="flex items-center gap-4 mb-5">
            <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center">
                <span class="text-white font-bold">BCA</span>
            </div>
            <h2 class="text-lg font-semibold text-gray-800">Bank Central Asia (BCA)</h2>
        </div>

        <div class="grid grid-cols-2 gap-y-4 text-sm">
            <div class="text-gray-600">Nomor Rekening</div>
            <div class="flex items-center gap-3">
                <span class="font-medium text-gray-800">123 456 7890</span>
                <button class="px-3 py-1 text-blue-600 border border-blue-600 rounded hover:bg-blue-50">
                    Salin
                </button>
            </div>

            <div class="text-gray-600">Atas Nama</div>
            <div class="font-medium text-gray-800">Dummy Samsat</div>
        </div>
    </div>

    <!-- Bank Mandiri -->
    <div class="border rounded-lg p-6 mb-6">
        <div class="flex items-center gap-4 mb-5">
            <div class="w-10 h-10 bg-green-600 rounded-full flex items-center justify-center">
                <span class="text-white font-bold">MDR</span>
            </div>
            <h2 class="text-lg font-semibold text-gray-800">Bank Mandiri</h2>
        </div>

        <div class="grid grid-cols-2 gap-y-4 text-sm">
            <div class="text-gray-600">Nomor Rekening</div>
            <div class="flex items-center gap-3">
                <span class="font-medium text-gray-800">987 654 3210</span>
                <button class="px-3 py-1 text-blue-600 border border-blue-600 rounded hover:bg-blue-50">
                    Salin
                </button>
            </div>

            <div class="text-gray-600">Atas Nama</div>
            <div class="font-medium text-gray-800">Dummy Samsat</div>
        </div>
    </div>

    <!-- Instruksi -->
    <div class="bg-yellow-50 p-4 rounded-lg border border-yellow-200 mb-8">
        <p class="text-sm text-yellow-800">
            <span class="font-semibold">Perhatian:</span>
            Harap transfer sesuai nominal tagihan dan cantumkan kode tagihan <span class="font-medium"></span> pada berita transfer.
        </p>
    </div>

    <!-- Tombol Aksi -->
    <div class="flex gap-4 border-t pt-6">
        <button class="px-6 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium" wire:click="konfirmasi">
            Konfirmasi Pembayaran
        </button>
        {{-- <button class="px-6 py-2.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium">
            Cetak Tagihan
        </button> --}}
    </div>
</div>
