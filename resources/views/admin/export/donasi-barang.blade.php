<table id="table" class="table datatables-basic">
    <tr>
        <td style="font-weight: bold">Laporan Donasi Barang</td>
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
    <td style="font-weight: bold">TOTAL DONASI BARANG DAN JUMLAHNYA PADA PERIODE INI :</td>
    <tr></tr>
    @foreach ($exportData as $export)
        <td style="font-weight: bold">{{ $loop->iteration }}. {{ $export['Category'] }} ({{ $export['Total_quantity'] }})
        </td>
        <tr></tr>
    @endforeach
    <tr></tr>
    <tr></tr>
    <thead class="table-light">
        <tr>
            <th class="text-center" style="font-weight: bold;">No</th>
            <th class="text-center" style="font-weight: bold;">Nama</th>
            <th class="text-center" style="font-weight: bold;">
                Alamat</th>
            <th class="text-center" style="font-weight: bold;">Nomer Telepon</th>
            <th class="text-center" style="font-weight: bold;">Email</th>
            <th class="text-center" style="font-weight: bold;">Barang Donasi (Qty)</th>
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
                    @php
                        $goodsList = [];
                    @endphp
                    @foreach ($data->donateGoodDetails as $good)
                        @php
                            $goodsList[] = $good->goodsCategory->name . ' (' . $good->quantity . ')';
                        @endphp
                    @endforeach
                    {{ implode(', ', $goodsList) }}
                </td>
                <td class="text-center">{{ Carbon\Carbon::parse($data->date)->format('d F Y') }}</td>
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
