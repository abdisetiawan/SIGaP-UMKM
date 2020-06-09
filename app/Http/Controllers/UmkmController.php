<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Umkm;
use \App\Kecamatan;
use \App\Kelurahan;
use \App\User;
use \App\Member;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UmkmExport;
use PDF;


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

    public function umkmsaya()
    {
        $umkm = auth()->user()->member->umkm;
        return view('umkm.umkmsaya',compact(['umkm']));
    }

    public function ambilkelurahan($id)
    {
        $kelurahan = Kelurahan::where('kecamatan_id', $id)->get();
        return json_encode($kelurahan);
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

        $this->validate($request,
        [
            'nama_umkm' => 'required',
            'keterangan' => 'required',
            'alamat' => 'required'
        ],
        [
            'nama_umkm.required' => 'Nama UMKM Wajib Di Isi',
            'keterangan.required' => 'Keterangan Wajib Di Isi',
            'alamat.required' => 'Alamat Wajib Di Isi'
        ]);

        $member = Member::where('user_id', auth()->user()->id)->first();
        $umkm = \App\Umkm::create([
                'member_id'    => $member->id,
                'kecamatan_id' => $request['kecamatan_id'],
                'kelurahan_id' => $request['kelurahan_id'],
                'kategori_id' => $request['kategori_id'],
                'nama_umkm' => $request['nama_umkm'],
                'alamat' => $request['alamat'],
                'keterangan' => $request['keterangan'],
                'latitude' => $request['titik_lat'],
                'longitude' => $request['titik_long'],
            ]);
        return redirect('/umkmsaya')->with('sukses','Data sukses diinput');
    }

    public function delete(Umkm $umkm)
    {
        // metode delete gak pakai parameter
        $umkm->delete();
        return redirect('/umkmsaya')->with('sukses','Data berhasil di hapus');
    }

    public function exportExcel() 
    {
        return Excel::download(new UmkmExport, 'Daftar_Umkm.xlsx');
    }

    public function exportPdf() 
    {
        $umkm = Umkm::all();
        $pdf = PDF::loadView('export.umkmpdf', ['umkm' => $umkm]);
        return $pdf->download('umkm.pdf');
    }

    public function edit(Umkm $umkm){
        // pasing data ke views edit
        $kecamatan    = \App\Kecamatan::all();
        $kelurahan    = \App\Kelurahan::all();
        $kategori    = \App\Kategori::all();
        return view('umkm/edit',['umkm' => $umkm,'kelurahan' => $kelurahan,'kecamatan' => $kecamatan,'kategori' => $kategori]);
    }

    public function update(Request $request,Umkm $umkm){
        //dd($request->all());
        $umkm->update($request->all());
        if($request->hasFile('thumbnail')){
            $request->file('thumbnail')->move('images/galeri',$request->file('thumbnail')->getClientOriginalName());
            $umkm->thumbnail = $request->file('thumbnail')->getClientOriginalName();
            $umkm->save();
        }
        return redirect('/umkmsaya')->with('sukses','Data sukses diupdate');
    }

}
