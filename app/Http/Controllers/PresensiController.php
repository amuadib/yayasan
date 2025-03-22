<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PresensiController extends Controller
{
    public function cetak(Request $request)
    {
        $key = base64_decode($request->get('data'));
        if (Cache::has($key)) {
            return view('presensi.rekap.cetak', ['data' => Cache::get($key)]);
        } else {
            abort(404);
        }
    }
}
