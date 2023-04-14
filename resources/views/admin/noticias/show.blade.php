@extends('admin.navbar')

@section('contenido')
    <div class="container w-25 border p-4 my-4">
        <div class="row mx-auto">
            <form action="{{ route('noticias.update', ['noticia' => $noticia->id]) }}" method="POST">

                @method('PATCH')
                @csrf
                @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }}</h6>
                @endif

                <div class="mb-3">
                    <label for="author" class="form-label">Autor</label>
                    <input type="text" class="form-control" name="author" value="{{ $noticia->author }}">
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Titulo</label>
                    <input type="text" class="form-control" name="title" value="{{ $noticia->title }}">
                </div>

                <div class="mb-3">
                    <label for="url" class="form-label">URL</label>
                    <textarea name="url" class="form-control" cols="2" rows="2">{{ $noticia->url }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="urlToImage" class="form-label">URL: Imagen</label>
                    <textarea name="urlToImage" class="form-control" cols="2" rows="2">{{ $noticia->urlToImage }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="publishedAt" class="form-label">Publicado: </label>
                    <input type="text" class="form-control" name="publishedAt" value="{{ $noticia->publishedAt }}">
                </div>

                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>

        {{-- <div class="">
            @if ($category->todos->count() > 0)
                @foreach ($category->todos as $todo)
                    <div class="row py-1">
                        <a href="{{ route('todos-edit', ['id' => $todo->id]) }}">{{ $todo->title }}</a>
                    </div>
                    <div class="col-md-3 d-flex justify-content-end">
                        <form action="{{ route('todos-destroy', [$todo->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">
                                Eliminar
                            </button>
                        </form>
                    </div>
                @endforeach
            @else
                No hay tareas para esta categoria
            @endif
        </div> --}}

    </div>
@endsection
