@extends('users.template')

@section('contenido')
    <div style="text-align: center;">
        <h1 style="text-align: center; margin: 5%; font-size: 300%">Nuestros clientes:</h1>
        <div class="clientes-slider">
            <a style="color: white" href="https://www.facebook.com/" target="_blank">
                <img width="100px" src="https://upload.wikimedia.org/wikipedia/commons/e/ee/Logo_de_Facebook.png" style="margin: 5%; border-radius: 10px;"
                    alt="Cliente 1">
            </a>
            <a style="color: white" href="https://www.mcdonalds.com.mx" target="_blank">
                <img width="100px" src="https://www.mcdonalds.com.mx/images/layout/mcdonalds-logo-bg-red.png"
                    style="margin: 5%" alt="Cliente 2">
            </a>
            <a style="color: white" href="https://www.adidas.com" target="_blank">
                <img width="100px" style="border-radius: 10px;margin: 5%"
                    src="https://cdn.worldvectorlogo.com/logos/adidas-originals-logo-1.svg" alt="Cliente 3">
            </a>
            <a style="color: white" href="https://www.tacoscheco.com" target="_blank">
                <img width="100px" style="border-radius: 10px;margin: 5%"
                    src="https://www.tacoscheco.com/wp-content/uploads/2017/05/logo-redondo-fondo-blanco-tacos-checo-01.png"
                    alt="Cliente 4">
            </a>
            <a style="color: white" href="https://www.steren.com.mx" target="_blank">
                <img width="100px" src="data:image/png;base64,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"
                    style="border-radius: 10px;margin: 5%" alt="Cliente 5">
            </a>
            <a style="color: white" href="https://kanye2020.country/" target="_blank">
                <img width="100px"
                    src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcQT1yCEHKdwoVklA3i_HTgOOBhhPPwp-OzFCdw0s801TXOyV47N"
                    style="border-radius: 10px;margin: 5%" alt="Cliente 6">
            </a>
            <a style="color: white" href="https://www.oxxo.com/" target="_blank">
                <img width="100px" style="border-radius: 10px;margin: 5%"
                    src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcTVAjX-4Fa3SABVIxp-8JZczUVKKjhD-RdPU3KXeIdu8RKSia1Q"
                    alt="Cliente 7">
            </a>
            <a style="color: white" href="https://www.grupobimbo.com/" target="_blank">
                <img width="100px" style="border-radius: 10px;margin: 5%"
                    src="https://www.cibepyme.com/export/sites/cibepyme/minisites/mexico/.content/imagenes/bimbo.png_1479417682.png"
                    alt="Cliente 8">
            <a style="color: white" href="https://www.cemexmexico.com/" target="_blank">
                <img width="100px" src="https://play-lh.googleusercontent.com/czHnNi6274QXJc0eJfTaoWRvcQH0P_atPf0PRVlh3atk-Af5d43vSsx0I0rIRPmYPA"
                    style="border-radius: 10px;margin: 5%" alt="Cliente 9">
            </a>
            <a style="color: white" href="https://www.bbva.mx/" target="_blank">
                <img width="100px"
                    src="data:image/jpeg;base64,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"
                    style="border-radius: 10px;margin: 5%" alt="Cliente 10">
            </a>
            <a style="color: white" href="https://www.coppel.com/" target="_blank">
                <img width="100px" style="border-radius: 10px;margin: 5%"
                    src="https://www.laislamerida.mx:8443/images/librariesprovider7/directorio/coppelc277e6234d174127b1487b46291e689b.png?sfvrsn=af4f2ade_1"
                    alt="Cliente 11">
            </a>
            <a style="color: white" href="https://www.walmart.com.mx/" target="_blank">
                <img width="100px" style="border-radius: 10px;margin: 5%"
                    src="https://play-lh.googleusercontent.com/0eYLaZmSAmjgoRW_PComIXddapyJG4XVA4xnT4r_ZTR07ZETqp8Z4dc9BdkJ4kYqmKw=w240-h480-rw"
                    alt="Cliente 12">
            </a>
        </div>
    </div>
@endsection
