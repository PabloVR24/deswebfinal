<link href="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.13.4/r-2.4.1/datatables.min.css" rel="stylesheet" />
<script src="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.13.4/r-2.4.1/datatables.min.js"></script>

<h1>Busqueda de ticket</h1>

<form id="searchForm" action="{{ route('findRegister') }}" method="GET">
    <input type="text" name="texto" id="texto" class="form-control" value="{{ $texto }}">
    <input type="submit" value="Buscar">
</form>

<table id="alumnosTable">
    <thead>
        <tr>
            <th>id</th>
            <th>fecha_contrato</th>
            <th>fecha_instalacion</th>
            <th>id_cliente</th>
            <th>id_servicio</th>
            <th>generar_pdf</th>
        </tr>
    </thead>
    <tbody>
        @if ($registros->isEmpty())
            <tr>
                <td>NO HAY RESULTADOS</td>
            </tr>
        @else
            @foreach ($registros as $registro)
                <tr>
                    <td>{{ $registro->id }}</td>
                    <td>{{ $registro->fecha_contrato }}</td>
                    <td>{{ $registro->fecha_instalacion }}</td>
                    <td>{{ $registro->id_cliente }}</td>
                    <td>{{ $registro->id_servicio }}</td>
                    <td>
                        <form action="{{ route('export', ['id' => $registro->id]) }}">
                            <input type="text" name="id" hidden value="{{ $registro->id }}">
                            <input type="submit" value="Generar PDF">
                        </form>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
