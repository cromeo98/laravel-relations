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
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.posts.update', $post->id)}}" method="post">
                @csrf
                @method('PUT')
                <h3 class="my-3">Aggiornamento Post</h3>
                <div class="card-title">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" name="title" class="form-control
                  @error('title')
                  is-invalid
                  @enderror
                  " id="title" value="{{old('title', $post->title)}}">
                  @error('title')
                  <div class="alert alert-danger">{{$error}}</div> {{--or {{$message}} --}}
                  @enderror
                </div>
                <div class="card-text">
                  <label for="content" class="form-label">Content</label>
                  <textarea name="content" class="form-control
                  @error('content')
                  is-invalid
                  @enderror
                  " id="content" placeholder="Inserisci il contenuto del post">{{old('content', $post->content)}}</textarea>
                </div>
                <div class="card-text">
                    <label for="category" class="form-label pt-2">Category</label>
                    <select name="category_id" id="category" class="form-control">
                        <option value="">-- Seleziona una categoria --</option>

                        {{-- Passo le categorie con il foreach
                        Se l'id attualmente selezionato nel value è uguale a quello selezionato prima (old('category_id')) oppure a quello presente nella tabella nel db ($post->category_id) mi scrivi selected --}}
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{-- necessario l'id nel value perchè è il dato da passare al db --}}
                                @if ($category->id == old('category_id', $post->category_id))
                                    selected
                                @endif>
                                {{$category->name}}
                            </option>    
                        @endforeach

                    </select>
                </div>
                <div class="py-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{route('admin.posts.index')}}" class="btn btn-warning">Torna indietro</a>
                </div>
            </form>
        </div>
    </div>
@endsection