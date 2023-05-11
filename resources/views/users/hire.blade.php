@extends('users.template')
@extends('extends.bootstrap')

@section('contenido')
    <form action="{{ route('hireService') }}" method="POST">
        @csrf
        @if (session('success'))
            <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif
        <input type="text" name="id_cliente" value="{{ $cliente->id }}" hidden>
        <label for="id_servicio" class="form-label">ID_SERVICIO</label>
        <select name="id_servicio" class="form-select">
            @foreach ($servicios as $servicio)
                <option value="{{ $servicio->id }}">{{ $servicio->nombre_servicio }}</option>
            @endforeach
        </select>
        @error('id_servicio')
            <h6 class="alert alert-danger">{{ $message }}</h6>
        @enderror
        <br>
        <button type="submit" class="btn btn-primary">Contratar</button>
    </form>
@endsection
