@extends('users.template')

@section('contenido')
    <div style="text-align: center;">
        <h1 style="text-align: center; margin: 5%; font-size: 300%">Preguntas Frecuentes <br> StellarHost</h1>

        <head>
            <style>
                .accordion {
                    background-color: #f76666;
                    color: #000000;
                    cursor: pointer;
                    padding: 18px;
                    width: 90%;
                    text-align: center;
                    outline: none;
                    font-size: 18px;
                    transition: 0.4s;
                    font-weight: bold;
                }

                .active,
                .accordion:hover {
                    background-color: #4fc7e8;
                }

                .panel {
                    display: none;
                    font-weight: bold;
                    background-color: #b5b1b1;
                    padding: 3%;
                    text-align: center;
                    overflow: hidden;
                    width: 90%;
                    margin: auto;
                    border: #000000 1%;
                }

                p {
                    text-align: center;
                }
            </style>
        </head>

        <body>
            <button class="accordion">¿Cuáles son los planes de hosting que ofrecen?</button>
            <div class="panel">
                <p>Ofrecemos una variedad de planes de hosting, desde hosting compartido hasta servidores dedicados. Puedes
                    encontrar más información detallada sobre nuestros planes en nuestra página de precios.</p>
            </div>

            <button class="accordion">¿Cómo puedo transferir mi sitio web a StellarHost?</button>
            <div class="panel">
                <p>Transferir tu sitio web a StellarHost es fácil. Nuestro equipo de soporte técnico te guiará a través del
                    proceso de migración y te ayudará a transferir tus archivos y bases de datos sin problemas.</p>
            </div>

            <button class="accordion">¿Qué opciones de seguridad ofrecen para proteger mi sitio web?</button>
            <div class="panel">
                <p>En StellarHost, nos tomamos la seguridad en serio. Ofrecemos diversas opciones de seguridad, como
                    certificados SSL, firewall de aplicaciones web (WAF) y copias de seguridad automáticas, para proteger tu
                    sitio web contra amenazas en línea.</p>
            </div>
            <button class="accordion">¿Cuál es el tiempo de actividad garantizado?</button>
            <div class="panel">
                <p>En StellarHost, garantizamos un tiempo de actividad del 99.9%. Nuestra infraestructura robusta y nuestros
                    servidores de alta calidad nos permiten ofrecer un servicio confiable y mantener tu sitio web en línea
                    en todo momento.</p>
            </div>

            <button class="accordion">¿Puedo instalar aplicaciones populares como WordPress?</button>
            <div class="panel">
                <p>Sí, en StellarHost ofrecemos instaladores automáticos y compatibilidad con una amplia gama de
                    aplicaciones populares, incluyendo WordPress, Joomla, Drupal y muchas otras. Puedes instalar estas
                    aplicaciones con solo unos pocos clics desde tu panel de control.</p>
            </div>

            <button class="accordion">¿Cuál es su política de respaldo de datos?</button>
            <div class="panel">
                <p>En StellarHost, realizamos copias de seguridad automáticas de tus datos de forma regular. Esto garantiza
                    que en caso de cualquier problema o pérdida de datos, podamos restaurar tu sitio web a un estado
                    anterior. Además, te recomendamos realizar copias de seguridad adicionales por tu cuenta para mayor
                    seguridad.</p>
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
