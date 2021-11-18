@extends('layouts.admin')
@section('title')
    {{$singlePost['title']}}
@endsection
@section('content')
    
        <div class="container border rounded border-secondary p-4 mb-3 mt-5">
            {{-- {{dd($singlePost->category->name)}}--}}
            <h3 class="mb-2">Id: {{$singlePost['id']}}</h3>
            <h3 class="mb-2">Titolo de post: {{$singlePost['title']}}</h3>
            @isset($singlePost->category)
                <p class="mb-2">Categoria: {{$singlePost->category->name}}
            @endisset
            <p class="mb-2">Percorso slug: {{$singlePost['slug']}}</p>
            <p class="mb-2">Contenuto: {{$singlePost['content']}}</p>
        </div>
        <div class="container d-flex">
            <a href="{{route('admin.posts.index')}}"><button class="btn mr-2 btn-primary">Torna a tutti i post</button></a>
            <a href="/admin/posts/{{$singlePost['slug']}}/edit"><button class="btn mr-2 btn-warning">Edit</button></a>
            <form action="{{route('admin.posts.destroy',$singlePost['id'])}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
            </form>
        </div>
@endsection