<div class="overflow-x-auto rounded-lg border border-gray-200 shadow-md">
    <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
        <thead class="bg-gray-50">
            <tr>
                <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">#</th>
                <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Nama</th>
                <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">NIK</th>
                <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Tanggal Lahir</th>
                <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Alamat</th>
                <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">No. Telepon</th>
                <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Kendaraan Dimiliki</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-200">
            @foreach ($pemiliks as $pemilik)
                <tr key="{{ $pemilik->id }}" class="hover:bg-gray-50">
                    <td class="whitespace-nowrap px-6 py-4 text-gray-900">{{ $loop->iteration }}</td>
                    <td class="whitespace-nowrap px-6 py-4 text-gray-900">{{ $pemilik->nama }}</td>
                    <td class="whitespace-nowrap px-6 py-4 text-gray-900">{{ $pemilik->nomor_ktp }}</td>
                    <td class="whitespace-nowrap px-6 py-4 text-gray-900">{{ $pemilik->tanggal_lahir }}</td>
                    <td class="whitespace-nowrap px-6 py-4 text-gray-900">{{ $pemilik->alamat }}</td>
                    <td class="whitespace-nowrap px-6 py-4 text-gray-900">{{ $pemilik->nomor_telepon }}</td>
                    <td class="whitespace-nowrap px-6 py-4 text-gray-900">
                        {{ $pemilik->kendaraans->count() ? $pemilik->kendaraans->pluck('model')->join(', ') : '-' }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
