<?php

namespace App\Http\Controllers;
use \App\Umkm;
use \App\Kategori;

use Illuminate\Http\Request;

class DaftarController extends Controller
{
    //
    public function index()
    {
        $data_umkm = \App\Umkm::all();
        $member    = \App\Member::all();
        $kecamatan    = \App\Kecamatan::all();
        $kelurahan    = \App\Kelurahan::all();
        $kategori    = \App\Kategori::all();
        return view('daftar.index',['data_umkm' => $data_umkm,'member' => $member,'kecamatan' => $kecamatan,'kelurahan' => $kelurahan,'kategori' => $kategori]);
    }

}
