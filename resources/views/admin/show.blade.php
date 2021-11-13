@extends('layouts.admin')
@section('title')
    {{$singlePost['title']}}
@endsection
@section('content')
    
        <div class="container border rounded border-secondary p-4 mb-3 mt-5">            
            <h3 class="mb-2">Id: {{$singlePost['id']}}</h3>
            <h3 class="mb-2">Titolo de post: {{$singlePost['title']}}</h3>
            <p class="mb-2">Percorso slug: {{$singlePost['slug']}}</p>
            <p class="mb-2">Contenuto: {{$singlePost['content']}}</p>
        </div>
        <div class="container">
            <a href="{{route('admin.posts.index')}}"><button class="btn btn-primary">Torna a tutti i post</button></a>
        </div>
@endsection