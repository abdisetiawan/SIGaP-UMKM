<?php

namespace App\Http\Controllers;
use \App\Umkm;
use DB;
use \App\Kategori;

use Illuminate\Http\Request;

class DaftarController extends Controller
{
    //
    public function index()
    {
        $daftarumkm = Umkm::get();
        return view('daftar.index',compact(['daftarumkm']));
    }

    public function filter(Request $request)
    {
        if($request->ajax())
        {
            $daftarumkm= Umkm::all();
            
            $query = json_decode($request->get('query'));
            $daftarumkm=$daftarumkm->get();
            

            $total_row = $daftarumkm->count();
            if($total_row>0)
            {
                $output ='';
                foreach($daftarumkm as $umk)
                {
                    $output .='
                    <div class="col-lg-4 col-md-6 col-sm-12 pt-3">
                        <div class="card">
                            
                                <div class="card-body ">
                                    <div class="product-info">
                                    
                                    <div class="info-1"><img src="" alt=""></div>
                                    <div class="info-4"><h5>'.$umk->nama_umkm.'</h5></div>
                                    <div class="info-2"><h4>'.$umk->kategori->nama_ktgr.'</h4></div>
                                    <div class="info-3"><h5>RM '.$umk->alamat.'</h5></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                    </div>
                    ';
                }
            }
           
            else
            {
                $output='
                <div class="col-lg-4 col-md-6 col-sm-6 pt-3">
                    <h4>No Data Found</h4>
                </div>
                ';
            }
            $data = array(
                'table_data'    =>$output
            );
            echo json_encode($data);
        
        }
        
    }
}
