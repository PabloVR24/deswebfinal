<body style="border: 1px solid black; padding: 0.5rem">
    <div class="container" style="
text-align: center;
font-family: sans-serif;">
        <div class="top" style="padding-top: 0.5rem; 
    background: green;
    color: white;
    height: 5rem;">
            <h1>¡Gracias por tu compra!</h1>
        </div>
        <h4 style="text-align: right;">Fecha de Compra: {{ $registro->fecha_contrato }}</h4>
        <table style="width: 100%;" border="1">
            <caption><strong>Datos de Cliente</strong></caption>
            <tbody>
                <tr>
                    <td><strong>Nombre del Cliente:</strong>
                        {{ $registro->cliente->nombre_cliente . ' ' . $registro->cliente->apellido_pat . ' ' . $registro->cliente->apellido_mat }}
                    </td>
                </tr>
                <tr>
                    <td><strong>Telefono Cliente:</strong>
                        {{ $registro->cliente->telefono }}
                    </td>
                </tr>
                <tr>
                    <td><strong>Correo Cliente:</strong>
                        {{ $registro->cliente->email }}
                    </td>
                </tr>
            </tbody>
        </table>
        <br><br><br>
        <table style="width: 100%;" border="1">
            <caption><strong>Datos de Compra</strong></caption>
            <thead>
                <th style="width: 10%">ID SERVICIO</th>
                <th style="width: 70%">NOMBRE SERVICIO</th>
                <th style="width: 20%">PRECIO</th>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: center;">{{ $registro->id_servicio }}</td>

                    <td>{{ $registro->servicios->nombre_servicio }}</td>

                    <td style="text-align: right;">${{ $registro->servicios->precio_servicio }}</td>

            </tbody>
        </table>
        <br><br><br>
        <h4 style="text-align: right;">Fecha de Vencimiento: {{ $registro->fecha_instalacion }}</h4> <br><br><br>
        <table style="width: 100%;" border="1">
            <tbody>
                <tr>
                    <td style="width: 80%; text-align: right; background-color: black; color:white;">
                        TOTAL A PAGAR: </td>
                    <td style="width: 20%; text-align: center; background-color: black; color:white;">
                        ${{ $registro->servicios->precio_servicio }}</td>
                </tr>
            </tbody>
        </table>
        <br><br><br>
        <h5 style="text-align: right;">ID: REGISTRO: {{ $registro->id }}</h5>
        <div class="footer" style="font-family: sans-serif;">
            <footer class="pie-pagina"
                style="position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        text-align: center;">
                <h2 style="margin: 0;">StellarHost</h2>
                <h4 style="margin: 0;">202 Bitters Road
                    San Antonio, TX
                    23844</h4>
                <h3 style="margin: 0;">8441071532</h3>
                <h5 style="margin: 0;">StellarHost © 2023 - Derechos Reservados - Pablo Valera y Raul Alvarado</h5>
            </footer>
        </div>
</body>
