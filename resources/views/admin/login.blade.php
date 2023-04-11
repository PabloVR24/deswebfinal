@extends('admin.navbar')

@section('contenido')
    <h2>LogIn</h2>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <form action="" method="POST">
        @csrf
        <input type="text" name="email" autofocus value="{{old('email')}}" placeholder="username"><br>
        <input type="text" name="password" placeholder="password"><br>
        <button type="submit">LogIn</button>
    </form>
@endsection
