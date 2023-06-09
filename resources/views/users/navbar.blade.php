<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <title>StellarHost</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>
<style>
    @import url('https://fonts.cdnfonts.com/css/gilroy-bold');

    body {
        margin: 0;
        padding: 0;
        font-family: 'Gilroy-Regular', sans-serif;
    }

    .container {
        padding-top: 5vh;
        text-align: center;
    }

    .h1 {
        font-family: 'Gilroy-Bold', sans-serif;
        font-size: 10vh;
    }

    .btn-details {
        color: white;
        width: 30vh;
        height: 8vh;
        border: none;
        background-color: #0D1B2A;
        font-size: 3vh;
        margin-bottom: 3vh;
        transition: background-color 0.5s ease;
    }

    .btn-details:hover {
        background-color: #244c76;
    }

    .section-color {
        text-align: center;
        color: white;
        background-color: #0D1B2A;
        background-image: url("https://media.kingston.com/kingston/content/ktc-custom-solutions-servers-data-centers-dc500-server.jpg");
        padding: 5vh;
        margin-bottom: 3vh;
        margin-top: 3vh;
    }

    .col {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 5vh;
    }

    a {
        font-family: 'Gilroy-Bold', sans-serif;
    }

    p {
        font-size: 3vh;
    }

    ::-webkit-scrollbar {
        width: 0.6rem;
        background: #244c76;
    }

    ::-webkit-scrollbar-thumb {
        background: #12304f;
        border-radius: .5rem;
    }

    ::-webkit-scrollbar-thumb:hover {
        background-color: #aaa;
    }

    nav {
        position: fixed;
        top: 0;
        background-color: #0D1B2A
    }

    .material-symbols-outlined {
        color: white;
        transition: color 0.2s ease;
    }

    .material-symbols-outlined:hover {
        color: #244c76;
    }

    .navbar-brand {
        color: white;
        transition: color 0.2s ease;
    }

    .navbar-brand:hover {
        color: #244c76;
    }

    .nav-link {
        color: white;
    }

    .nav-link:hover {
        color: #244c76;
    }

</style>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">

            <button style="color:white"class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                </ul>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <a class="navbar-brand" href="#">
                        <span class="material-symbols-outlined">
                            captive_portal
                        </span>
                        StellarHost</a>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/index.php">Compañia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/ticket_atention.php">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/ticket_atention.php">Soluciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/ticket_atention.php">Cliente</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/ticket_atention.php">Contacto</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    @yield('contenido')

</body>
<!-- Footer -->
<footer class="text-center text-lg-start bg-white text-muted">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">

        <div>
            <a href="" class="me-4 link-secondary">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="" class="me-4 link-secondary">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="" class="me-4 link-secondary">
                <i class="fab fa-google"></i>
            </a>
            <a href="" class="me-4 link-secondary">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="" class="me-4 link-secondary">
                <i class="fab fa-linkedin"></i>
            </a>
            <a href="" class="me-4 link-secondary">
                <i class="fab fa-github"></i>
            </a>
        </div>
        <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        <i class="fas fa-gem me-3 text-secondary"></i>StellarHost
                    </h6>
                    <p>
                        El mejor hosting desde $60 USD.
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Catalogo
                    </h6>
                    <p>
                        <a href="#!" class="text-reset">Compañia</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Servicios</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Soluciones</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Cliente</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        REDES SOCIALES
                    </h6>
                    <p>
                        <a href="#!" class="text-reset">Facebook</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Instagram</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Twitter</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">GitHub</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">Contacto</h6>
                    <p><i class="fas fa-home me-3 text-secondary"></i> 202 Bitters Road</p>
                    <p>
                        <i class="fas fa-envelope me-3 text-secondary"></i>
                        San Antonio, Texas: 23844
                    </p>
                    <p><i class="fas fa-phone me-3 text-secondary"></i> +52 8443052588</p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
        © 2023 Derechos Reservados:
        <a class="text-reset fw-bold" href="https://mdbootstrap.com/">StellarHost</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->


</html>
