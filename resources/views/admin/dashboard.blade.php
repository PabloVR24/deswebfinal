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
            <option value="full_chart">Dashboard Completo</option>
        </select>
    </div>

    <div class="" id="ten_days" style="margin-top: 1rem; padding: 4rem;">
        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable({
                    responsive: true
                });
                $('#clientTable').DataTable({
                    responsive: true
                });
            });
        </script>
        <h3 style="margin-bottom: 2rem;">Registros a vencer dentro de 10 dias</h3>
        <table id="dataTable">
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
        <table id="clientTable">
            <thead>
                <th>Nombre del Cliente</th>
                <th>Conteo de Registros</th>
            </thead>
            <tbody>
                @foreach ($conteo as $cteo)
                    <tr>
                        <td> {{ $cteo->cliente->nombre_cliente . ' ' . $cteo->cliente->apellido_pat . ' ' . $cteo->cliente->apellido_mat }}
                        </td>
                        <td> {{ $cteo->total_registros }}</td>
                    </tr>
                    <br>
                @endforeach

            </tbody>
        </table>
        <div class="chart" style="width: 20rem; height: 20rem;">
            <canvas id="myChart"></canvas>
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

    <script>
        // Obtener el elemento select y los div correspondientes
        var select = document.getElementById("activate_div");
        var tenDaysDiv = document.getElementById("ten_days");

        // Escuchar el evento de cambio en el select
        select.addEventListener("change", function() {
            // Obtener el valor seleccionado
            var selectedValue = select.value;

            tenDaysDiv.style.display = "none";

            // Mostrar el div correspondiente al valor seleccionado
            if (selectedValue === "one_day") {
                oneDayDiv.style.display = "block";
            } else if (selectedValue === "two_days") {
                twoDaysDiv.style.display = "block";
            } else if (selectedValue === "ten_days") {
                tenDaysDiv.style.display = "block";
            }
        });
    </script>
@endsection
