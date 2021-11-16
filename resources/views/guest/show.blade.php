@extends('layouts.app')

@section('title')
    Boolpress Articles
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 p-2">
                <div class="shadow-sm p-3 h-md-250 border rounded">
                    <div class="mb-2">
                        <h3 class="">{{$post['title']}}</h3>
                    </div>
                    <div class="mb-2 text-muted">{{$post['updated_at']->format('d-M-y')}}</div>
                    <p class="card-text mb-auto">{{$post['content']}}</p>

                    {{-- <button class="btn btn-secondary">Add a comment</button> --}}

                    <a href="/posts/" class="stretched-link">
                        <button class="btn btn-primary">Return to the blog</button>
                    </a>
                </div>
                {{-- <form class="my-3" action="{{route('admin.posts.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="post_id" value="{{$post['id']}}">
                    <div class="mb-3">
                        <label for="name" class="form-label">Author</label>
                        <input type="text" value="{{old('author')}}" class="form-control" id="name" name="author">
                    </div>
                    @error('author')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="content" class="form-label">Comment</label>
                        <textarea class="form-control" id="content" name="content">{{old('content')}}</textarea>
                    </div>
                    @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form> --}}
                @if (count($comments)>0)
                    <div class="shadow-sm mt-3 p-3 h-md-250 border rounded">
                        @foreach ($comments as $comment)
                            <div class="shadow-sm mt-3 p-3 h-md-250 border rounded">
                                <div class="mb-2">
                                    <strong class="">{{$comment['autor']}}</strong>
                                </div>
                                <div class="mb-2 text-muted">{{$comment['updated_at']->format('d-M-y')}}</div>
                                <p class="card-text mb-auto">{{$comment['content']}}</p>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection