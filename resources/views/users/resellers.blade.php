@extends('users.template')
@section('contenido')
    <div style="text-align: center;">

        <head>
            <style>
                .accordion {
                    background-color: #f76666;
                    color: #000000;
                    /* Cambié el color del texto a blanco para mayor contraste */
                    cursor: pointer;
                    padding: 18px;
                    width: 90%;
                    text-align: center;
                    outline: none;
                    font-size: 18px;
                    transition: 0.4s;
                    font-weight: bold;
                    border-radius: 5px;
                    /* Agregué bordes redondeados */
                }

                .active,
                .accordion:hover {
                    background-color: #4fc7e8;
                }

                .panel {
                    display: none;
                    font-weight: bold;
                    background-color: #c1bdbd;
                    /* Cambié el color de fondo a blanco */
                    padding: 3%;
                    text-align: center;
                    overflow: hidden;
                    width: 90%;
                    margin: auto;
                    border: 1px solid #000000;
                    /* Agregué un borde sólido */
                    border-radius: 5px;
                    /* Agregué bordes redondeados */
                }

                p {
                    text-align: center;
                }
            </style>
        </head>

        <body>
            <h1 style="text-align: center; margin: 3%; font-size: 300%">Resellers</h1>
            <p style="text-align: center; margin: 3%; font-size: 135% ">
                Nuestro programa de revendedores está diseñado para aquellos que
                desean ofrecer servicios de hosting a sus propios clientes.
                Te brindamos la oportunidad de comenzar tu propio negocio de
                hosting sin la necesidad de preocuparte por la infraestructura técnica.
                Al unirte a nuestro programa, disfrutarás de los siguientes beneficios:</p>

            <button class="accordion">Marca Blanca</button>
            <div class="panel">
                <p>Personaliza y promociona los servicios de hosting bajo tu propia marca.
                    Esto te permite construir tu propia identidad empresarial y
                    fortalecer la lealtad de tus clientes.</p>
            </div>

            <button class="accordion">Paquetes Flexibles</button>
            <div class="panel">
                <p>Elige entre una variedad de paquetes de hosting para satisfacer
                    las necesidades de tus clientes. Ofrecemos opciones de hosting
                    compartido, VPS y dedicado, así como servicios de registro de dominio.</p>
            </div>

            <button class="accordion">Infraestructura Confiable</button>
            <div class="panel">
                <p>No te preocupes por la gestión de servidores y la infraestructura técnica.
                    Nuestro equipo se encarga de mantener la infraestructura y garantizar
                    la seguridad y el rendimiento de los servicios de hosting.</p>
            </div>

            <button class="accordion">Soporte Técnico Especializado</button>
            <div class="panel">
                <p>Obtén acceso a nuestro equipo de soporte técnico experto,
                    disponible las 24 horas del día, los 7 días de la semana.
                    Estaremos aquí para ayudarte con cualquier consulta técnica
                    o problema que puedas encontrar.</p>
            </div>

            <button class="accordion">Herramientas de Gestión</button>
            <div class="panel">
                <p>Te proporcionamos herramientas intuitivas de gestión de clientes
                    y facturación, lo que facilita la administración de tus clientes
                    y el seguimiento de tus ganancias.</p>
            </div>

            <script>
                var acc = document.getElementsByClassName("accordion");
                var panel;

                for (var i = 0; i < acc.length; i++) {
                    acc[i].addEventListener("click", function() {
                        this.classList.toggle("active");
                        panel = this.nextElementSibling;

                        for (var j = 0; j < acc.length; j++) {
                            var currentPanel = acc[j].nextElementSibling;

                            if (currentPanel.style.display === "block" && currentPanel !== panel) {
                                currentPanel.style.display = "none";
                                acc[j].classList.remove("active");
                            }
                        }

                        if (panel.style.display === "block") {
                            panel.style.display = "none";
                        } else {
                            panel.style.display = "block";
                        }
                    });
                }
            </script>

        </body>
    @endsection
