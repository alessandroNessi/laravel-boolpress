<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index(){
        $posts=Post::all();
        return view('guest.posts' , compact('posts'));
    }
    public function show($slug){
        $post=Post::all()->where('slug',$slug)->first();
        if(!$post){
            abort(404);
        }
        return view('guest.show' , compact('post'));
    }
}
