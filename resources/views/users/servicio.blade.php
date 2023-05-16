@extends('users.template')
@section('contenido')
    <div class="mt-5 ml-5 mr-5" style="text-align: center;">
        <h1 style="font-weight: bold;">{{ $servicio->nombre_servicio }}</h1>
        <h3>{{ $servicio->frase_servicio }}</h3>
        <br>
        <del>
            <h4>Precio Normal: {{ $servicio->precio_oferta }}</h4>
        </del>
        <h3 style="font-weight: bold;">Precio Oferta: ${{ $servicio->precio_servicio }}</h3>
    </div>
    @php
        $beneficios = explode('/', $servicio->beneficios_servicio);
    @endphp
    <style>
        .list:before {
            content: '✓';
            margin-right: 5px;
        }
    </style>
    <div class="m-5"style="text-align: center;">
        <h3 style="font-weight: bold;">Beneficios:</h3>
        @foreach ($beneficios as $beneficio)
            <li class="list" style="list-style: none; font-size: 2.4vh">{{ $beneficio }}</li>
        @endforeach
        <br>
        <h3 style="font-weight: bold;">Categoria:</h3>
        <h4>{{ $servicio->categoria }}</h4>
    </div>
    <div class="m-5"style="text-align: center;">
        <form action="{{ route('exportsrv', ['id' => $servicio->id]) }}">
            <input type="text" name="id" hidden value="{{ $servicio->id }}">
            <button type="submit" class="btn btn-danger" style="width: 13rem; height: 5rem; font-weight: bold; font-size: 1.5rem;">
                <i class="fa-solid fa-print" style="color: #ffffff;"></i>
                Generar PDF
            </button>
            
            <div class="btn btn-success d-flex justify-content-center align-items-center"
                style="width: 13rem; height: 5rem;">
                <a href="{{ route('client') }}"
                    style="color: white; text-decoration: none; font-weight: bold; font-size: 1.5rem;"><i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i> Contratar</a>
            </div>
        </form>
    </div>
@endsection
