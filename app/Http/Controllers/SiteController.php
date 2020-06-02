<?php

namespace App\Http\Controllers;

use App\post;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home(){
        $posts = Post::all();
        return view('sites.home',compact(['posts']));
    }

    public function singlepost($slug)
    {
        $post = Post::where('slug','=',$slug)->first();
        return view('sites.singlepost',compact(['post']));
    }
}
