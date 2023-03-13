<?php

namespace App\Http\Controllers;

use App\Models\Pertandingan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KlasemenController extends Controller
{
    function index()
    {
        $pertandingans = Pertandingan::all();

        $klubs = [];

        foreach ($pertandingans as $pertandingan) {
            if (!isset($klubs[$pertandingan->klub_tuan_rumah->nama_klub])) {
                $klubs[$pertandingan->klub_tuan_rumah->nama_klub] = [
                    'nama_klub' => $pertandingan->klub_tuan_rumah->nama_klub,
                    'main' => 0,
                    'menang' => 0,
                    'seri' => 0,
                    'kalah' => 0,
                    'goal_masuk' => 0,
                    'goal_kebobolan' => 0,
                    'point' => 0,
                ];
            }

            if (!isset($klubs[$pertandingan->klub_tamu->nama_klub])) {
                $klubs[$pertandingan->klub_tamu->nama_klub] = [
                    'nama_klub' => $pertandingan->klub_tamu->nama_klub,
                    'main' => 0,
                    'menang' => 0,
                    'seri' => 0,
                    'kalah' => 0,
                    'goal_masuk' => 0,
                    'goal_kebobolan' => 0,
                    'point' => 0,
                ];
            }

            $klubs[$pertandingan->klub_tuan_rumah->nama_klub]['main']++;
            $klubs[$pertandingan->klub_tamu->nama_klub]['main']++;
            $klubs[$pertandingan->klub_tuan_rumah->nama_klub]['goal_masuk'] += $pertandingan->skor_tuan_rumah;
            $klubs[$pertandingan->klub_tuan_rumah->nama_klub]['goal_kebobolan'] += $pertandingan->skor_tamu;
            $klubs[$pertandingan->klub_tamu->nama_klub]['goal_masuk'] += $pertandingan->skor_tamu;
            $klubs[$pertandingan->klub_tamu->nama_klub]['goal_kebobolan'] += $pertandingan->skor_tuan_rumah;

            if ($pertandingan->skor_tuan_rumah > $pertandingan->skor_tamu) {
                $klubs[$pertandingan->klub_tuan_rumah->nama_klub]['menang']++;
                $klubs[$pertandingan->klub_tuan_rumah->nama_klub]['point'] += 3;
                $klubs[$pertandingan->klub_tamu->nama_klub]['kalah']++;
            } elseif ($pertandingan->skor_tuan_rumah < $pertandingan->skor_tamu) {
                $klubs[$pertandingan->klub_tamu->nama_klub]['menang']++;
                $klubs[$pertandingan->klub_tamu->nama_klub]['point'] += 3;
                $klubs[$pertandingan->klub_tuan_rumah->nama_klub]['kalah']++;
            } else {
                $klubs[$pertandingan->klub_tuan_rumah->nama_klub]['seri']++;
                $klubs[$pertandingan->klub_tuan_rumah->nama_klub]['point']++;
                $klubs[$pertandingan->klub_tamu->nama_klub]['seri']++;
                $klubs[$pertandingan->klub_tamu->nama_klub]['point']++;
            }
        }
    
        $klasemen_klub = collect($klubs)->sortByDesc('point')->values()->all();
        // dd($klasemen_klub);
    
        return view('klasemen', compact('klasemen_klub'));
    }
}
