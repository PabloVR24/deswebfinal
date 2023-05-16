@extends('users.template')
@extends('extends.datatables')
@section('contenido')
    <div class="m-5">
        <h3 style="text-align: center">
            ¡Mira todos los servicios que StellarHost tiene para ti!
        </h3>
        <table id="noticiasTable" style="width: 100%">
            <thead>
                <th>

                </th>
            </thead>
            <tbody>
                @foreach ($servicios as $servicio)
                    <tr>
                        <td>
                            <div class="card mb-2">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $servicio->nombre_servicio }}</h4>
                                    <strong>
                                        <h5>Oferta: ${{ $servicio->precio_servicio }}</h5>
                                        <h6><del>Precio Normal: ${{ $servicio->precio_oferta }}</del></h6>
                                    </strong>
                                    <div style=" text-align: right;">
                                        <p class="card-text">{{ $servicio->frase_servicio }}</p>
                                        <h6>Categoria: {{ $servicio->categoria }}</h6>
                                        <a href="{{ route('users.servicio', ['id' => $servicio->id]) }}"
                                            class="btn btn-success"><i class="fa-solid fa-circle-info" style="color: #ffffff;"></i> Mas Información</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
