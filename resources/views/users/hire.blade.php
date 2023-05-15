@extends('users.template')
@extends('extends.bootstrap')

@section('contenido')
    <div class="m-5">
        <h2>Contratación de Servicio</h2>
        <form action="{{ route('hireService') }}" method="POST">
            @csrf
            @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif
            <input type="text" name="id_cliente" value="{{ $cliente->id }}" hidden>
            <label for="id_servicio" class="form-label">SERVICIO A CONTRATAR</label>
            <select name="id_servicio" class="form-select">
                @foreach ($servicios as $servicio)
                    <option value="{{ $servicio->id }}">{{ $servicio->nombre_servicio }}</option>
                @endforeach
            </select>
            @error('id_servicio')
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror
            <br>
            <div class="" style="text-align: center">
                <button type="submit" style="text-align: center" class="btn btn-primary">Contratar</button>
            </div>
        </form>
    </div>
@endsection
