<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;
use App\Category;
use App\Tag;

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
        $categories=Category::all();
        $tags=Tag::all();
        return view('admin.create',compact('categories','tags'));
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
            'content'=>'required|min:2',
            'category_id'=>'nullable|exists:categories,id',
            'tag_id'=>'nullable|exists:tags,id',
        ]);
        $post=new Post();
        $post->fill($request->all());
        $slug=(string)Str::of($request->title)->slug('-');
        if(count(Post::all()->where('slug',$slug))>0){
            $slug=$this->fixSlug($slug,1);
        }
        $post->slug=$slug;
        $post->save();
        // $temp=$request->request;
        // $post=$temp->all();
        
        // $post['slug'] = $slug;
        // $tem
        // Post::create($post);
        // dd($post);
        // $postForTag=new Post;
        // $postForTag=Post::find($post['id']);
        $post->tags()->attach($request->tags);
        return redirect()->route('admin.posts.show',$post['slug'])->with('success','il post '.$post["title"].' è stato creato');;
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
        $categories=Category::all();
        $post = Post::all()->where('slug',$slug)->first();
        return view('admin.edit',compact('post'),compact('categories'));
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
            'title'=>'required|min:2|max:150',
            'content'=>'required|min:2'
        ]);
        if($request->title!=$post['title']){
            $request->validate([
                'title'=>'unique:posts',
            ]); 
        }
        $slug=(string)Str::of($request->title)->slug('-');
        if(count(Post::all()->where('slug',$slug))>0){
            $slug=$this->fixSlug($slug,1);
        }
        $data=$request->all();
        $data['slug']=$slug;
        $post->update($data);
        return redirect()->route('admin.posts.show',$data['slug'])->with('success','il post '.$post["title"].' è stato aggiornato');
    }
    private function fixSlug($slug,$count){
        $temp=$slug.$count;
        if(count(Post::all()->where('slug',$temp))>0){
            $count+=1;
            $slug=(string)$this->fixSlug($slug,$count);
        }else{
            return $temp;
        }
        return $slug;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // dd($request->id);
        $post=Post::find($request->id);

        $post->delete();

        return redirect()->route('admin.posts.index')->with('delete','il post '.$post["title"].' è stato cancellato');;
    }
}
