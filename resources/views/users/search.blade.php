@extends('users.template')
@extends('extends.datatables')
@section('contenido')
    <div class="m-4 p-3">
        <h1>Busqueda de Ticket</h1>
        <form id="searchForm" action="{{ route('findRegister') }}" method="GET" class="mb-5" style="text-align: right;">
            <input type="text" name="texto" id="texto" class="form-control" value="{{ $texto }}"
                placeholder="Ingresa tu numero de Ticket">
            <br>
            <button type="submit" class="btn btn-success">
                <i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i>
                Buscar
            </button>
        </form>

        <table id="alumnosTable" class="mt-5">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>FECHA CONTRATO</th>
                    <th>FECHA VENCIMIENTO</th>
                    <th>ID CLIENTE</th>
                    <th>ID SERVICIO</th>
                    <th>PDF</th>
                </tr>
            </thead>
            <tbody>
                @if ($registros->isEmpty())
                    <tr>
                        <td>NO HAY RESULTADOS</td>
                        <td>NO HAY RESULTADOS</td>
                        <td>NO HAY RESULTADOS</td>
                        <td>NO HAY RESULTADOS</td>
                        <td>NO HAY RESULTADOS</td>
                        <td>NO HAY RESULTADOS</td>
                    </tr>
                @else
                    @foreach ($registros as $registro)
                        <tr>
                            <td>{{ $registro->id }}</td>
                            <td>{{ $registro->fecha_contrato }}</td>
                            <td>{{ $registro->fecha_instalacion }}</td>
                            <td>{{ $registro->cliente->nombre_cliente . ' ' . $registro->cliente->apellido_pat . ' ' . $registro->cliente->apellido_mat }}
                            </td>
                            <td>{{ $registro->servicios->nombre_servicio }}</td>
                            <td>
                                <form action="{{ route('export', ['id' => $registro->id]) }}">
                                    <input type="text" name="id" hidden value="{{ $registro->id }}">
                                    <input type="submit" class="btn btn-primary"value="Generar PDF">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>


@endsection
