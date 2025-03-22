<?php

namespace App\Livewire;

use App\Models\MesinPresensi;
use App\Models\Presensi;
use Livewire\Component;
use Livewire\Attributes\Url;
use Illuminate\Support\Facades\Cache;

class RekapPresensiComponent extends Component
{
    public $mesin_list, $tahun_list, $tanggal_list, $last_date, $first_day, $bulan_list, $hari_list, $bulan_title, $cfg_presensi;

    #[Url(except: '')]
    public $mesin_id = '';
    #[Url(except: '')]
    public $bulan = '';
    #[Url(except: '')]
    public $tahun = '';

    public $presensi = [];
    public $jadwal = [];
    public $pegawai = [];
    public function mount()
    {
        $this->cfg_presensi = config('local.presensi');
        $this->hari_list = config('local.hari');
        $this->bulan_list = config('local.bulan');
        $this->mesin_list = MesinPresensi::all()->pluck('nama', 'id')->toArray();
        $this->tahun_list = range(date('Y'), 2022);
        $this->mesin_id = $this->mesin_id == '' ? array_key_first($this->mesin_list) : $this->mesin_id;
        $this->bulan = $this->bulan == '' ? date('m') : $this->bulan;
        $this->tahun = $this->tahun == '' ? date('Y') : $this->tahun;
        $this->last_date = date('t', strtotime($this->tahun . '-' . $this->bulan . '-01'));
        $this->first_day = date('w', strtotime($this->tahun . '-' . $this->bulan . '-01'));
        $this->prosesTanggal();
    }
    public function render()
    {
        return view('livewire.rekap-presensi-component');
    }
    public function updateTable()
    {
        $this->prosesTanggal();
    }
    public function cetakRekap()
    {
        $key = $this->mesin_id . '-' . $this->tahun . '-' . $this->bulan;
        $this->prosesTanggal();
        Cache::put($key, [
            $this->presensi,
            $this->tanggal_list,
            $this->pegawai,
            $this->jadwal,
            $this->bulan_title
        ], now()->addMinutes(99));
        redirect()->to('/admin/rekap-presensi/cetak?data=' . base64_encode($key));
    }

    private function prosesTanggal(): void
    {
        $this->reset(
            ['tanggal_list', 'presensi', 'pegawai', 'jadwal']
        );

        $t = 1;
        $presensi = [];
        $this->last_date = date('t', strtotime($this->tahun . '-' . $this->bulan . '-01'));
        $this->bulan_title = $this->bulan_list[$this->bulan] . ' ' . $this->tahun;
        $day = $this->first_day;
        while ($t <= $this->last_date) {
            $this->tanggal_list[] = str_pad($t, 2, '0', STR_PAD_LEFT) . '<br>' . $this->hari_list[$day];
            $t++;
            if ($day == 6) {
                $day = 0;
            } else {
                $day++;
            }
        }

        foreach (
            Presensi::with('pegawai')
                ->where('mesin_id', $this->mesin_id)
                ->where('scan_time', 'like', $this->tahun . '-' . $this->bulan . '%')
                ->get() as $p
        ) {
            $tanggal = substr($p->scan_time, 8, 2);
            if (!isset($this->jadwal[$p->pegawai_id])) {
                $this->jadwal[$p->pegawai_id] = $this->formatJadwal($p->pegawai->jamKerjas->toArray());
            }
            $presensi[$p->pegawai_id][$tanggal][] = substr($p->scan_time, 11, 5);
            // $this->presensi[$p->pegawai_id][$tanggal][] = $this->prosesWaktuScan($p->scan_time, $p->pegawai_id);
            $this->pegawai[$p->pegawai_id] = $p->pegawai->nama;
        }
        dd(json_encode($presensi));
        $this->presensi = $this->prosesWaktuScan($presensi);
    }
    private function formatJadwal(array $jadwals): array
    {
        $data = [];
        foreach ($jadwals as $jadwal) {
            foreach ($jadwal['jam_kerja'] as $j) {
                $data[$j['hari']][] = [$j['mulai'], $j['selesai']];
                // $data[$j['hari']][] = $j['mulai'] . '-' . $j['selesai'];
            }
        }
        return $data;
    }
    private function prosesWaktuScan(array $presensi): array
    {
        // $this->cfg_presensi;
        // [$tanggal, $jam] = explode(' ', $waktu);
        // $jadwal = $this->jadwal[$pegawai_id][date('w', strtotime($waktu))];
        $data = [];
        foreach ($presensi as $id => $tgl) {
            foreach ($tgl as $scan) {
            }
        }

        return $data;
    }
}
