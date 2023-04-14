@extends('admin.navbar')

@section('contenido')
    <div class="container w-25 border p-4 my-4">
        <div class="row mx-auto">
            <form action="{{ route('registros.update', ['registro' => $registro->id]) }}" method="POST">

                @method('PATCH')
                @csrf
                @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }}</h6>
                @endif

                @error('name')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror
                <div class="mb-3">
                    <label for="fecha_contrato" class="form-label">fecha_contrato:</label>
                    <input type="text" class="form-control" name="fecha_contrato" value="{{ $registro->fecha_contrato }}">
                </div>
                <div class="mb-3">
                    <label for="fecha_instalacion" class="form-label">fecha_instalacion</label>
                    <input type="text" class="form-control" name="fecha_instalacion"
                        value="{{ $registro->fecha_instalacion }}">
                </div>
                <label for="id_cliente" class="form-label">ID_CLIENTE</label>
                <select name="id_cliente" class="form-select">
                    <option hidden value="{{ $registro->id_cliente }}">{{ $registro->id_cliente }}</option>
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id }}">
                            {{ $cliente->nombre_cliente . ' ' . $cliente->apellido_pat . ' ' . $cliente->apellido_mat }}
                        </option>
                    @endforeach
                </select>
                @error('id_cliente')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror

                <label for="id_servicio" class="form-label">ID_SERVICIO</label>
                <select name="id_servicio" class="form-select">
                    <option hidden value="{{ $registro->id_servicio }}">{{ $registro->id_servicio }}</option>
                    @foreach ($servicios as $servicio)
                        <option value="{{ $servicio->id }}">
                            {{ $servicio->nombre_servicio }}
                        </option>
                    @endforeach
                </select>
                @error('id_servicio')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror
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
