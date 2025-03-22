<div class="fi-ta">
    <div
        class="fi-ta-ctn divide-y divide-gray-200 overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:divide-white/10 dark:bg-gray-900 dark:ring-white/10">
        <div class="fi-ta-header-ctn divide-y divide-gray-200 dark:divide-white/10">
            <div class="fi-ta-header flex flex-col gap-3 p-4 sm:flex-row sm:items-center sm:px-6">
                <div class="grid gap-y-1">
                    <div class="flex gap-x-4">
                        <div class="fi-fo-field-wrp w-32">
                            <div class="grid gap-2">
                                <div class="flex items-center justify-between gap-x-3">
                                    <label class="fi-fo-field-wrp-label inline-flex items-center gap-x-3" for="as_id">
                                        <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                            Mesin
                                        </span>
                                    </label>
                                </div>
                                <div class="grid auto-cols-fr gap-y-2">
                                    <div
                                        class="fi-input-wrp [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-2 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-600 dark:[&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-500 fi-fo-select flex rounded-lg bg-white shadow-sm ring-1 ring-gray-950/10 transition duration-75 dark:bg-white/5 dark:ring-white/20">
                                        <div class="min-w-0 flex-1">
                                            <select
                                                class="fi-select-input [&amp;_optgroup]:bg-white [&amp;_optgroup]:dark:bg-gray-900 [&amp;_option]:bg-white [&amp;_option]:dark:bg-gray-900 block w-full border-none bg-transparent py-1.5 pe-8 ps-3 text-base text-gray-950 transition duration-75 focus:ring-0 disabled:text-gray-500 disabled:[-webkit-text-fill-color:theme(colors.gray.500)] sm:text-sm sm:leading-6 dark:text-white dark:disabled:text-gray-400 dark:disabled:[-webkit-text-fill-color:theme(colors.gray.400)]"
                                                wire:model="mesin_id">
                                                @foreach ($mesin_list as $id => $nama)
                                                    <option value="{{ $id }}">
                                                        {{ $nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="fi-fo-field-wrp w-32">
                            <div class="grid gap-y-2">
                                <div class="flex items-center justify-between gap-x-3">
                                    <label class="fi-fo-field-wrp-label inline-flex items-center gap-x-3"
                                        for="as_id">
                                        <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                            Bulan
                                        </span>
                                    </label>
                                </div>
                                <div class="grid auto-cols-fr gap-y-2">
                                    <div
                                        class="fi-input-wrp [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-600 dark:[&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-500 m-3 flex rounded-lg bg-white shadow-sm ring-1 ring-gray-950/10 transition duration-75 dark:bg-white/5 dark:ring-white/20 [&:not(:has(.fi-ac-action:focus))]:focus-within:ring-2">
                                        <div class="min-w-0 flex-1">
                                            <select
                                                class="fi-select-input [&amp;_optgroup]:bg-white [&amp;_optgroup]:dark:bg-gray-900 [&amp;_option]:bg-white [&amp;_option]:dark:bg-gray-900 block w-full border-none bg-transparent py-1.5 pe-8 ps-3 text-base text-gray-950 transition duration-75 focus:ring-0 disabled:text-gray-500 disabled:[-webkit-text-fill-color:theme(colors.gray.500)] sm:text-sm sm:leading-6 dark:text-white dark:disabled:text-gray-400 dark:disabled:[-webkit-text-fill-color:theme(colors.gray.400)]"
                                                wire:model="bulan">
                                                @foreach ($bulan_list as $no => $nama)
                                                    <option value="{{ $no }}">
                                                        {{ $nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="fi-fo-field-wrp w-32">
                            <div class="grid gap-y-2">
                                <div class="flex items-center justify-between gap-x-3">
                                    <label class="fi-fo-field-wrp-label inline-flex items-center gap-x-3"
                                        for="as_id">
                                        <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                            Tahun
                                        </span>
                                    </label>
                                </div>
                                <div class="grid auto-cols-fr gap-y-2">
                                    <div
                                        class="fi-input-wrp [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-600 dark:[&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-500 m-3 flex rounded-lg bg-white shadow-sm ring-1 ring-gray-950/10 transition duration-75 dark:bg-white/5 dark:ring-white/20 [&:not(:has(.fi-ac-action:focus))]:focus-within:ring-2">
                                        <div class="min-w-0 flex-1">
                                            <select
                                                class="fi-select-input [&amp;_optgroup]:bg-white [&amp;_optgroup]:dark:bg-gray-900 [&amp;_option]:bg-white [&amp;_option]:dark:bg-gray-900 block w-full border-none bg-transparent py-1.5 pe-8 ps-3 text-base text-gray-950 transition duration-75 focus:ring-0 disabled:text-gray-500 disabled:[-webkit-text-fill-color:theme(colors.gray.500)] sm:text-sm sm:leading-6 dark:text-white dark:disabled:text-gray-400 dark:disabled:[-webkit-text-fill-color:theme(colors.gray.400)]"
                                                wire:model="tahun">
                                                @foreach ($tahun_list as $tahun)
                                                    <option value="{{ $tahun }}">
                                                        {{ $tahun }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="fi-fo-field-wrp">
                            <div class="grid gap-y-2">
                                <div class="flex items-center justify-between gap-x-3">
                                    <label class="fi-fo-field-wrp-label inline-flex items-center gap-x-3"
                                        for="as_id">
                                        <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                            &nbsp;
                                        </span>
                                    </label>
                                </div>
                                <div class="grid auto-cols-fr gap-y-2">
                                    <div class="fi-input-wrp m-3 flex rounded-lg shadow-sm transition duration-75">
                                        <div class="min-w-0 flex-1">
                                            <x-filament::button color="success"
                                                wire:click="updateTable">Tampilkan</x-filament::button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="fi-fo-field-wrp">
                            <div class="grid gap-y-2">
                                <div class="flex items-center justify-between gap-x-3">
                                    <label class="fi-fo-field-wrp-label inline-flex items-center gap-x-3"
                                        for="as_id">
                                        <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                            &nbsp;
                                        </span>
                                    </label>
                                </div>
                                <div class="grid auto-cols-fr gap-y-2">
                                    <div class="fi-input-wrp m-3 flex rounded-lg shadow-sm transition duration-75">
                                        <div class="min-w-0 flex-1">
                                            <x-filament::button color="info"
                                                wire:click="cetakRekap">Cetak</x-filament::button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="fi-ta-content relative divide-y divide-gray-200 overflow-x-auto dark:divide-white/10 dark:border-t-white/10">
                <table class="fi-ta-table w-full table-auto divide-y divide-gray-200 text-start dark:divide-white/5">
                    <thead class="divide-y divide-gray-200 dark:divide-white/5">
                        <tr class="bg-gray-50 dark:bg-white/5">
                            <th
                                class="fi-ta-header-cell px-3 py-3.5 text-sm font-semibold sm:ps-6 sm:last-of-type:pe-6">
                                <span class="group flex w-full items-center justify-start gap-x-1 whitespace-nowrap">
                                    Nama
                                </span>
                            </th>
                            @foreach ($tanggal_list as $t)
                                <th class="fi-ta-header-cell p-1 text-center text-sm font-semibold">
                                    <span class="group w-full items-center gap-x-1 whitespace-nowrap">
                                        {!! $t !!}
                                    </span>
                                </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 whitespace-nowrap dark:divide-white/5">
                        @if (count($presensi) > 0)
                            {{-- @dd($presensi) --}}
                            @foreach ($presensi as $id => $scan)
                                <tr
                                    class="fi-ta-row [@media(hover:hover)]:transition [@media(hover:hover)]:duration-75">
                                    <td class="fi-ta-cell p-0 ps-1 last-of-type:pe-1 sm:ps-3 sm:last-of-type:pe-3">
                                        <div class="flex w-full justify-start text-start disabled:pointer-events-none">
                                            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4 text-sm">
                                                {{ $pegawai[$id] }}
                                            </div>
                                        </div>
                                    </td>
                                    @foreach ($tanggal_list as $t)
                                        <td class="fi-ta-cell p-0 ps-1 last-of-type:pe-1 sm:ps-3 sm:last-of-type:pe-3">
                                            <div
                                                class="flex w-full justify-start text-start disabled:pointer-events-none">
                                                <div
                                                    class="fi-ta-text grid w-full gap-y-1 px-3 py-4 text-center text-sm">
                                                    @if (isset($presensi[$id][substr($t, 0, 2)]))
                                                        <ul>
                                                            @foreach ($presensi[$id][substr($t, 0, 2)] as $s)
                                                                <li>{{ substr($s, 11, 5) }}</li>
                                                            @endforeach
                                                        </ul>
                                                    @else
                                                        -
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    @endforeach
                                    {{-- <td class="fi-ta-cell p-0 ps-1 last-of-type:pe-1 sm:ps-3 sm:last-of-type:pe-3">
                                        <div class="flex w-full justify-start text-start disabled:pointer-events-none">
                                            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4 text-sm">
                                                Rp
                                            </div>
                                        </div>
                                    </td>
                                    <td class="fi-ta-cell p-0 ps-1 last-of-type:pe-1 sm:ps-3 sm:last-of-type:pe-3">
                                        <div class="flex w-full justify-end text-end disabled:pointer-events-none">
                                            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4 text-sm">
                                                {{ $t['masuk'] }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="fi-ta-cell p-0 ps-1 last-of-type:pe-1 sm:ps-3 sm:last-of-type:pe-3">
                                        <div class="flex w-full justify-start text-start disabled:pointer-events-none">
                                            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4 text-sm">
                                                Rp
                                            </div>
                                        </div>
                                    </td>
                                    <td class="fi-ta-cell p-0 ps-1 last-of-type:pe-1 sm:ps-3 sm:last-of-type:pe-3">
                                        <div class="flex w-full justify-end text-end disabled:pointer-events-none">
                                            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4 text-sm">
                                                {{ $t['keluar'] }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="fi-ta-cell p-0 ps-1 last-of-type:pe-1 sm:ps-3 sm:last-of-type:pe-3">
                                        <div class="flex w-full justify-start text-start disabled:pointer-events-none">
                                            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4 text-sm">
                                                Rp
                                            </div>
                                        </div>
                                    </td>
                                    <td class="fi-ta-cell p-0 ps-1 last-of-type:pe-1 sm:ps-3 sm:last-of-type:pe-3">
                                        <div class="flex w-full justify-end text-end disabled:pointer-events-none">
                                            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4 text-sm">
                                                {{ $t['saldo'] }}
                                            </div>
                                        </div>
                                    </td> --}}
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="{{ count($tanggal_list) + 1 }}"
                                    class="fi-ta-cell p-0 ps-1 last-of-type:pe-1 sm:ps-3 sm:last-of-type:pe-3">
                                    <div class="flex w-full justify-center text-center disabled:pointer-events-none">
                                        <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4 text-sm">
                                            Belum ada data
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                    {{-- <tfoot>
                        <tr class="bg-gray-50 dark:bg-white/5">
                            <th colspan="2"
                                class="fi-ta-header-cell px-3 py-3.5 text-sm font-semibold sm:ps-6 sm:last-of-type:pe-6">
                                <span class="group flex w-full items-center justify-start gap-x-1 whitespace-nowrap">
                                    Total
                                </span>
                            </th>
                            <th
                                class="fi-ta-header-cell px-3 py-3.5 text-sm font-semibold sm:ps-6 sm:last-of-type:pe-6">
                                <span class="group flex w-full items-center justify-start gap-x-1 whitespace-nowrap">
                                    Rp
                                </span>
                            </th>
                            <th
                                class="fi-ta-header-cell px-3 py-3.5 text-sm font-semibold sm:ps-6 sm:last-of-type:pe-6">
                                <span class="group flex w-full items-center justify-end gap-x-1 whitespace-nowrap">
                                    {{ number_format(intval($masuk), thousands_separator: '.') }}
                                </span>
                            </th>
                            <th
                                class="fi-ta-header-cell px-3 py-3.5 text-sm font-semibold sm:ps-6 sm:last-of-type:pe-6">
                                <span class="group flex w-full items-center justify-start gap-x-1 whitespace-nowrap">
                                    Rp
                                </span>
                            </th>
                            <th
                                class="fi-ta-header-cell px-3 py-3.5 text-sm font-semibold sm:ps-6 sm:last-of-type:pe-6">
                                <span class="group flex w-full items-center justify-end gap-x-1 whitespace-nowrap">
                                    {{ number_format(intval($keluar), thousands_separator: '.') }}
                                </span>
                            </th>
                            <th
                                class="fi-ta-header-cell px-3 py-3.5 text-sm font-semibold sm:ps-6 sm:last-of-type:pe-6">
                                <span class="group flex w-full items-center justify-start gap-x-1 whitespace-nowrap">
                                    Rp
                                </span>
                            </th>
                            <th
                                class="fi-ta-header-cell px-3 py-3.5 text-sm font-semibold sm:ps-6 sm:last-of-type:pe-6">
                                <span class="group flex w-full items-center justify-end gap-x-1 whitespace-nowrap">
                                    {{ $t['saldo'] ?? 0 }}
                                </span>
                            </th>
                        </tr>
                    </tfoot> --}}
                </table>
            </div>
        </div>
    </div>
</div>
