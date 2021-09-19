@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h2>Dettagli Post</h2>
            <h5 class="card-title">{{$post->title}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{$post->slug}}</h6>
            <p class="card-text">{{$post->content}}</p>
            <a href="{{route('admin.posts.index')}}" class="btn btn-primary">Torna alla lista dei post</a>
        </div>
    </div>
@endsection
