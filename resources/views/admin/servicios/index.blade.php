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
            <form id="servicios_form" action="{{ route('servicios.store') }}" method="POST">
                @csrf
                @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }}</h6>
                @endif

                <div class="mb-3">
                    <label for="nombre_servicio" class="form-label">Nombre_Servicio</label>
                    <input type="text" value="{{ old('nombre_servicio') }}" class="form-control" name="nombre_servicio">
                </div>
                @error('nombre_servicio')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror

                <div class="mb-3">
                    <label for="frase_servicio" class="form-label">frase_servicio</label>
                    <input type="text" value="{{ old('frase_servicio') }}" class="form-control" name="frase_servicio">
                </div>
                @error('frase_servicio')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror

                <div class="mb-3">
                    <label for="precio_oferta" class="form-label">precio_oferta</label>
                    <input type="text" value="{{ old('precio_oferta') }}" class="form-control" name="precio_oferta">
                </div>
                @error('precio_oferta')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror

                <div class="mb-3">
                    <label for="precio_servicio" class="form-label">Precio Servicio</label>
                    <input type="text" value="{{ old('precio_servicio') }}" class="form-control" name="precio_servicio">
                </div>
                @error('precio_servicio')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror
                <div class="mb-3">
                    <input hidden type="text" value="{{ old('beneficios_servicio') }}" class="form-control"
                        name="beneficios_servicio">
                </div>
                @error('beneficios_servicio')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror
                <div class="mb-3">
                    <label for="categoria" class="form-label">Categoria</label>
                    <select name="categoria" class="form-control">
                        <option value="PAQUETE">PAQUETE</option>
                        <option value="HOSTING">HOSTING</option>
                        <option value="DOMINIO">DOMINIO</option>
                        <option value="DEDICADO">SERVIDOR DEDICADO</option>
                        <option value="CLOUD">CLOUD HOSTING</option>
                    </select>
                </div>
                <div id="nuevos_campos" class="mb-3">
                    <!-- Aquí se agregarán los nuevos campos -->
                </div>
                <div class="btn btn-success mt-4 mb-4" id="agregar_campo">Agregar beneficio</div>
                <br>
                <button onclick="" class="btn btn-primary">Enviar</button>
            </form>


            <script>
                document.getElementById("agregar_campo").addEventListener("click", function(event) {
                    // Crear un nuevo elemento de entrada
                    var nuevoCampo = document.createElement("input");
                    var nuevoLabel = document.createElement("label");
                    nuevoCampo.type = "text";
                    nuevoCampo.name = "beneficios_servicios[]";
                    nuevoCampo.classList.add('form-control');

                    nuevoLabel.classList.add('form-label');
                    nuevoLabel.textContent = "Beneficio"

                    var contenedor = document.getElementById("nuevos_campos");
                    contenedor.appendChild(nuevoLabel);
                    contenedor.appendChild(nuevoCampo);

                });

                $(document).ready(function() {
                    // Agrega evento "submit" al formulario
                    $('#servicios_form').submit(function(event) {
                        // Evita que el formulario se envíe automáticamente
                        event.preventDefault();

                        // Obtiene todos los valores de los inputs de beneficio
                        var beneficios = $('input[name="beneficios_servicios[]"]')
                            .map(function() {
                                return $(this).val();
                            })
                            .get();

                        // Concatena los valores separados por una coma y un espacio
                        var beneficiosConcatenados = beneficios.join('/ ');

                        // Asigna el valor concatenado al input de beneficio original
                        $('input[name="beneficios_servicio"]').first().val(beneficiosConcatenados);
                        // Envía el formulario de manera programática
                        this.submit();
                    });
                });
            </script>
            <div>
                @foreach ($servicios as $servicio)
                    <!-- Modal -->
                    <div class="modal fade" id="modal-{{ $servicio->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Al eliminar el cliente <strong>{{ $servicio->nombre_servicio }}</strong> se eliminaran
                                    todas las tareas asignadas a la misma
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form action="{{ route('servicios.destroy', ['servicio' => $servicio->id]) }}"
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
                        <th>ID_SERVICIO</th>
                        <th>CATEGORIA</th>
                        <th>NOMBRE_SERVICIO</th>
                        <th>FRASE_SERVICIO</th>
                        <th>PRECIO_SERVICIO</th>
                        <th>PRECIO_OFERTA</th>
                        <th>BENEFICIOS</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody id="tablaRegistros">
                    @foreach ($servicios as $servicio)
                        <tr>
                            <td><a href="{{ route('servicios.show', ['servicio' => $servicio->id]) }}"
                                    class="d-flex align-items-center gap-2">{{ $servicio->id }}</a></td>
                            <td>{{ $servicio->categoria }}</td>
                            <td>{{ $servicio->nombre_servicio }}</td>
                            <td>{{ $servicio->frase_servicio }}</td>
                            <td>{{ $servicio->precio_servicio }}</td>
                            <td>{{ $servicio->precio_oferta }}</td>
                            @php
                                $beneficios = explode('/', $servicio->beneficios_servicio);
                            @endphp
                            <td>
                                @foreach ($beneficios as $beneficio)
                                    <li style="list-style: none">{{ $beneficio }}</li>
                                @endforeach
                            </td>


                            <td><button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modal-{{ $servicio->id }}">Eliminar</button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
@endsection
