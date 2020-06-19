<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Member;
use Illuminate\Support\Str;
use App\Exports\MemberExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Illuminate\Support\Facades\Hash;
use \App\User;
use Illuminate\Support\Facades\Auth;
use \App\Umkm;
use \App\Kelurahan;
use \App\Kecamatan;
use \App\Kategori;
use App\Mail\NotifPendaftaranMember;


class MemberController extends Controller
{
    //
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_member = \App\Member::where('nama','LIKE','%'.$request->cari.'%')->get();
        }else{
            $data_member = \App\Member::all();
        }
        return view('member.index',compact(['data_member']));
    }

    public function create(Request $request)
    {  
        $this->validate($request,
        [
            'no_ktp' => 'required|size:16|numeric|unique:member',
            'nama' => 'required',
            'no_telp' => 'required|numeric|max:12',
            'email' => 'required|email|unique:users',
            'alamat' => 'required'
        ],
        [
            'no_ktp.required' => 'No KTP Wajib Di Isi',
            'no_ktp.size'      => 'No KTP Harus 16 Digit',
            'no_ktp.numeric'  => 'No KTP hanya boleh angka',
            'no_ktp.unique'   => 'No KTP Sudah Digunakan',
            'nama.required'   => 'Nama Wajib Di Isi',
            'no_telp.required' => 'No Telp Wajib Di Isi',
            'no_telp.numeric'  => 'No Telp hanya boleh angka',
            'no_telp.max' => 'No Telp Melebihi 12 Digit',
            'email.required' => 'Email Wajib Di Isi',
            'email.email' => 'Format Email Salah',
            'email.unique' => 'Email Sudah Digunakan',
            'alamat.required' => 'Alamat Wajib Di Isi'
        ]);

        $user = new \App\User;
        $user->role = 'member';
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->remember_token = str::random(60);
        $user->save();

        
        $request->request->add(['user_id' => $user->id]);
        $member = new \App\Member;
        $member = \App\Member::create($request->all());

        \Mail::to($user->email)->send(new NotifPendaftaranMember);

        return redirect('/member')->with('sukses','Data sukses diinput');
    }

    public function delete(Member $member)
    {
        // metode delete gak pakai parameter
        $member->delete();
        return redirect('/member')->with('sukses','Data berhasil di hapus');
    }

    public function exportExcel() 
    {
        return Excel::download(new MemberExport, 'Member_Umkm.xlsx');
    }

    public function exportPdf() 
    {
        $member = Member::all();
        $pdf = PDF::loadView('export.memberpdf', ['member' => $member]);
        return $pdf->download('member.pdf');
    }

    public function profilesaya() 
    {
        $member = auth()->user()->member;
        return view('member.profilesaya',compact(['member']));
    }

    public function edit(Member $member){
        // pasing data ke views edit
        return view('member/edit',['member' => $member]);
    }

    public function update(Request $request,Member $member){
        //dd($request->all());
        $member->update($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/galeri/',$request->file('avatar')->getClientOriginalName());
            $member->avatar = $request->file('avatar')->getClientOriginalName();
            $member->save();
        }
        return redirect('/profilesaya')->with('sukses','Data sukses diupdate');
    }

}
