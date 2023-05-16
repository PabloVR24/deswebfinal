@extends('users.template')
<<<<<<< HEAD

@section('contenido')
    <div style="text-align: center;">
        <h1 style="text-align: center; margin: 5%; font-size: 300%">Aquí ira lo del correo</h1>

=======
@section('contenido')
    <div class="m-5" style="text-align: center; align-items: center;">
        <h3>Si deseas mejor atencion contactanos via:</h3>
        <br><br>
        <h4>Correo Electronico</h4>
        <style>
            #formEmail {
                width: 80%;
                margin: auto;
                background-color: #911506;
                color: white;
                padding: 1rem;
                border-radius: 2rem;
            }
        </style>
        <form action="https://formsubmit.co/23c10bea4f3527774a04f4a8ee24add3" method="POST" id="formEmail">
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="name" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>
            <div class="mb-3">
                <label for="subject" class="form-label">Asunto</label>
                <input type="text" class="form-control" name="subject" id="subject">
            </div>
            <div class="mb-3">
                <label for="sugerencia" class="form-label">Sugerencia</label>
                <textarea name="sugerencia" class="form-control" id="sugerencia" style="width: 100%;"></textarea>
            </div>

            <input type="hidden" name="_next" value="http://127.0.0.1:8000/contacto">
            <input type="hidden" name="_subject" value="Nueva Sugerencia en StellarHost">
            <input type="hidden" name="_autoresponse" value="Agradecemos tus comentarios.">
            <input type="hidden" name="_template" value="table">
            <input type="hidden" name="_captcha" value="false">

            <button type="submit" class="btn btn-primary">Enviar Correo</button>
        </form>
>>>>>>> 87b545d31a8f7d580abbc2f05c9fb1dbd4ec66b6
    </div>
@endsection
