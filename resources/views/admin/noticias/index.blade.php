@extends('admin.navbar')

@section('contenido')
    <?php
    use GuzzleHttp\Client;
    use Carbon\Carbon;
    $fecha = Carbon::now();
    
    $url = 'https://newsapi.org/v2/everything?q=tech&from=2023-05-13&to=2023-05-13&sortBy=popularity&apiKey=15981b3988bc425693188994981f8b2f';
    $client = new Client();
    $response = $client->get($url);
    $datos = json_decode($response->getBody());
    ?>
    @extends('extends.datatables')

    <div class="container w-25 border p-4 my-4">
        <div class="row mx-auto">
            <form action="{{ route('noticias.store') }}" method="POST">
                @csrf
                @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }}</h6>
                @endif

                <div class="mb-3">
                    <label for="author" class="form-label">Autor</label>
                    <input type="text" value="{{ old('author') }}" class="form-control" name="author">
                </div>
                @error('author')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror

                <div class="mb-3">
                    <label for="title" class="form-label">Titulo</label>
                    <input type="text" value="{{ old('title') }}" class="form-control" name="title">
                </div>
                @error('title')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror

                <div class="mb-3">
                    <label for="url" class="form-label">URL</label>
                    <input type="text" value="{{ old('url') }}" class="form-control" name="url">
                </div>
                @error('url')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror

                <div class="mb-3">
                    <label for="urlToImage" class="form-label">URL: Imagen</label>
                    <input type="text" value="{{ old('urlToImage') }}" class="form-control" name="urlToImage">
                </div>
                @error('urlToImage')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror

                <div class="mb-3">
                    <label for="publishedAt" class="form-label">Publicado El:</label>
                    <input type="text" value="{{ old('publishedAt') }}" class="form-control" name="publishedAt">
                </div>
                @error('publishedAt')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror

                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>

            <div>
                @foreach ($noticias as $noticia)
                    <!-- Modal -->
                    <div class="modal fade" id="modal-{{ $noticia->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Al eliminar el cliente <strong>{{ $noticia->id }}</strong> se eliminaran
                                    todas las tareas asignadas a la misma
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form action="{{ route('noticias.destroy', ['noticia' => $noticia->id]) }}"
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
        <h3><strong>Noticias en BD</strong></h3>
        <table id="newsTable" class="display">
            <thead>
                <tr>
                    <th style="width: 5%;">id</th>
                    <th style="width: 15%;">Titulo</th>
                    <th style="width: 10%;">Author</th>
                    <th style="width: 20%;">URL</th>
                    <th style="width: 20%;">IMAGEN:URL</th>
                    <th style="width: 15%;">Publicado</th>
                    <th style="width: 15%;">Eliminar</th>
                </tr>
            </thead>
            <tbody id="tablaRegistros">
                @foreach ($noticias as $noticia)
                    <tr>
                        <td><a href="{{ route('noticias.show', ['noticia' => $noticia->id]) }}"
                                class="d-flex align-items-center gap-2">{{ $noticia->id }}</a></td>
                        <td>{{ $noticia->author }}</td>
                        <td>{{ $noticia->title }}</td>
                        <td>{{ $noticia->url }}</td>
                        <td>{{ $noticia->urlToImage }}</td>
                        <td>{{ $noticia->publishedAt }}</td>
                        <td><button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modal-{{ $noticia->id }}">Eliminar</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="container">
        <h3><strong>Noticias Recientes</strong></h3>
        <table id="alumnosTable" name="alumnosTable">
            <thead>
                <tr>
                    <th>Noticias</th>
                    <th>Imagen</th>
                    <th>Titulo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datos->articles as $noticia)
                    <tr>
                        <td>
                            <ul style="list-style: none; text-align: left">
                                <li> <strong>{{ $noticia->author }}</strong></li>
                                <li>
                                    <h4>{{ $noticia->title }}</h4>
                                </li>
                                <li> {{ $noticia->url }}</li>
                                <li> {{ $noticia->publishedAt }}</li>
                            </ul>
                        </td>
                        <td>
                            <img src="{{ $noticia->urlToImage }}" alt="" width="100vh" height="70vh">
                        </td>
                        <td>
                            <form action="{{ route('noticias.store') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label hidden for="author" class="form-label">Autor</label>
                                    <input hidden type="text" value="{{ $noticia->author }}" class="form-control"
                                        name="author">
                                </div>

                                <div class="mb-3">
                                    <label hidden for="title" class="form-label">Titulo</label>
                                    <input hidden type="text" value="{{ $noticia->title }}" class="form-control"
                                        name="title">
                                </div>

                                <div class="mb-3">
                                    <label hidden for="url" class="form-label">URL</label>
                                    <input hidden type="text" value="{{ $noticia->url }}" class="form-control"
                                        name="url">
                                </div>

                                <div class="mb-3">
                                    <label hidden for="urlToImage" class="form-label">URL: Imagen</label>
                                    <input hidden type="text" value="{{ $noticia->urlToImage }}" class="form-control"
                                        name="urlToImage">
                                </div>

                                <div class="mb-3">
                                    <label hidden for="publishedAt" class="form-label">Publicado El:</label>
                                    <input hidden type="text" value="{{ $noticia->publishedAt }}"
                                        class="form-control" name="publishedAt">
                                </div>

                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function onClickNews() {

        }
    </script>
@endsection