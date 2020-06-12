<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Berita;

class BeritaController extends Controller
{
    //
    public function index()
    {
        $data_berita = \App\Berita::all();
        return view('berita.index',compact(['data_berita']));
    }

    public function create(Request $request)
    {
        $berita = \App\Berita::create($request->all());
        return redirect('/berita')->with('sukses','Data sukses diinput');
    }

    public function delete(Berita $berita)
    {
        // metode delete gak pakai parameter
        $berita->delete();
        return redirect('/berita')->with('sukses','Data berhasil di hapus');
    }
}
