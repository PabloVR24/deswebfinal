@extends('admin.navbar')

@section('contenido')
    <div class="container w-25 border p-4 my-4">
        <div class="row mx-auto">
            <form action="{{ route('clientes.update', ['cliente' => $cliente->id]) }}" method="POST">

                @method('PATCH')
                @csrf
                @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }}</h6>
                @endif

                @error('name')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror
                <div class="mb-3">
                    <label for="nombre_cliente" class="form-label">Nombre_Cliente</label>
                    <input type="text" class="form-control" name="nombre_cliente" value="{{ $cliente->nombre_cliente  }}">
                </div>

                <div class="mb-3">
                    <label for="apellido_pat" class="form-label">Apellido_Paterno:</label>
                    <input type="text" class="form-control" name="apellido_pat" value="{{ $cliente->apellido_pat  }}">
                </div>
                <div class="mb-3">
                    <label for="apellido_mat" class="form-label">Apellido_Materno:</label>
                    <input type="text" class="form-control" name="apellido_mat" value="{{ $cliente->apellido_mat  }}">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Telefono:</label>
                    <input type="text" class="form-control" name="telefono" value="{{ $cliente->telefono  }}">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Email:</label>
                    <input type="text" class="form-control" name="email" value="{{ $cliente->email  }}">
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
