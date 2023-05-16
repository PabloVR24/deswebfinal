@extends('admin.navbar')

@section('contenido')

    <body class="BodyLogin" style="background-color: #f76666">
        <h2>LogIn <br> Administradores</h2>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <form action="" method="POST">
            @csrf
            <input type="text" name="email" autofocus value="{{ old('email') }}" placeholder="Usuario"><br>
            <input type="password" name="password" placeholder="Contraseña"><br>
            <button class="Entrar" type="submit">Entrar</button>
        </form>
    </body>
@endsection
