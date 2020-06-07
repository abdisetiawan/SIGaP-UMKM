<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Admin;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    //
    public function index(Request $request)
    {
        $data_admin = \App\Admin::all();
        return view('admin.index',['data_admin' => $data_admin]);
    }

    public function create(Request $request)
    {   
        $this->validate($request,
        [
            'nama' => 'required',
            'no_telp' => 'required|max:12',
            'email' => 'required|email|unique:users',
        ],
        [
            'nama.required'   => 'Nama Wajib Di Isi',
            'no_telp.required' => 'No Telp Wajib Di Isi',
            'no_telp.max' => 'No Telp Melebihi 12 Digit',
            'email.required' => 'Email Wajib Di Isi',
            'email.email' => 'Format Email Salah',
            'email.unique' => 'Email Sudah Digunakan',
        ]);

        $user = new \App\User;
        $user->role = 'admin';
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt('kepobangetkamu');
        $user->remember_token = str::random(60);
        $user->save();

        $request->request->add(['user_id' => $user->id]);
        $admin = \App\Admin::create($request->all());

        return redirect('/adm')->with('sukses','Data sukses diinput');
    }

    public function delete(Admin $adm)
    {
        $adm->delete();
        return redirect('/adm')->with('sukses','Data berhasil di hapus');
    }

}
