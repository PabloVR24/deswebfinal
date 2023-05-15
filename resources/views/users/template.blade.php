<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>StellarHost - Web Hosting</title>
    <link rel="stylesheet" href="{{ asset('css/template.css') }}" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="https://www.google.com/recaptcha/api.js" async defer>
    </script>
</head>

<body>
    <!-- Header -->
    <header class="header">
        <img src="{{ URL::asset('images/logo.png') }}" id="logo" alt="StellarHost Logo" />
        <button id="HelpBut"><b>Ayuda en línea 💬 </b></button>
        <p id="ConVent">
            <b>Contacto de Ventas:</b><br /><b>📞 (844) 107 1532</b>
        </p>
    </header>

    <nav class="navH">
        <ul>
            <li><a href="{{ route('compañia') }}">Compañía</a></li>
            <li><a href="{{ route('allServices') }}">Servicios</a></li>
            <li><a href="{{ route('soluciones') }}">Soluciones</a></li>
            <li><a href="{{ route('clientesSH') }}">Clientes</a></li>
            <li><a href="{{ route('contacto') }}">Contacto</a></li>
        </ul>
    </nav>

    <div class="slider">
        @yield('slider')
    </div>

    <!-- Navbar vertical -->
    <div class="contenedor">
        <nav class="navV">
            <h4 class="navVTit">Asistencia tecnica 24/7</h4>
            <ul>
                <li>
                    <a href="{{ route('web_hosting') }}"><span class="material-symbols-outlined"> language</span> Web
                        Hosting</a>
                </li>
                <li>
                    <a href="{{ route('servidor_dedicado') }}"><span class="material-symbols-outlined"> dns </span>
                        Servidor
                        Dedicado</a>
                </li>
                <li>
                    <a href="{{ route('poliza') }}"><span class="material-symbols-outlined"> verified </span> Póliza
                        de Garantías</a>
                </li>
                <li>
                    <a href="{{ route('Por_que_nosotros') }}"><span class="material-symbols-outlined"> help </span> Por
                        Qué
                        Nosotros</a>
                </li>
                <li>
                    <a href="{{ route('allServices') }}"><span class="material-symbols-outlined"> phone_in_talk
                        </span>
                        Todos nuestros servicios</a>
                </li>
                <li>
                    <a href="{{ route('dominios') }}"><span class="material-symbols-outlined"> http </span> Dominios</a>
                </li>
                <li>
                    <a href="{{ route('mas_servicios') }}"><span class="material-symbols-outlined"> library_add </span>
                        Más
                        Servicios</a>
                </li>
                <li>
                    <a href="{{ route('tecnologia') }}"><span class="material-symbols-outlined"> settings_suggest
                        </span>
                        Tecnología</a>
                </li>
                <li>
                    <a href="{{ route('resellers') }}"><span class="material-symbols-outlined">
                            currency_exchange
                        </span>
                        Resellers</a>
                </li>
                <li>
                    <a href="{{ route('FAQ') }}"><span class="material-symbols-outlined"> psychology_alt </span>
                        FAQ</a>
                </li>
            </ul>
            @php
                $archivo = public_path('archivo.txt');
                $contador = intval(file_get_contents($archivo));

                $file = fopen($archivo, 'w');
                fwrite($file, $contador + 1 . PHP_EOL);
                fclose($file);

                $file = fopen($archivo, 'r');

            @endphp
            <div class="Contadores">
                <p class="CVisitas">
                    <span class="material-symbols-outlined"> person_add </span>
                    Visitas: {{ fgets($file) }}
                </p>

                {{-- <p class="Conectados">
                    <span class="material-symbols-outlined"> communication </span>
                    Conectados:
                </p> --}}
            </div>
        </nav>

        <article class="main">@yield('contenido')</article>

        <div class="derecha">
            <div class="fila1">
                <img class="sr2" src="{{ URL::asset('images/señor2.png') }}" alt="Señor 2" />
            </div>
            <div class="fila2">
                @yield('noticias')
                <p class="derechaTXT">
                    La máxima calidad en hosting al mejor precio. Los planes incluyen
                    todo lo que necesitas: Mayor rendimiento y máxima seguridad para tu
                    sitio web. StellarHost te ofrece el más alto nivel de confiabilidad
                    gracias a nuestra geo redundancia: lo que significa que tu página
                    web estará almacenada en 2 centros de datos de alto rendimiento
                    independientes localizados en distintos lugares. Si tienes alguna
                    duda puedes ponerte en contacto con nosotros a:
                </p>
            </div>
            <div class="fila3">
                <img class="logosTEC" src="{{ URL::asset('images/logosTEC.png') }}" alt="Tecnologías" />
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <footer>
            <div class="columna20">
                <h4 class="FooterH4">Esto podria interesarte:</h4>
                <img class="ServDedic" src="{{ URL::asset('images/ServDedic.png') }}" alt="Servidores dedicados" />
                <h4 class="FooterH4">StellarHost © 2023</h4>
                <h3 class="FooterH3">
                    <a href="https://www.google.com">Políticas de reembolso</a>
                </h3>
            </div>

            <div class="columna35">
                <div class="raw1">
                    <div class="C1">
                        <h3 class="FooterH3">
                            <a href="https://www.google.com">Términos y condiciones</a>
                        </h3>
                        <h3 class="FooterH3">
                            <a href="https://www.google.com">Transferencia de dominios</a>
                        </h3>
                    </div>
                    <div class="C2">
                        <h3 class="FooterH3">
                            <a href="https://www.google.com">Politicas de privacidad</a>
                        </h3>
                        <h3 class="FooterH3">
                            <a href="https://www.google.com">Precios de dominios</a>
                        </h3>
                    </div>
                </div>
                <div class="raw2">
                    <div class="C1">
                        <p class="direccion">
                            202 Bitters Road <br />
                            San Antonio, TX <br />
                            23844
                        </p>
                    </div>
                    <div class="C2">
                        <h3 class="FooterH3">
                            <a href="https://goo.gl/maps/jv4SqxaSzWeQt7aLA" target="_blank"><span
                                    class="material-symbols-outlined"> location_on</span><br />Ver Mapa</a>
                        </h3>
                    </div>
                </div>
            </div>

            <div class="columna45">
                <div class="raw1">
                    <div class="COL1">
                        <h4 class="FooterH4Conectate">Conéctate con StellarHost</h4>
                    </div>
                    <div class="COL2">
                        <h3 class="FooterH3Redes"><a href="https://www.facebook.com">Facebook</a></h3>
                        <h3 class="FooterH3Redes"><a href="https://www.twitter.com">Twitter</a></h3>
                    </div>
                </div>
                <div class="raw2">
                    <form class="FORMFOOTER" action="{{ route('sugerencias.store') }}" id="sugerenciasForm"
                        method="POST">
                        <div class="FORM1">
                            @csrf
                            @if (session('success'))
                                <h6 class="alert alert-success">{{ session('success') }}</h6>
                            @endif
                            <div>

                                <label for="Nombre">Nombre:</label>
                                <input type="text" value="{{ old('autor') }}" class="form-control"
                                    name="autor">
                            </div>

                            <div style="margin-top: 0.5rem;">
                                <label for="email">Correo:</label>
                                <input type="email" id="email" name="email" class="form-control">

                            </div>

                            <button class="SEND btn btn-light" type="submit">Enviar Sugerencia</button>
                        </div>
                        <div class="FORM2">
                            <label for="contenido">Sugerencia o mensaje:</label>
                            <textarea value="{{ old('contenido') }}" class="form-control" name="contenido"></textarea>

                            <div class="g-recaptcha" data-sitekey="6LdD0gwmAAAAAHkPUGE3cMd0N4Bpd70VFZbvkCug"></div>

                            @error('contenido')
                                <h6 style="color: red;">{{ $message }}</h6>
                            @enderror
                            @error('email')
                                <h6 style="color: red;">{{ $message }}</h6>
                            @enderror

                            @error('autor')
                                <h6 style="color: red;">{{ $message }}</h6>
                            @enderror
                        </div>
                    </form>
                </div>
            </div>
        </footer>
    </footer>
</body>

</html>
