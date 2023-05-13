@extends('admin.navbar')

@section('contenido')
    <link href="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.13.4/r-2.4.1/datatables.min.css" rel="stylesheet" />
    <script src="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.13.4/r-2.4.1/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#alumnosTable').DataTable({
                responsive: true
            });
        });
    </script>

    <div class="container">
        <table>
            <table id="alumnosTable" class="display">
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
@endsection
