@extends('layouts.admin')
@section('title')
    View all posts
@endsection
@section('content')
    <div class="container border rounded border-secondary p-4 mb-3 mt-5">            
        <form action="{{route('admin.posts.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Post's title</label>
                <input type="text" class="form-control" id="name" name="title">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Post's content</label>
                <textarea class="form-control" id="content" name="content"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection