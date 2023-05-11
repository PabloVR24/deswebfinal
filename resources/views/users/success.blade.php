@extends('users.template')
@extends('extends.bootstrap')

@section('contenido')
    <h4 class="alert alert-success">Tu Registro ha sido guardado con Exito</h4>
    <br>
    <h5>ID Registro: {{ $id }}</h5>

    <h4>Genera tu Ticket Aqui: </h4>
    <form action="{{ route('export', ['id' => $id]) }}">
        <input type="text" name="id" hidden value="{{ $id }}">
        <input type="submit" value="Generar PDF">
    </form>
@endsection
