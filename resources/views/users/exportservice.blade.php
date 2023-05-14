<body style="border: 1px solid black; padding: 0.5rem">
    <div class="container" style="
text-align: center;
font-family: sans-serif;">
        <div class="top" style="padding-top: 0.5rem; 
    background: red;
    color: white;
    height: 5rem;">
            <h1>{{ $servicio->nombre_servicio }}</h1>
        </div>
        <div class="second-div" style="align-items: center; margin-top: 5rem;">
            <h3>{{ $servicio->frase_servicio }}</h3>
            <h2><strong>Categoria: </strong>{{ $servicio->categoria }}</h2>
            <table style="font-size: 15px; margin-top: 9rem; border: 2px solid black; width: 100%;">
                <thead>
                    <th style="color: white; background-color: black; ">Beneficios</th>
                </thead>
                @php
                    $beneficios = explode('/', $servicio->beneficios_servicio);
                @endphp
                <tbody>
                    @foreach ($beneficios as $beneficio)
                        <tr style="text-align: center; font-size: 1vh;">
                            <td>{{ $beneficio }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <del>
                <h4 style="margin-top: 6rem;">Precio Normal: ${{ $servicio->precio_oferta }}</h4>
            </del>
            <h1 style="">OFERTA: ${{ $servicio->precio_servicio }}</h1>
        </div>
    </div>
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
