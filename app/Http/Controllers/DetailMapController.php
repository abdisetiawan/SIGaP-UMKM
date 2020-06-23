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
        return view('daftar.map');
    }

    public function ambilumkm()
    {
        $data = Umkm::all();
        return json_encode($data);
    }
}
