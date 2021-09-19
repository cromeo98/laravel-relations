@extends('layouts.app')

@section('content')

    <div class="container">
        @if (session('update'))
        <p class="alert btn-outline-success mt-2">{{session('update')}}</p>     
        @endif
        @if (session('delete'))
        <p class="alert btn-outline-danger mt-2">{{session('delete')}}</p>     
        @endif
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">ID Post</th>
                <th scope="col">Title</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{$post->id}}</th>
                        <td>{{$post->title}}</td>
                        <td>
                            <a href="{{route('admin.posts.show', $post->id)}}" class="btn btn-outline-success mx-1">Show</a>
                            <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-outline-warning mx-1">Edit</a>
                            <form action="{{route('admin.posts.destroy', $post->id)}}" class="d-inline-block mx-1 delete-post" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="delete" class="btn btn-outline-danger">
                            </form>
                        </td>
                    </tr>                    
                @endforeach

            </tbody>
        </table>
        <div>
            {{$posts->links()}}
        </div>
    </div>
    
@endsection