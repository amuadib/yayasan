<?php

namespace App\Console\Commands;

use App\Models\Pegawai;
use App\Models\MesinPresensiPegawai;
use Illuminate\Console\Command;

class populatePegawaiPresensi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:populate-pegawai-presensi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Data SN and PIN from Pegawai';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $data = [];
        foreach (Pegawai::all() as $p) {
            if ($p->fingerspot_sn != '') {
                $data[] = [
                    'pegawai_id' => $p->id,
                    'pin' => $p->fingerspot_pegawai_pin,
                    'sn' => $p->fingerspot_sn
                ];
            }
        }
        if (count($data) > 0) {
            try {
                MesinPresensiPegawai::insert($data);
                echo count($data) . ' data successfully inserted';
            } catch (\Exception $e) {
                echo 'Data exists';
            }
        } else {
            echo 'No data found';
        }
    }
}
