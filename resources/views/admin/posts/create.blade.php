@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>

                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>                  
                @endforeach

            </ul>
        </div>
    @endif
    <div></div>
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.posts.store')}}" method="post">
                @csrf
                <h3 class="my-3">Inserimento nuovo Post</h3>
                <div class="card-title">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" name="title" class="form-control
                  @error('title')
                    is-invalid
                  @enderror
                  " id="title" value="{{old('title')}}">
                </div>
                @error('title')
                <div class="alert alert-danger">{{$error}}</div> {{--or {{$message}} --}}
                @enderror
                <div class="card-text">
                  <label for="content" class="form-label">Content</label>
                  <textarea name="content" class="form-control
                  @error('content')
                    is-invalid
                  @enderror
                  " id="content" placeholder="Inserisci il contenuto del post">{{old('content')}}</textarea>
                </div>
                <div class="py-2">
                    <button type="submit" class="btn btn-primary ">Submit</button>
                    <a href="{{route('admin.posts.index')}}" class="btn btn-warning">Torna indietro</a>
                </div>
            </form>
        </div>
    </div>
@endsection