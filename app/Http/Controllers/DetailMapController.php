<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Umkm;

class DetailMapController extends Controller
{
    //
    public function index()
    {
        $admin= Admin::all();
        $umkm= Umkm::all();
        return view('daftar.map',compact(['umkm','admin']));
    }
}
