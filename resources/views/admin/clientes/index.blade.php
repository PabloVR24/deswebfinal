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
            <form action="{{ route('clientes.store') }}" method="POST">
                @csrf
                @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }}</h6>
                @endif

                <div class="mb-3">
                    <label for="nombre_cliente" class="form-label">Nombre del Cliente</label>
                    <input type="text" value="{{ old('nombre_cliente') }}" class="form-control" name="nombre_cliente">
                </div>
                @error('nombre_cliente')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror

                <div class="mb-3">
                    <label for="apellido_pat" class="form-label">Apellido_Paterno</label>
                    <input type="text" value="{{ old('apellido_pat') }}" class="form-control" name="apellido_pat">
                </div>
                @error('apellido_pat')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror

                <div class="mb-3">
                    <label for="apellido_mat" class="form-label">Apellido_Materno</label>
                    <input type="text" value="{{ old('apellido_mat') }}" class="form-control" name="apellido_mat">
                </div>
                @error('apellido_mat')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror

                <div class="mb-3">
                    <label for="telefono" class="form-label">Telefono</label>
                    <input type="text" value="{{ old('telefono') }}" class="form-control" name="telefono">
                </div>
                @error('telefono')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" value="{{ old('email') }}" class="form-control" name="email">
                </div>
                @error('email')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>

            <div>
                @foreach ($clientes as $cliente)
                    <!-- Modal -->
                    <div class="modal fade" id="modal-{{ $cliente->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Al eliminar el cliente <strong>{{ $cliente->nombre_cliente }}</strong> se eliminaran
                                    todas las
                                    tareas asignadas a la misma
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form action="{{ route('clientes.destroy', ['cliente' => $cliente->id]) }}"
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
                        <th>ID_CLIENTE</th>
                        <th>NOMBRE_CLIENTE</th>
                        <th>APELLIDO_PAT</th>
                        <th>APELLIDO_MAT</th>
                        <th>TELEFONO</th>
                        <th>EMAIL</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody id="tablaRegistros">
                    @foreach ($clientes as $cliente)
                        <tr>
                            <td><a href="{{ route('clientes.show', ['cliente' => $cliente->id]) }}"
                                    class="d-flex align-items-center gap-2">{{ $cliente->id }}</a></td>
                            <td>{{ $cliente->nombre_cliente }}</td>
                            <td>{{ $cliente->apellido_pat }}</td>
                            <td>{{ $cliente->apellido_mat }}</td>
                            <td>{{ $cliente->telefono }}</td>
                            <td>{{ $cliente->email }}</td>
                            <td><button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modal-{{ $cliente->id }}">Eliminar</button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
@endsection
