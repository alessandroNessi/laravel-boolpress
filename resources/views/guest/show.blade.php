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
                        <a href="/posts/" class="stretched-link">
                            <button class="btn btn-primary">Return to the blog</button>
                        </a>
                </div>
            </div>
        </div>
    </div>
@endsection