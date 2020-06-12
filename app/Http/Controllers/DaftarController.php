<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class DaftarController extends Controller
{
    //
    public function index()
    {
        $umkm = \App\Umkm::all();
        $galeri = \App\Galeri::all();
        return view('daftar.index',compact(['umkm','galeri']));
    }

    public function listkategori($kategori)
    {
        $umkm = \App\Umkm::where('kategori_id',$kategori)->get();
        return view('daftar.list',compact(['umkm']));
    }

    public function listkecamatan($kecamatan)
    {
        $umkm = \App\Umkm::where('kecamatan_id',$kecamatan)->get();
        return view('daftar.list',compact(['umkm']));
    }

    public function listkelurahan($kelurahan)
    {
        $umkm = \App\Umkm::where('kelurahan_id',$kelurahan)->get();
        return view('daftar.list',compact(['umkm']));
    }

    public function detail($ukm)
    {
        $galeri = \App\Galeri::where('umkm_id',$ukm)->get();
        // dd($galeri);
        return View ('daftar.detail',compact(['galeri']));
    }

}
