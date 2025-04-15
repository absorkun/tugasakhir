<div class="overflow-x-auto rounded-lg border border-gray-200 shadow-md">
    <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
        <thead class="bg-gray-50">
            <tr>
                <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">#</th>
                <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Nama Pemilik</th>
                <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Model</th>
                <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Merek</th>
                <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Nomor Polisi</th>
                <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Nomor Mesin</th>
                <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Tanggal Rilis</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-200">
            @foreach ($kendaraans as $kendaraan)
                <tr key="{{ $kendaraan->id }}" class="hover:bg-gray-50">
                    <td class="whitespace-nowrap px-6 py-4 text-gray-900">{{ $loop->iteration }}</td>
                    <td class="whitespace-nowrap px-6 py-4 text-gray-900">{{ $kendaraan->pemilik->nama }}</td>
                    <td class="whitespace-nowrap px-6 py-4 text-gray-900">{{ $kendaraan->model }}</td>
                    <td class="whitespace-nowrap px-6 py-4 text-gray-900">{{ $kendaraan->merek }}</td>
                    <td class="whitespace-nowrap px-6 py-4 text-gray-900">{{ $kendaraan->nomor_polisi }}</td>
                    <td class="whitespace-nowrap px-6 py-4 text-gray-900">{{ $kendaraan->nomor_mesin }}</td>
                    <td class="whitespace-nowrap px-6 py-4 text-gray-900">{{ $kendaraan->tanggal_rilis }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
