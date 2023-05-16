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
            <h1 style="text-align: center; margin: 5%; font-size: 300%">Soluciones</h1>
            <p style="text-align: center; margin: 3%; font-size: 135% ">
                En nuestro servicio de hosting, ofrecemos una amplia gama de
                soluciones para satisfacer las necesidades de tu sitio web.
                Ya sea que estés buscando un hosting compartido para un sitio
                web personal o requieras una infraestructura dedicada para una
                empresa en crecimiento, tenemos la solución perfecta para ti.
                Nuestros servicios incluyen:</p>

            <button class="accordion">Hosting Compartido</button>
            <div class="panel">
                <p>Ideal para sitios web de bajo tráfico y recursos limitados.
                    Comparte recursos con otros usuarios en un entorno seguro y eficiente.</p>
            </div>

            <button class="accordion">Hosting VPS (Servidor Privado Virtual)</button>
            <div class="panel">
                <p>Obtén mayor flexibilidad y control con tu propio servidor virtual privado.
                    Ideal para sitios web medianos con tráfico moderado.
                </p>
            </div>

            <button class="accordion">Hosting Dedicado</button>
            <div class="panel">
                <p>Obtén un servidor físico dedicado exclusivamente a tu sitio web.
                    Perfecto para sitios web con alto tráfico y aplicaciones personalizadas que
                    requieren un rendimiento excepcional.
                </p>
            </div>
            <button class="accordion">Hosting en la Nube</button>
            <div class="panel">
                <p>Aprovecha la escalabilidad y la confiabilidad de la tecnología de computación en la nube.
                    Adecuado para proyectos en crecimiento que necesitan recursos flexibles y mayor disponibilidad.</p>
            </div>

            <button class="accordion">Hosting para WordPress</button>
            <div class="panel">
                <p>Optimizado específicamente para sitios web construidos con WordPress.
                    Disfruta de un rendimiento superior y una gestión simplificada de tu sitio web.
                </p>
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
