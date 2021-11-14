@extends('layouts.app')

@section('title')
    Boolpress Articles
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($posts as $post)    
                <div class="col-6 p-2">
                    <div class="shadow-sm p-3 h-md-250 border rounded">
                        <div class="max-title mb-2">
                            <h3 class="max-title">{{$post['title']}}</h3>
                        </div>
                        <div class="mb-2 text-muted">{{$post['updated_at']->format('d-M-y')}}</div>
                            <p class="max-content card-text mb-auto">{{$post['content']}}</p>
                            <p>[...]</p>
                            <a href="/posts/{{$post['slug']}}" class="stretched-link">
                                <button class="btn btn-primary">Visualizza il post completo</button>
                            </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection