<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class PostController extends Controller
{
    public function index(){
        $posts=Post::all();
        return view('guest.posts' , compact('posts'));
    }
    public function show($slug){
        $post=Post::all()->where('slug',$slug)->first();
        // $comments=Comment::all()->where('post_id',$post['id']);
        if(!$post){
            abort(404);
        }
        return view('guest.show' , compact('post'));
    }
}
