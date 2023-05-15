@extends('users.template')

@section('contenido')
<<<<<<< Updated upstream
    <div class="" style="text-align: center; margin-top: 1rem;">
        <h4>¿Dominios? ¡lo encuentas aqui!</h4>
        <h5 style="color: red;">¡Aprovecha nuestras ofertas en dominios!</h5>
    </div>
    <style>
        .card_styles {
            background: rgb(63, 94, 251);
            background: radial-gradient(circle, rgba(63, 94, 251, 0.7540266106442577) 21%, rgba(252, 70, 107, 0.756827731092437) 97%);
        }
    </style>
    <div class="d-flex flex-wrap justify-content-center">
        @foreach ($servicios as $servicio)
            <div class="ctnr">
                <div class="card mt-4 mr-2 card_styles" style="width: 18rem; height: 27rem; margin: 0.2rem;">
                    <div class="card-body mr-2 ">
                        <div class="title"
                            style="margin-bottom: 4rem; background-color: rgb(251, 255, 0); color: rgb(0, 0, 0); text-align: center">
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
=======
    <div style="text-align: center;">
        <h1 style="text-align: center; margin: 5%; font-size: 300%">Dominios</h1>
        <p style="text-align: center; margin: 5%; font-size: 135% ">
            En StellarHost, te ofrecemos una amplia variedad de opciones
            de dominio para que puedas establecer una presencia en línea
            única y memorable. Ya sea que estés buscando un dominio clásico
            como .com, .net o .org, o prefieras algo más específico como
            .tech, .store o .online, tenemos la solución perfecta para ti. <br><br>
            Además, nuestro proceso de registro de dominio es rápido y
            sencillo, y nuestro equipo de soporte está siempre disponible
            para ayudarte en el proceso. Confía en nosotros para asegurar
            tu identidad en línea con un dominio que se ajuste a tus
            necesidades y objetivos. <br><br> </p>

        <img style="width: 35%; margin-left:5%" src="https://www.thepodcasthost.com/wp-content/uploads/2019/02/domain_name.png"
            alt="Imagen de hosting">

>>>>>>> Stashed changes
    </div>
@endsection
