<?php

namespace App\Console\Commands;

use App\Models\MesinPresensi;
use App\Models\MesinPresensiPegawai;
use Illuminate\Console\Command;

class convertSNToMesinID extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:convert-sn-to-mesin-id';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $mesin_list = MesinPresensi::all()->pluck('id', 'sn')->toArray();
        foreach (MesinPresensiPegawai::all() as $record) {
            if ($record->update(['mesin_id' => $mesin_list[$record->sn]])) {
                echo 'Update pegawai_id: ' . $record->pegawai_id . ' Sukses!' . PHP_EOL;
            } else {
                echo 'Update pegawai_id: ' . $record->pegawai_id . ' Gagal!' . PHP_EOL;
            }
        }
    }
}
