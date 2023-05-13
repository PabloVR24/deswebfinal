@extends('users.template')
@extends('extends.datatables')
@extends('extends.bootstrap')
<style>
    .cont-tabla {
        display: flex;
        flex-direction: column;
        justify-content: center;
        margin: 5rem;
        align-items: center;
        text-align: center;
        justify-content: center;
    }
</style>

@section('contenido')
    <div style="margin-left: 5rem; margin-right: 5rem; margin-top: 3rem;">
        <h2>Busqueda de Clientes</h2>
        <form action="">
            <label for="texto" class="form-label">Telefono Celular: </label>
            <input name="texto" id="Celular" class="form-control"type="text"
                placeholder="Ingresa tu numero de Celular">
            <br>
            <div style="text-align: center;">
                <input type="submit" class="btn btn-success" style="width: 50%; font-size: 1.3rem;"value="Buscar">
            </div>
        </form>
    </div>

    @if ($clientes->isEmpty())
        <style>
            .cont-form { 
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                margin: 1.5rem;
            }
        </style>
        <div class="cont-form">
            <h2>En caso de que no existas en la base de datos</h2>
            <h3>Registrate Aqui</h3>
            <form action="{{ route('clientRegister') }}" style="width: 70%" method="POST">
                @csrf
                @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }}</h6>
                @endif

                <label for="nombre_cliente">Nombre:</label>
                <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente">
                @error('nombre_cliente')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror
                <label for="nombre_cliente">Apellido Paterno:</label>
                <input type="text" class="form-control" id="apellido_pat" name="apellido_pat">
                @error('apellido_pat')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror
                <label for="nombre_cliente">Apellido Materno:</label>
                <input type="text" class="form-control" id="apellido_mat" name="apellido_mat">
                @error('apellido_mat')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror
                <label for="nombre_cliente">Telefono Celular:</label>
                <input type="text" class="form-control" id="telefono" name="telefono">
                @error('telefono')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror
                <label for="nombre_cliente">Correo Electronico:</label>
                <input type="text" class="form-control" id="email" name="email">
                @error('email')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror
                <br>
                <div style="text-align: center;"><input type="submit" value="Registrarse"
                        style="width: 15rem;"class="btn btn-warning">
                </div>


            </form>
        </div>
    @else
        <div class="cont-tabla">
            <table id="alumnosTable" style="text-align: center;">
                <thead>
                    <tr>
                        <th>Nombre: </th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Telefono</th>
                        <th>Email</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->nombre_cliente }}</td>
                            <td>{{ $cliente->apellido_pat }}</td>
                            <td>{{ $cliente->apellido_mat }}</td>
                            <td>{{ $cliente->telefono }}</td>
                            <td>{{ $cliente->email }}</td>
                            <td>
                                <form action="{{ route('findClient') }}">
                                    <input type="text" hidden name="id" value="{{ $cliente->id }}">
                                    <input type="submit" value="Seleccionar" class="btn btn-warning">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
