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
            <li><a href="#">Compañía</a></li>
            <li><a href="#">Servicios</a></li>
            <li><a href="#">Soluciones</a></li>
            <li><a href="#">Clientes</a></li>
            <li><a href="#">Contacto</a></li>
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
                    <a href="#"><span class="material-symbols-outlined"> language</span> Web
                        Hosting</a>
                </li>
                <li>
                    <a href="#"><span class="material-symbols-outlined"> dns </span> Servidor
                        Dedicado</a>
                </li>
                <li>
                    <a href="#"><span class="material-symbols-outlined"> verified </span> Póliza
                        de Garantías</a>
                </li>
                <li>
                    <a href="#"><span class="material-symbols-outlined"> help </span> Por Qué
                        Nosotros</a>
                </li>
                <li>
                    <a href="#"><span class="material-symbols-outlined"> phone_in_talk </span>
                        Centro de Ayuda</a>
                </li>
                <li>
                    <a href="#"><span class="material-symbols-outlined"> http </span> Dominios</a>
                </li>
                <li>
                    <a href="#"><span class="material-symbols-outlined"> library_add </span> Más
                        Servicios</a>
                </li>
                <li>
                    <a href="#"><span class="material-symbols-outlined"> settings_suggest </span>
                        Tecnología</a>
                </li>
                <li>
                    <a href="#"><span class="material-symbols-outlined">
                            currency_exchange
                        </span>
                        Resellers</a>
                </li>
                <li>
                    <a href="#"><span class="material-symbols-outlined"> psychology_alt </span>
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
                    Conectados:
                </p>

                <p class="CConectados">
                    <span class="material-symbols-outlined"> communication </span>
                    Visitas: {{ fgets($file) }}
                </p>
            </div>
        </nav>

        <article class="main">@yield('contenido')</article>

        <div class="derecha">
            <div class="fila1">
                <img class="sr2" src="{{ URL::asset('images/señor2.png') }}" alt="Señor 2" />
            </div>
            <div class="fila2">
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
                            <a href="https://www.google.com"><span class="material-symbols-outlined"> location_on
                                </span>
                                <br />
                                Ver Mapa</a>
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
                    <form class="FORMFOOTER">
                        <div class="FORM1">
                            <div>
                                <label for="Nombre">Nombre:</label>
                                <input type="text" id="Nombre" name="Nombre">
                            </div>
                            <div>
                                <label for="email">Correo:</label>
                                <input type="email" id="email" name="email">
                            </div>
                            <button class="SEND" type="submit">Enviar Sugerencia</button>
                        </div>
                        <div class="FORM2">
                            <label for="sugerencia">Sugerencia o mensaje:</label>
                            <textarea id="sugerencia" name="sugerencia"></textarea>
                        </div>
                    </form>
                </div>
            </div>
        </footer>
    </footer>
</body>

</html>
