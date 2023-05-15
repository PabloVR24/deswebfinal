@extends('admin.navbar')
@extends('extends.datatables')
@section('contenido')
    <div class="container">
        <table>
            <table id="sugerenciasTable" class="display">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>CORREO</th>
                        <th>CONTENIDO</th>
                    </tr>
                </thead>
                <tbody id="tablaRegistros">
                    @foreach ($sugerencias as $sugerencia)
                        <tr>
                            <td>{{ $sugerencia->id }}</td>
                            <td>{{ $sugerencia->autor }}</td>
                            <td>{{ $sugerencia->email }}</td>
                            <td>{{ $sugerencia->contenido }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>

    <style>
        table th {
            background-color: red;
            color: white;
        }

        table>tbody>tr>td {
            vertical-align: middle !important;
        }

        .btn-group .btn-group-vertical {
            position: absolute !important;
        }
    </style>
@endsection
