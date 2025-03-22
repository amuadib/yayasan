<?php

namespace App\Actions;

use App\Models\MesinPresensi;
use App\Models\MesinPresensiPegawai;
use App\Models\Pegawai;
use App\Models\Presensi;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Http;

class TarikData
{
    public function __invoke($data)
    {
        if (env('APP_ENV') === 'local') {

            if (!isset($data['sn'])) {
                $result = json_encode(['Result' => false, 'message' => 'Serial Number not found']);
            }

            if (!file_exists(public_path('/dev/') . 'scanlog_' . $data['sn'] . '.json')) {
                $result = json_encode(['Result' => false, 'message' => 'Serial Number ' . $data['sn'] . ' not found']);
            } else {
                $result = json_decode(file_get_contents(public_path('/dev/') . 'scanlog_' . $data['sn'] . '.json'), true);
            }
            // Http::fake([
            //     env('SDK_URL_DEV') . '/scanlog/new' => Http::response([
            //         json_decode($val, false)
            //     ], 200)
            // ]);

            // return Http::post(env('SDK_URL_DEV') . '/scalog/new')
            //     ->throw()
            //     ->json();
        } else {
            $result = Http::post(env('SDK_URL') . '/scanlog/new', $data)
                ->throw()
                ->json();
        }
        if (isset($result['Data']) && count($result['Data']) > 0) {
            // save to file (BACKUP)
            file_put_contents(storage_path('app/backup_pull_' . $data['sn'] . '_' . date('YmdHis') . '.json'), json_encode($result['Data']));

            $mesin_list_sn = MesinPresensi::all()->pluck('id', 'sn')->toArray();
            $mesin_list_id = array_flip($mesin_list_sn);
            foreach (MesinPresensiPegawai::all() as $mp) {
                $pegawai_id_list[$mesin_list_id[$mp->mesin_id] . '-' . $mp->pin] = $mp->pegawai_id;
            }
            // dd($pegawai_id_list);
            //save to DB
            $insert = $failed = [];
            foreach ($result['Data'] as $d) {
                if (!isset($pegawai_id_list[trim($d['SN']) . '-' . trim($d['PIN'])])) {  //user sudah dihapus / tidak terdaftar
                    $failed[] = $d;
                } else {
                    $insert[] = [
                        'pegawai_id' => $pegawai_id_list[trim($d['SN']) . '-' . trim($d['PIN'])],
                        'mesin_id' => $mesin_list_sn[trim($d['SN'])],
                        'scan_time' => $d['ScanDate'],
                        'created_at' => date('Y-md H:i:s'),
                        'updated_at' => date('Y-md H:i:s'),
                    ];
                }
            }

            if (count($failed) > 0) {
                file_put_contents(storage_path('app/failed_insert_' . $data['sn'] . '_' . date('YmdHis') . '.json'), json_encode($failed));
                Notification::make()
                    ->title('Terdapat ' . count($failed) . ' gagal dimasukkan!')
                    ->warning()
                    ->send();
            }
            if (count($insert) > 0) {
                Presensi::insert($insert);
                Notification::make()
                    ->title(count($insert) . ' Data berhasil dimasukkan')
                    ->success()
                    ->send();
            }
        } else {
            Notification::make()
                ->title('Terjadi kesalahan. Error: ' . $result['message'])
                ->warning()
                ->send();
        }
    }
}
