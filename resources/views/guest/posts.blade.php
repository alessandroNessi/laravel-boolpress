@extends('layouts.admin')
@section('title')
    View all posts
@endsection
@section('content')
    
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th class="fixedwidth text-center" scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($posts as $post)
            <tr>
                <th scope="row">{{$post['id']}}</th>
                <td><h3>{{$post['title']}}</h3></td>
                <td>{{$post['content']}}</td>
                <td class="fixedwidth d-flex">
                    <a href="posts/{{$post['slug']}}"><button class="btn btn-primary">Details</button></a>
                    <a href="posts/{{$post['slug']}}/edit"><button class="btn btn-warning">Edit</button></a>
                    <form action="{{route('admin.posts.destroy',$post['id'])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection