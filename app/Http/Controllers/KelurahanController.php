<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Kelurahan;
use \App\Kecamatan;

class KelurahanController extends Controller
{
    //
    public function index()
    {
        $data_kelurahan = \App\Kelurahan::all();
        $kecamatan      = \App\Kecamatan::all();
        return view('kelurahan.index',['data_kelurahan' => $data_kelurahan,'kecamatan' => $kecamatan]);
    }

    public function delete(Kelurahan $kelurahan)
    {
        // metode delete gak pakai parameter
        $kelurahan->delete();
        return redirect('/kelurahan')->with('sukses','Data berhasil di hapus');
    }

    public function create(Request $request)
    {
        $this->validate($request,
        [
            'nama_klrhn' => 'required|unique:kelurahan'
        ],
        [
            'nama_klrhn.required'   => 'Nama Kelurahan Wajib Di Isi',
            'nama_klrhn.unique' => 'Nama Kelurahan Sudah Ada'
        ]);

        $kelurahan = \App\Kelurahan::create(
            [
                'kecamatan_id' => $request['kecamatan'],
                'nama_klrhn' => $request['nama_klrhn']
            ]
        );
        return redirect('/kelurahan')->with('sukses','Data sukses diinput');
    }

    public function edit(Kelurahan $kelurahan){
        // pasing data ke views edit
        $kecamatan      = \App\Kecamatan::all();
        return view('kelurahan/edit',['kelurahan' => $kelurahan,'kecamatan' => $kecamatan]);
    }

    public function update(Kelurahan $kelurahan){
        //dd($request->all());
        $kelurahan->update([
            'kecamatan_id' => request('kecamatan'),
            'nama_klrhn' => request('nama_klrhn'),
        ]);
        return redirect('/kelurahan')->with('sukses','Data sukses diupdate');
    }
}
