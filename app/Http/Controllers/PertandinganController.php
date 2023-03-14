<?php

namespace App\Http\Controllers;

use App\Models\Klub;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pertandingan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Console\View\Components\Alert;

class PertandinganController extends Controller
{
    public function create()
    {
        $data['klubs'] = \App\Models\Klub::all();

        return view('pertandingan.tambah_satu', $data);
    }

    public function createMultiple()
    {
        $data['klubs'] = \App\Models\Klub::all();

        return view('pertandingan.tambah_banyak', $data);
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

    public function storeMultiple(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'klub_tuan_rumah_id.*' => 'required',
            'klub_tamu_id.*' => 'required',
            'skor_tuan_rumah.*' => 'required',
            'skor_tamu.*' => 'required',
        ],[
            'klub_tuan_rumah_id.*.required' => 'Klub Tuan Rumah Harus Dipilih',
            'klub_tamu_id.*.required' => 'Klub Tamu Harus Dipilih',
            'skor_tuan_rumah.*.required' => 'Skor Tuan Rumah Harus Diisi',
            'skor_tamu.*.required' => 'Skor Tamu Harus Diisi',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        foreach($request->klub_tuan_rumah_id as $key => $value){
            $tambahPertandingan = Pertandingan::create([
                'klub_tuan_rumah_id' => $request->klub_tuan_rumah_id[$key],
                'klub_tamu_id' => $request->klub_tamu_id[$key],
                'skor_tuan_rumah' => $request->skor_tuan_rumah[$key],
                'skor_tamu' => $request->skor_tamu[$key],
            ]);
        }

        return redirect()->route('pertandingan-tambah-banyak')->with('success', 'Data Pertandingan Berhasil Ditambahkan!');
    }
}
