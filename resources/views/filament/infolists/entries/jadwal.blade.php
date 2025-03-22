<div>
    @php
        $hari_list = config('local.hari');
        $jam = [];
        foreach ($getRecord()->jam_kerja as $j) {
            $jam[$j['hari']] = [$j['mulai'], $j['selesai']];
        }
    @endphp
    <div class="mb-3 flex items-center justify-between gap-x-3">
        <dt class="fi-in-entry-wrp-label inline-flex items-center gap-x-3">
            <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                Jadwal
            </span>
        </dt>
    </div>
    <div
        class="relative flex h-full w-full flex-col overflow-auto rounded-xl bg-white bg-clip-border text-gray-700 shadow-sm ring-1 ring-gray-950/5 dark:divide-white/10 dark:divide-white/10 dark:bg-gray-900 dark:text-white dark:ring-white/10">
        <table class="w-full min-w-max table-auto text-left">
            <thead>
                <tr class="bg-gray-50 dark:bg-white/5">
                    @foreach ($hari_list as $h)
                        <th class="border-blue-gray-100 bg-blue-gray-50 p-4 text-center">{{ $h }}
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($hari_list as $id => $h)
                        @if (isset($jam[$id]))
                            <td class="border-blue-gray-50 p-4 text-center">{{ $jam[$id][0] }} -
                                {{ $jam[$id][1] }}</td>
                        @else
                            <td class="border-blue-gray-50 p-4 text-center">-</td>
                        @endif
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</div>
