<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Admin;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = Post::all();
        $admin = Admin::all();
        return view('posts.index',compact(['posts','admin']));
    }
    
    public function add()
    {
        return view('posts.add');
    }

    public function create(Request $request)
    {
        $this->validate($request,
        [
            'title' => 'required|unique:posts'
        ],
        [
            'title.required'   => 'Judul Berita Wajib Di Isi',
            'title.unique' => 'Judul Berita Sudah Ada'
        ]);

        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->admin_id = auth()->user()->admin->id;
        $post->thumbnail = $request->thumbnail;
        $post->save();

        return redirect()->route('posts.index')->with('sukses','Data sukses di post');
    }

    public function delete(Post $post){
        // metode delete gak pakai parameter
        $post->delete();
        return redirect('/posts')->with('sukses','Data berhasil di hapus');
    }
}
