<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Member;
use Illuminate\Support\Str;
use App\Exports\MemberExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

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

}
