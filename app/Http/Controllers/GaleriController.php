<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Umkm;
use \App\Member;
use \App\Galeri;

class GaleriController extends Controller
{
    //
    public function galeriku()
    {
        $umkm = auth()->user()->member->umkm;
        $galeri = auth()->user()->member->galeri;
        return view('galeri.index',compact(['galeri','umkm']));
    }

    public function create(Request $request)
    {
        $this->validate($request,
        [
            'ktrgn_foto' => 'required',
            'foto' => 'required'
        ],
        [
            'ktrgn_foto.required' => 'Keterangan Wajib Di Isi',
            'foto.required' => 'Foto Wajib Di Isi'
        ]);

        $upload = "N";
        if ($request->hasFile('foto')) 
        {
            $destination = "images/galeri";
            $foto = $request->file('foto');
            $foto->move($destination, $foto->getClientOriginalName());
            $upload = "Y";
        }

        if ($upload=="Y") {
            $upload = new Galeri;
            $upload->member_id = auth()->user()->member->id;
            $upload->ktrgn_foto = $request->ktrgn_foto;
            $upload->umkm_id = $request->umkm_id;
            $upload->foto = $foto->getClientOriginalName();
            $upload->save();
        }
        return redirect('/galeriku')->with('sukses','Data sukses diinput');
    }

    public function edit(Galeri $galeri)
    {
        return view('Galeri/edit',['galeri' => $galeri]);
    }

    public function update(Request $request,Galeri $galeri){
        //dd($request->all());
        $galeri->update($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('images/galeri',$request->file('foto')->getClientOriginalName());
            $galeri->foto = $request->file('foto')->getClientOriginalName();
            $galeri->save();
        }
        return redirect('/galeriku')->with('sukses','Data sukses diupdate');
    }

    public function delete(Galeri $galeri)
    {
        // metode delete gak pakai parameter
        $galeri->delete();
        return redirect('/galeriku')->with('sukses','Data berhasil di hapus');
    }
}
