<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = Post::all();
        return view('posts.index',compact(['posts']));
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

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->user()->id,
            'thumbnail' => $request->thumbnail
        ]);

        return redirect()->route('posts.index')->with('sukses','Data sukses di post');
    }

    public function delete(Post $post){
        // metode delete gak pakai parameter
        $post->delete();
        return redirect('/posts')->with('sukses','Data berhasil di hapus');
    }
}
