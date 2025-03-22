<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Rekap Presensi</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid black;
        }

        ul {
            margin: 0px;
            padding: 0px;
            list-style-type: none;
        }

        li {
            margin: 0px;
            padding: 0;
        }
    </style>
</head>

<body>
    @php
        [$presensi, $tanggal_list, $pegawai, $jadwal, $bulan_title] = $data;
    @endphp
    <h2>Rekap Presensi Bulan {{ $bulan_title }}</h2>
    <table>
        <thead>
            <tr>
                <th>Nama</th>

                @foreach ($tanggal_list as $t)
                    <th>{!! $t !!}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @if (count($presensi) > 0)
                @foreach ($presensi as $id => $scan)
                    <tr>
                        <td>
                            {{ $pegawai[$id] }}
                            {{ json_encode($jadwal[$id]) }}
                        </td>
                        @foreach ($tanggal_list as $t)
                            <td>
                                @if (isset($presensi[$id][substr($t, 0, 2)]))
                                    <ul>
                                        @foreach ($presensi[$id][substr($t, 0, 2)] as $s)
                                            <li>
                                                {{ substr($s, 11, 5) }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    -
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="{{ count($tanggal_list) + 1 }}">
                        Belum ada data
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
    <p>Keterangan:</p>
    <ul>
        <li>TW: Tepat Waktu</li>
        <li>TL: Terlambat</li>
        <li>TP: Tidak Presensi</li>
        <li>PA: Pulang Awal</li>
        <li>LN: Lainnya</li>
    </ul>
</body>

</html>
