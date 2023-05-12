{{-- <h1>{{ $registro->id }}</h1>
<h1>{{ $registro->fecha_contrato }}</h1>
<h1>{{ $registro->fecha_instalacion }}</h1>
<h1>{{ $registro->cliente->nombre_cliente . ' ' . $registro->cliente->apellido_pat . ' ' . $registro->cliente->apellido_mat }}
</h1>
<h1>servicio: {{ $registro->servicios->nombre_servicio }}</h1>
<h1>beneficios: </h1>
@php
    $beneficios = explode('/', $registro->servicios->beneficios_servicio);
@endphp
<style>
    .list:before {
        content: '✓';
        margin-right: 5px;
    }
</style>
@foreach ($beneficios as $beneficio)
    <li class="list" style="list-style: none; font-size: 2.4vh">{{ $beneficio }}</li>
@endforeach --}}
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter+Tight:wght@100;300;500&display=swap');

    .top {
        display: flex;
        justify-content: center;
        align-items: center;
        background: rgb(121, 29, 9);    
        text-align: center;
        color: white;
        font-family: 'Inter Tight', sans-serif;
        height: 5rem;
    }
</style>
<div class="container">
    <div class="top">
        <h1>Lorem ipsum dolor sit amet xssss adipisicing elit. morioles!</h1>
    </div>
</div>

