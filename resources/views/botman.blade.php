@extends('users.navbar')

@section('contenido')
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css">

    <?php
    $botman->hears('Hola', function ($bot) {
        $bot->startConversation(new OnboardingConversation());
    });
    ?>

    <script>
        var botmanWidget = {
            aboutText: 'StellarHost',
            mainColor: '#0d1b2a',
            introMessage: '¡Hola, me llamo Stely! Soy uno de los asistentes virtuales para la atencion al cliente <br> Para iniciar una conversacion escribe: "Hola"',
            title: 'StellarHost Customer Service',
            placeholderText: 'Escribe algo...',
            bubbleAvatarUrl: 'https://thumbs.dreamstime.com/b/icono-del-robot-dise%C3%B1o-de-la-muestra-bot-concepto-s%C3%ADmbolo-chatbot-servicio-asistencia-voz-en-l%C3%ADnea-ayuda-ilustraci%C3%B3n-vector-130663632.jpg'
        };
    </script>
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
@endsection
