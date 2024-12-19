<?php

namespace App\Services;

class PegawaiService
{
    public function generateNIY($data)
    {
        $terakhir = \DB::select('SELECT CAST(SUBSTR(`niy`,-3) AS UNSIGNED) AS `urutan` FROM `pegawai` ORDER BY `urutan` DESC LIMIT 1');
        if (!count($terakhir)) {
            $urutan = '001';
        } else {
            $urutan = str_pad($terakhir[0]->urutan + 1, 3, '0', STR_PAD_LEFT);
        }
        $jenis_kelamin = $data['jenis_kelamin'] == 'l' ? '001' : '002';
        return date('Ym', strtotime($data['tmt'])) . $jenis_kelamin . $urutan;
    }
}
