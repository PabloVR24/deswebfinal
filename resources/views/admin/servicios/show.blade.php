@extends('admin.navbar')

@section('contenido')
    <div class="container w-25 border p-4 my-4">
        <div class="row mx-auto">
            <form action="{{ route('servicios.update', ['servicio' => $servicio->id]) }}" method="POST">

                @method('PATCH')
                @csrf
                @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }}</h6>
                @endif

                @error('name')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror
                <div class="mb-3">
                    <label for="nombre_servicio" class="form-label">Nombre_Servicio</label>
                    <input type="text" class="form-control" name="nombre_servicio" value="{{ $servicio->nombre_servicio  }}">
                </div>

                <div class="mb-3">
                    <label for="precio_servicio" class="form-label">Precio_Servicio:</label>
                    <input type="text" class="form-control" name="precio_servicio" value="{{ $servicio->precio_servicio  }}">
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
