@extends('layouts.admin')
@section('title')
    View all posts
@endsection
@section('content')
    {{-- @dd($tags); --}}
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
                <label for="category_id" class="form-label">Category</label>
                <select class="form-control" name="category_id" id="category_id">
                    <option value="">No category</option>  
                    @foreach ($categories as $category)
                        <option {{old('category_id')==$category['id']?'selected':''}} value="{{$category['id']}}">{{$category['name']}}</option>  
                    @endforeach
                </select>
            </div>

            <div class="btn-group mb-3" role="group" aria-label="Basic checkbox toggle button group">
                @foreach ($tags as $tag)
                    <div class="d-inline-box mr-4">
                        <input name='tags[]' type="checkbox" value="{{$tag['id']}}" id="check{{$tag['id']}}">
                        <label for="check{{$tag['id']}}">{{$tag['name']}}</label>
                    </div>
                @endforeach
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Post's content</label>
                <textarea class="form-control" id="content" name="content">{{old('content')}}</textarea>
            </div>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <a href="{{route("admin.posts.index")}}"><button class="btn btn-danger">Annulla</button></a>
    </div>
@endsection