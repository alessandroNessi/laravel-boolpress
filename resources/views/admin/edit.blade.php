@extends('layouts.admin')
@section('title')
    View all posts
@endsection
@section('content')
    <div class="container border rounded border-secondary p-4 mb-3 mt-5">            
        <form class="mb-1" action="{{route('admin.posts.update',$post['id'])}}" method="POST">
            @csrf
            @method('PUT')
            {{-- @dd($post->tags->contains(2)); --}}
            <div class="mb-3">
                <label for="name" class="form-label">Post's title</label>
                <input type="text" class="form-control" id="name" name="title" value="{{old('title')?old('title'):$post['title']}}">
                
                <div class="mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select class="form-control" name="category_id" id="category_id">
                        <option value="">No category</option>  
                        @foreach ($categories as $category)
                            <option 
                            {{($category['id']!=null&&$post['category_id']==$category['id'])?'selected':(old('category_id')==$category['id']?'selected':'')}}
                             value="{{$category['id']}}">{{$category['name']}}</option>  
                        @endforeach
                    </select>
                </div>
                
                <div class="btn-group mb-3" role="group" aria-label="Basic checkbox toggle button group">
                    @foreach ($tags as $tag)
                        <div class="d-inline-box mr-4">
                            <input {{$post['tags']->contains($tag['id'])?'checked':null}} name='tags[]' type="checkbox" value="{{$tag['id']}}" id="check{{$tag['id']}}">
                            <label for="check{{$tag['id']}}">{{$tag['name']}}</label>
                        </div>
                    @endforeach    
                </div>
            
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="content" class="form-label">Post's content</label>
                <textarea class="form-control" id="content" name="content">{{old('content')?old('content'):$post['content']}}</textarea>
            </div>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        <a href="{{route('admin.posts.index')}}"><button class="btn btn-danger">Annulla</button></a>
    </div>
@endsection