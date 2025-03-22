<div>
    @php
        $hari_list = config('local.hari');
    @endphp
    <ul class="list-inside list-disc">
        @foreach ($getRecord()->jam_kerja as $j)
            <li>{{ $hari_list[$j['hari']] }}: {{ $j['mulai'] }} - {{ $j['selesai'] }}</li>
        @endforeach
    </ul>
</div>
