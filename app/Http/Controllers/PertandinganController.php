<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PertandinganController extends Controller
{
    public function create()
    {
        $data['klubs'] = \App\Models\Klub::all();

        return view('pertandingan.tambah_satu', $data);
    }

    public function getKlubTamu($id)
    {
        $klubs = \App\Models\Klub::where('id', '!=', $id)->get();

        return response()->json($klubs);
    }

    public function store(Request $request)
    {
        $pertandingan = new \App\Models\Pertandingan;
        $pertandingan->klub_tuan_rumah_id = $request->klub_tuan_rumah_id;
        $pertandingan->klub_tamu_id = $request->klub_tamu_id;
        $pertandingan->skor_tuan_rumah = $request->skor_tuan_rumah;
        $pertandingan->skor_tamu = $request->skor_tamu;
        $pertandingan->save();

        return redirect()->route('pertandingan-tambah-satu')->with('success', 'Data Pertandingan Berhasil Ditambahkan!');
    }
}
