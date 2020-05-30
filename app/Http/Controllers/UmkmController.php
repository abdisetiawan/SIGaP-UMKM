<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Umkm;
use \App\Kecamatan;
use \App\Kelurahan;

class UmkmController extends Controller
{
    //
    public function index(Request $request)
    {
        $data_umkm = \App\Umkm::all();
        $member    = \App\Member::all();
        $kecamatan    = \App\Kecamatan::all();
        $kelurahan    = \App\Kelurahan::all();
        $kategori    = \App\Kategori::all();
        if($request->has('cari')){
            $data_umkm = \App\Umkm::where('nama_umkm','LIKE','%'.$request->cari.'%')->get();
        }else{
            $data_umkm = \App\Umkm::all();
        }
        return view('umkm.index',['data_umkm' => $data_umkm,'member' => $member,'kecamatan' => $kecamatan,'kelurahan' => $kelurahan,'kategori' => $kategori]);
    }

    public function formumkm()
    {
        $data_umkm = \App\Umkm::all();
        $member    = \App\Member::all();
        $kecamatan    = \App\Kecamatan::all();
        $kelurahan    = \App\Kelurahan::all();
        $kategori    = \App\Kategori::all();
        return view('umkm.formumkm',['data_umkm' => $data_umkm,'member' => $member,'kecamatan' => $kecamatan,'kelurahan' => $kelurahan,'kategori' => $kategori]);
    }

    public function create(Request $request)
    {
        $umkm = \App\Umkm::create(
            [
                'member_id' => $request['member_id'],
                'kecamatan_id' => $request['kecamatan_id'],
                'kelurahan_id' => $request['kelurahan_id'],
                'kategori_id' => $request['kategori_id'],
                'nama_umkm' => $request['nama_umkm'],
                'alamat' => $request['alamat'],
                'keterangan' => $request['keterangan'],
                'latitude' => $request['titik_lat'],
                'longitude' => $request['titik_long'],
            ]
        );
        return redirect('/umkm')->with('sukses','Data sukses diinput');
    }

    public function delete(Umkm $umkm)
    {
        // metode delete gak pakai parameter
        $umkm->delete();
        return redirect('/umkm')->with('sukses','Data berhasil di hapus');
    }

    public function ambilkelurahan($id)
    {
        $kelurahan = Kelurahan::where('kecamatan_id', $id)->get();
        return json_encode($kelurahan);
    }
}
