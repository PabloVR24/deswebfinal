@extends('users.navbar')

@section('contenido')
    <h1>{{ $servicio->nombre_servicio }}</h1>
    <h3>Precio: ${{ $servicio->precio_servicio }}</h3>
    @php
        $beneficios = explode('/', $servicio->beneficios_servicio);
    @endphp
    <style>
        .list:before {
            content: '✓';
            margin-right: 5px;
        }
    </style>
    @foreach ($beneficios as $beneficio)
        <li class="list" style="list-style: none; font-size: 2.4vh">{{ $beneficio }}</li>
    @endforeach
    <form action="{{ route('exportsrv', ['id' => $servicio->id]) }}">
        <input type="text"  name="id" hidden value="{{$servicio->id}}">
        <input type="submit" value="Generar PDF">
    </form>
@endsection
