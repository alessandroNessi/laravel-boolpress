<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            //need to check post id
            'author'=>'required|unique:posts|min:2|max:150',
            'content'=>'required|min:2'
        ]);
        $temp=$request->request;
        $post=$temp->all();
        // Post::create($post);
        return redirect()->route('admin.posts.show',$post['slug'])->with('success','il post '.$post["title"].' è stato creato');;
    }
}
