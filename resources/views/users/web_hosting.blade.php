@extends('users.template')

@section('contenido')
    <div class="" style="text-align: center; margin-top: 1rem;">
        <h4>¡El mejor Hosting lo encuentas aqui!</h4>
        <h5 style="color: red;">¡Aprovecha nuestras ofertas en hosting!</h5>
    </div>
    <style>
        .card_styles {
            background: rgb(163, 178, 226);
            background: linear-gradient(90deg, rgba(163, 178, 226, 1) 0%, rgba(101, 194, 162, 1) 100%, rgba(255, 255, 255, 0.10696778711484589) 100%);
        }
    </style>
    <div class="d-flex flex-wrap justify-content-center">
        @foreach ($servicios as $servicio)
            <div class="ctnr">
                <div class="card mt-4 mr-2 card_styles" style="width: 18rem; height: 27rem; margin: 0.2rem;">
                    <div class="card-body mr-2 ">
                        <div class="title"
                            style="margin-bottom: 4rem; background-color: rgb(0, 255, 64); color: white; text-align: center">
                            <h5 class="card-title">{{ $servicio->nombre_servicio }}</h5>
                        </div>
                        <div class="price" style="text-align: center">
                            <del>
                                <strong>
                                    <h6 class="">${{ $servicio->precio_oferta }}/mes</h6>
                                </strong>
                            </del>
                            <strong>
                                <h5 class="">${{ $servicio->precio_servicio }}/mes</h5>
                            </strong>
                            <p style="font-size: 2.3vh">{{ $servicio->frase_servicio }}</p>
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
                        @foreach ($beneficios as $beneficio)
                            <li class="list" style="list-style: none; font-size: 1.8vh">{{ $beneficio }}</li>
                        @endforeach
                        <div class="center" style="text-align: center">
                            <a href="{{ route('users.servicio', ['id' => $servicio->id]) }}"
                                class="btn btn-light mt-5">Detalles</a>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
