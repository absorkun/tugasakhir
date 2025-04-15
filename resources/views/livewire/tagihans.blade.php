<div class="max-w-2xl bg-white rounded-lg shadow-sm mb-6 p-6">
    <div class="space-y-4">
        @foreach ($tagihans as $tagihan)
            <div class="grid grid-cols-2 gap-4 py-4 border-b">
                <div class="flex items-center text-gray-600">
                    <p class="font-medium">Kode Tagihan:</p>
                </div>
                <div class="flex items-center text-gray-800">
                    <p>{{ $tagihan->kode }}</p>
                </div>

                <div class="flex items-center text-gray-600">
                    <p class="font-medium">Nomor Polisi:</p>
                </div>
                <div class="flex items-center text-gray-800">
                    <p>{{ $tagihan->kendaraan->nomor_polisi }}</p>
                </div>

                <div class="flex items-center text-gray-600">
                    <p class="font-medium">Model Kendaraan:</p>
                </div>
                <div class="flex items-center text-gray-800">
                    <p>{{ $tagihan->kendaraan->model }}</p>
                </div>

                <div class="flex items-center text-gray-600">
                    <p class="font-medium">Nama Pemilik:</p>
                </div>
                <div class="flex items-center text-gray-800">
                    <p>{{ $tagihan->pemilik->nama }}</p>
                </div>

                <div class="flex items-center text-gray-600">
                    <p class="font-medium">Jenis Tagihan:</p>
                </div>
                <div class="flex items-center text-gray-800">
                    <p>{{ $tagihan->jenis }}</p>
                </div>

                <div class="flex items-center text-gray-600">
                    <p class="font-medium">Jatuh Tempo:</p>
                </div>
                <div class="flex items-center text-gray-800">
                    <p>{{ $tagihan->jatuh_tempo }}</p>
                </div>

                <div class="flex items-center text-gray-600">
                    <p class="font-medium">Jumlah Bayar:</p>
                </div>
                <div class="flex items-center text-gray-800">
                    <p>{{ $tagihan->jumlah_bayar }}</p>
                </div>

                <div class="flex items-center text-gray-600">
                    <p class="font-medium">Status Pembayaran:</p>
                </div>
                <div class="flex items-center">
                    @if ($tagihan->status == 'settlement')
                        <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">
                            Settlement
                        </span>
                    @elseif ($tagihan->status == 'pending')
                        <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">
                            Pending
                        </span>
                    @else
                        <span class="px-3 py-1 bg-red-100 text-red-800 rounded-full text-sm">
                            Unpaid
                        </span>
                    @endif
                </div>
                <div class="col-span-2 pt-4 flex justify-end space-x-3">
                    <button
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm font-medium"
                        wire:click="process('{{ $tagihan->kode }}', '{{ $tagihan->jumlah_bayar }}')">
                        Bayar Tagihan
                    </button>

                    <button
                        class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium">
                        Cetak Tagihan
                    </button>
                </div>
            </div>
        @endforeach
    </div>
</div>
