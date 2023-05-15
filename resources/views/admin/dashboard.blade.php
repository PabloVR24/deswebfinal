@extends('admin.navbar')
@extends('extends.datatables')
@section('contenido')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .select {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 3rem;
        }
    </style>
    <div class="select">
        <select class="form-control" name="activate_div" id="activate_div">
            <option hidden value="">Selecciona una opcion</option>
            <option value="ten_days">10 Dias</option>
            <option value="registros_clientes">Registros por Clientes</option>
            <option value="registros_servicios">Registros por Servicios</option>
            <option value="full_chart">Dashboard Completo</option>
        </select>
    </div>

    <div class="" id="ten_days" style="margin: 1rem; padding-left: 4rem; padding-right: 4rem">
        <h3 style="margin-bottom: 2rem;">Registros a vencer dentro de 10 dias</h3>
        <table id="dataTable" style="padding: 0%">
            <thead>
                <tr>
                    <th>ID REGISTRO</th>
                    <th>FECHA_CONTRATO</th>
                    <th>FECHA TERMINO</th>
                    <th>NOMBRE CLIENTE</th>
                    <th>SERVICIO</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registros as $registro)
                    <tr>
                        <td>{{ $registro->id }}</td>
                        <td>{{ $registro->fecha_contrato }}</td>
                        <td>{{ $registro->fecha_instalacion }}</td>
                        <td>{{ $registro->cliente->nombre_cliente . ' ' . $registro->cliente->apellido_pat . ' ' . $registro->cliente->apellido_mat }}
                        </td>
                        <td>{{ $registro->servicios->nombre_servicio }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="row justify-content-center align-items-center g-2;" style="text-align: center;">
            <div class="col">
                <div class="chart">
                    <canvas id="myChart" style="width: 20rem; height: 30rem;"></canvas>
                </div>
            </div>
            <div class="col">
                <table id="clientTable">
                    <thead>
                        <th>Nombre del Cliente</th>
                        <th>Conteo de Registros</th>
                    </thead>
                    <tbody>
                        @foreach ($conteo as $cteo)
                            <tr>
                                <td> {{ $cteo->cliente->nombre_cliente . ' ' . $cteo->cliente->apellido_pat . ' ' . $cteo->cliente->apellido_mat }}
                                    ({{ $cteo->id_cliente }})
                                </td>
                                <td> {{ $cteo->total_registros }}</td>
                            </tr>
                            <br>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <script>
            var conteo = {!! json_encode($conteo) !!};
            var labels = conteo.map(function(item) {
                return item.id_cliente;
            });
            var data = conteo.map(function(item) {
                return item.total_registros;
            });
            var customColors = [];
            for (var i = 0; i < conteo.length; i++) {
                // Generar un color aleatorio en formato hexadecimal
                var color = '#' + Math.floor(Math.random() * 16777215).toString(16);
                customColors.push(color);
            }
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Total de registros por cliente',
                        data: data,
                        backgroundColor: customColors,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            stepSize: 1
                        }
                    }
                }
            });
        </script>
    </div>

    <div class="" id="registros_clientes" style="margin: 1rem; padding-left: 4rem; padding-right: 4rem">
        <h3 style="margin-bottom: 2rem;">Conteo de Registros por Cliente</h3>
        <div class="row justify-content-center align-items-center g-2;" style="text-align: center;">
            <div class="col">
                <div class="chart" style="width: 20rem; height: 30rem;"">
                    <canvas id="chart_clients"></canvas>
                </div>
            </div>
            <div class="col">
                <table id="clientTableReg">
                    <thead>
                        <th>Nombre del Cliente</th>
                        <th>Conteo de Registros</th>
                    </thead>
                    <tbody>
                        @foreach ($conteouno as $cteo)
                            <tr>
                                <td>{{ $cteo->cliente->nombre_cliente . ' ' . $cteo->cliente->apellido_pat . ' ' . $cteo->cliente->apellido_mat }}
                                </td>
                                <td>{{ $cteo->total_registros_usuario }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        var conteo = {!! json_encode($conteouno) !!};
        var labels = conteo.map(function(item) {
            return item.id_cliente;
        });
        var data = conteo.map(function(item) {
            return item.total_registros_usuario;
        });

        var ctx = document.getElementById('chart_clients').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total de registros por cliente',
                    data: data,
                    backgroundColor: 'rgba(75, 196, 180, 1)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }
            }
        });
    </script>

    <div id="registros_servicios" style="margin: 1rem; padding-left: 4rem; padding-right: 4rem">
        <h3 style="margin-bottom: 2rem;">Conteo de Registros por Servicio</h3>
        <div class="row justify-content-center align-items-center g-2;" style="text-align: center;">
            <div class="col">
                <div class="chart" style="width: 20rem; height: 30rem;">
                    <canvas id="chart_services"></canvas>
                </div>
            </div>
            <div class="col">
                <table id="servicesTable">
                    <thead>
                        <th>Nombre del Servicio</th>
                        <th>Conteo de Registros</th>
                    </thead>
                    <tbody>
                        @foreach ($conteodos as $cteo)
                            <tr>
                                <td>{{ $cteo->servicios->nombre_servicio }}</td>
                                <td>{{ $cteo->total_registros_servicios }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        var conteo = {!! json_encode($conteodos) !!};
        var labels = conteo.map(function(item) {
            return item.id_servicio;
        });
        var data = conteo.map(function(item) {
            return item.total_registros_servicios;
        });

        var ctx = document.getElementById('chart_services').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total de registros por servicio',
                    data: data,
                    backgroundColor: 'rgba(150, 138, 180, 15)',
                    borderColor: 'rgba(51, 245, 244, 41)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }
            }
        });
    </script>

    <script>
        // Obtener el elemento select y los div correspondientes
        var select = document.getElementById("activate_div");
        var tenDaysDiv = document.getElementById("ten_days");
        var registros_clientes = document.getElementById("registros_clientes");
        var registros_servicios = document.getElementById("registros_servicios");

        // Escuchar el evento de cambio en el select
        select.addEventListener("change", function() {
            // Obtener el valor seleccionado
            var selectedValue = select.value;
            tenDaysDiv.style.display = "none";
            registros_clientes.style.display = "none";
            registros_servicios.style.display = "none";

            // Mostrar el div correspondiente al valor seleccionado
            if (selectedValue === "ten_days") {
                tenDaysDiv.style.display = "block";
            } else if (selectedValue === "registros_clientes") {
                registros_clientes.style.display = "block";
            } else if (selectedValue === "registros_servicios") {
                registros_servicios.style.display = "block";
            } else if (selectedValue === "full_chart") {
                registros_servicios.style.display = "block";
                tenDaysDiv.style.display = "block";
                registros_clientes.style.display = "block";
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                responsive: true
            });
            $('#clientTable').DataTable({
                responsive: true
            });
            $('#servicesTable').DataTable({
                responsive: true
            });
            $('#clientTableReg').DataTable({
                responsive: true
            });
        });
    </script>
@endsection
