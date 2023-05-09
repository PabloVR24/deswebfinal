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


    <div class="container w-25 border p-4 my-4">
        <div class="row mx-auto">
            <form action="{{ route('registros.store') }}" method="POST">
                @csrf
                @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }}</h6>
                @endif

                <div class="mb-3">
                    <label for="fecha_contrato" class="form-label">Fecha_Contrato</label>
                    <input type="date" value="{{ old('fecha_contrato') }}" class="form-control" name="fecha_contrato">
                </div>
                @error('fecha_contrato')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror

                <div class="mb-3">
                    <label for="fecha_instalacion" class="form-label">Fecha_Instalacion</label>
                    <input type="date" value="{{ old('fecha_instalacion') }}" class="form-control"
                        name="fecha_instalacion">
                </div>
                @error('fecha_instalacion')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror

                <label for="id_cliente" class="form-label">ID_CLIENTE</label>
                <select name="id_cliente" class="form-select">
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id }}">
                            {{ $cliente->nombre_cliente . ' ' . $cliente->apellido_pat . ' ' . $cliente->apellido_mat }}
                        </option>
                    @endforeach
                </select>
                @error('id_cliente')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror

                <label for="id_servicio" class="form-label">ID_SERVICIO</label>
                <select name="id_servicio" class="form-select">
                    @foreach ($servicios as $servicio)
                        <option value="{{ $servicio->id }}">{{ $servicio->nombre_servicio }}</option>
                    @endforeach
                </select>
                @error('id_servicio')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror

                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>

            <div>
                @foreach ($registros as $registro)
                    <!-- Modal -->
                    <div class="modal fade" id="modal-{{ $registro->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Al eliminar el cliente <strong>{{ $registro->id }}</strong> se eliminaran
                                    todas las tareas asignadas a la misma
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form action="{{ route('registros.destroy', ['registro' => $registro->id]) }}"
                                        method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

    <div class="container">
        <table>
            <table id="alumnosTable" class="display">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>FECHA_CONTRATO</th>
                        <th>FECHA_INSTALACION</th>
                        <th>ID_CLIENTE</th>
                        <th>ID_SERVICIO</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody id="tablaRegistros">
                    @foreach ($registros as $registro)
                        <tr>
                            <td><a href="{{ route('registros.show', ['registro' => $registro->id]) }}"
                                    class="d-flex align-items-center gap-2">{{ $registro->id }}</a></td>
                            <td>{{ $registro->fecha_contrato }}</td>
                            <td>{{ $registro->fecha_instalacion }}</td>
                            <td>{{ $registro->cliente->nombre_cliente . ' ' . $registro->cliente->apellido_pat . ' ' . $registro->cliente->apellido_mat }}
                            </td>
                            <td>{{ $registro->servicios->nombre_servicio }}</td>

                            <td><button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modal-{{ $registro->id }}">Eliminar</button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
@endsection
