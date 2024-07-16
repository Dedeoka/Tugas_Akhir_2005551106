<table id="table" class="table datatables-basic">
    <tr>
        <td style="font-weight: bold">Laporan Donasi Beasiswa</td>
    </tr>
    @if ($from || $to)
        <tr>
            <td style="font-weight: bold">PERIODE :</td>
            @if ($from && !$to)
                <td>{{ Carbon\Carbon::parse($from)->format('d F Y') }} - Terakhir</td>
            @elseif(!$from && $to)
                <td>Terbaru - {{ Carbon\Carbon::parse($to)->format('d F Y') }}</td>
            @elseif($from && $to)
                <td>{{ Carbon\Carbon::parse($from)->format('d F Y') }} -
                    {{ Carbon\Carbon::parse($to)->format('d F Y') }}</td>
            @endif
        </tr>
    @endif
    <tr></tr>
    <td style="font-weight: bold">
        TOTAL DONASI PERIODE INI : {{ 'Rp ' . number_format($totalAmountSuccess, 0, ',', '.') }}
    </td>
    <tr></tr>
    <tr></tr>
    <thead class="table-light">
        <tr>
            <th class="text-center" style="font-weight: bold;">No</th>
            <th class="text-center" style="font-weight: bold;">Nama</th>
            <th class="text-center" style="font-weight: bold;">Alamat</th>
            <th class="text-center" style="font-weight: bold;">Nomer Telepon</th>
            <th class="text-center" style="font-weight: bold;">Email</th>
            <th class="text-center" style="font-weight: bold;">Jumlah Donasi</th>
            <th class="text-center" style="font-weight: bold;">Tanggal Donasi</th>
            <th class="text-center" style="font-weight: bold;">Deskripsi</th>
            <th class="text-center" style="font-weight: bold;">Status</th>
        </tr>
    </thead>
    <tbody class="table-border-bottom-0">
        @forelse ($datas as $data)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-center">
                    {{ $data->name }}
                </td>
                <td class="text-center">
                    {{ $data->address }}
                </td>
                <td class="text-center">
                    {{ $data->phone_number }}
                </td>
                <td class="text-center">
                    {{ $data->email }}
                </td>
                <td class="text-center">
                    {{ 'Rp ' . number_format($data->total_amount, 0, ',', '.') }}
                </td>
                <td class="text-center">{{ Carbon\Carbon::parse($data->created_at)->format('d F Y') }}</td>
                <td class="text-center">
                    {{ $data->description }}
                </td>
                <td class="text-center">
                    {{ $data->status }}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="10" class="text-center" style="text-align: center">Data is empty</td>
            </tr>
        @endforelse
    </tbody>
</table>
