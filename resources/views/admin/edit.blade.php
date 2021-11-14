@extends('layouts.admin')
@section('title')
    View all posts
@endsection
@section('content')
    <div class="container border rounded border-secondary p-4 mb-3 mt-5">            
        <form class="mb-1" action="{{route('admin.posts.update',$post['id'])}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Post's title</label>
                <input type="text" class="form-control" id="name" name="title" value="{{old('title')?old('title'):$post['title']}}">
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