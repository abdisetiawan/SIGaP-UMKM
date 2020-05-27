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
        return view('member.index',['data_member' => $data_member]);
    }

    public function create(Request $request)
    {  

        $user = new \App\User;
        $user->role = 'member';
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->remember_token = str::random(60);
        $user->save();

        
        $request->request->add(['user_id' => $user->id]);
        $member = \App\Member::create($request->all());

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
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $member->avatar = $request->file('avatar')->getClientOriginalName();
            $member->save();
        }
        return redirect('/profilesaya')->with('sukses','Data sukses diupdate');
    }

}
