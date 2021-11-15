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
                    <button type="button" class="btn button-delete btn-danger" carried-data="{{$post['id']}}" data-toggle="modal" data-target="#deleteModal">
                        Delete
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Sei sicuro di voler eliminare questo elemento?
                </div>
                <div class="modal-footer">
                    <form action="{{route('admin.posts.destroy',' ')}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" id="id-to-delete" name="id">
                        <button type="submit" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger">Delete</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/deleteController.js')}}"></script>
@endsection