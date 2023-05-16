@extends('users.template')
@extends('extends.bootstrap')

@section('contenido')
    <div class="m-5" style="text-align: center">
        <h4 class="alert alert-success">
            <i class="fa-duotone fa-check" style="--fa-primary-color: #148b04; --fa-secondary-color: #148b04;"></i> Tu Registro ha sido guardado con
            Exito</h4>
        <br>
        <h5>ID Registro: {{ $id }}</h5>
        <h4>Genera tu Ticket Aqui: </h4>
        <form action="{{ route('export', ['id' => $id]) }}">
            <input type="text" name="id" hidden value="{{ $id }}">
            <br>
            <br>
            <button type="submit" class="btn btn-info">
                <i class="fa-solid fa-file-pdf" style="color: #000000;"></i>
                Generar PDF
            </button>
        </form>
    </div>
@endsection
