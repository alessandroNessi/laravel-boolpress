<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
        // dd($posts);
        return view("admin.posts",compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|unique:posts|min:2|max:150',
            'content'=>'required|min:2'
        ]);
        $temp=$request->request;
        $post=$temp->all();
        $post['slug'] = Str::of($post['title'])->slug("-");
        Post::create($post);
        return redirect()->route('admin.posts.show',$post['slug']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // $user = DB::table('users')->where('name', 'John')->first();
        $singlePost = Post::all()->where('slug',$slug)->first();
        return view('admin.show',compact('singlePost'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Post::all()->where('slug',$slug)->first();
        return view('admin.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Post $post)
    {
        $request->validate([
            'title'=>'required|unique:posts|min:2|max:150',
            'content'=>'required|min:2'
        ]);
        $data=$request->all();
        $data['slug'] = str_replace(' ', '-', $data['title']);
        $post->update($data);
        return redirect()->route('admin.posts.show',$data['slug']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
