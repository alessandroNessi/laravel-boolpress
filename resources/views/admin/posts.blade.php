@extends('layouts.admin')
@section('content')
    
    @foreach ($posts as $post)
        <div>
            <h1 class="p-5">{{$post['id'].' '.$post['title']}}</h1>
            <p>{{$post['content']}}</p>
            <hr>
        </div>
    @endforeach
@endsection