@extends('layouts.admin')
@section('title')
    View all posts
@endsection
@section('content')
    <div class="container border rounded border-secondary p-4 mb-3 mt-5">            
        <form class="mb-2" action="{{route('admin.posts.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Post's title</label>
                <input type="text" value="{{old('title')}}" class="form-control" id="name" name="title">
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="content" class="form-label">Post's content</label>
                <textarea class="form-control" id="content" name="content">{{old('content')}}</textarea>
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <a href="/admin/posts"><button class="btn btn-danger">Annulla</button></a>
    </div>
@endsection