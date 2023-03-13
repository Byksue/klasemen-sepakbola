<?php

namespace App\Http\Controllers;

use App\Models\Klub;
use Illuminate\Http\Request;

class DataKlubContoller extends Controller
{
    public function index()
    {
        $data['klubs'] = Klub::all();

        return view('data_klub', $data);
    }

    public function store(Request $request)
    {
        Klub::create([
            'nama_klub' => $request->nama_klub,
            'asal_wilayah' => $request->asal_wilayah,
        ]);

        return redirect()->route('data-klub')->with('success', 'Data berhasil ditambahkan');
    }
}
