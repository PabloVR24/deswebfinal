@extends('admin.navbar')

@section('contenido')
    <link href="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.13.4/r-2.4.1/datatables.min.css" rel="stylesheet" />
    <script src="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.13.4/r-2.4.1/datatables.min.js"></script>
    <div class="container w-25 border p-4 my-4">
        <div class="row mx-auto">
            <form id="servicios_form" action="{{ route('servicios.update', ['servicio' => $servicio->id]) }}" method="POST">

                @method('PATCH')
                @csrf
                @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }}</h6>
                @endif

                <div class="mb-3">
                    <label for="nombre_servicio" class="form-label">Nombre_Servicio</label>
                    <input type="text" class="form-control" name="nombre_servicio"
                        value="{{ $servicio->nombre_servicio }}">
                </div>
                <div class="mb-3">
                    <label for="frase_servicio" class="form-label">frase_servicio</label>
                    <input type="text" value="{{ $servicio->frase_servicio }}" class="form-control" name="frase_servicio">
                </div>

                <div class="mb-3">
                    <label for="precio_oferta" class="form-label">precio_oferta</label>
                    <input type="text"  value="{{ $servicio->precio_oferta }}" class="form-control" name="precio_oferta">
                </div>

                <div class="mb-3">
                    <label for="precio_servicio" class="form-label">Precio_Servicio:</label>
                    <input type="text" class="form-control" name="precio_servicio"
                        value="{{ $servicio->precio_servicio }}">
                </div>
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
                @php
                    $beneficios = explode('/', $servicio->beneficios_servicio);
                @endphp

                <label for="beneficios_servicios[]" class="form-label">Beneficios:</label>
                @foreach ($beneficios as $beneficio)
                    <div class="mb-3">
                        <input type="text" id="beneficios_servicio"class="form-control" name="beneficios_servicios[]"
                            value="{{ $beneficio }}">
                    </div>
                @endforeach
                <div id="nuevos_campos" class="mb-3">
                    <!-- Aquí se agregarán los nuevos campos -->
                </div>
                <div class="btn btn-danger mt-4 mb-4" id="eliminar_campo">Eliminar Beneficio</div>
                <div class="btn btn-success mt-4 mb-4" id="agregar_campo">Agregar beneficio</div>
                <br>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>

            <script>
                document.getElementById("agregar_campo").addEventListener("click", function(event) {
                    // Crear un nuevo elemento de entrada
                    var nuevoCampo = document.createElement("input");
                    var nuevoLabel = document.createElement("label");
                    var eliminarCampo = document.createElement("div");
                    var br = document.createElement("br");

                    nuevoCampo.type = "text";
                    nuevoCampo.name = "beneficios_servicios[]";
                    nuevoCampo.classList.add('form-control');

                    var contenedor = document.getElementById("nuevos_campos");

                    contenedor.appendChild(nuevoCampo);
                    contenedor.appendChild(br);
                });

                document.getElementById("eliminar_campo").addEventListener("click", function(event) {
                    var input = document.getElementById('beneficios_servicio');
                    input.parentNode.removeChild(input);
                })

                $(document).ready(function() {
                    $('#servicios_form').submit(function(event) {
                        event.preventDefault();
                        var beneficios = $('input[name="beneficios_servicios[]"]')
                            .map(function() {
                                return $(this).val();
                            })
                            .get();
                        var beneficiosConcatenados = beneficios.join('/ ');
                        $('input[name="beneficios_servicio"]').first().val(beneficiosConcatenados);
                        this.submit();
                    });
                });
            </script>
        </div>

        {{-- <div class="">
            @if ($category->todos->count() > 0)
                @foreach ($category->todos as $todo)
                    <div class="row py-1">
                        <a href="{{ route('todos-edit', ['id' => $todo->id]) }}">{{ $todo->title }}</a>
                    </div>
                    <div class="col-md-3 d-flex justify-content-end">
                        <form action="{{ route('todos-destroy', [$todo->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">
                                Eliminar
                            </button>
                        </form>
                    </div>
                @endforeach
            @else
                No hay tareas para esta categoria
            @endif
        </div> --}}

    </div>
@endsection
