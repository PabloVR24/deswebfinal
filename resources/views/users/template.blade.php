<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>StellarHost - Web Hosting</title>
    <link rel="stylesheet" href="{{ asset('css/template.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</head>

<body>
    <!-- Header -->
    <header class="header">
        <img src="logo.png" alt="StellarHost Logo">
        <h1>StellarHost</h1>
        <button> Ayuda en línea </button>
        <p>Contacto de Ventas: 8441071532</p>
    </header>

    <!-- Navbar horizontal -->
    <nav class="navH">
        <ul>
            <li><a href="#">Compañía</a></li>
            <li><a href="#">Servicios</a></li>
            <li><a href="#">Soluciones</a></li>
            <li><a href="#">Clientes</a></li>
            <li><a href="#">Contacto</a></li>
        </ul>
    </nav>

    <!-- Navbar vertical -->
    <nav class="navV">
        <ul>
            <li><a href="#">Web Hosting</a></li>
            <li><a href="#">Servidor Dedicado</a></li>
            <li><a href="#">Póliza de Garantías</a></li>
            <li><a href="#">Por Qué Nosotros</a></li>
            <li><a href="#">Centro de Ayuda</a></li>
            <li><a href="#">Dominios</a></li>
            <li><a href="#">Más Servicios</a></li>
            <li><a href="#">Tecnología</a></li>
            <li><a href="#">Resellers</a></li>
            <li><a href="#">FAQ</a></li>
        </ul>
    </nav>

    <!-- Contenedor -->
    <article class="main">
        @yield('contenido')
    </article>

    <!-- Slider -->
    @yield('slider')

    <!-- Footer -->
    <footer class="footer">
        <ul>
            <li><a href="#">Términos y Condiciones</a></li>
            <li><a href="#">Política de Privacidad</a></li>
            <li><a href="#">Aviso Legal</a></li>
        </ul>
        <p>© 2023 StellarHost. Todos los derechos reservados.</p>
    </footer>
</body>

</html>
