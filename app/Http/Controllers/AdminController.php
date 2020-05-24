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
