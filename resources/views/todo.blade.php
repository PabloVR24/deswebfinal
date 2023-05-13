@extends('users.navbar')

@section('contenido')
    <style>
        .noticias-container {
            display: flex;
            flex-wrap: nowrap;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            scroll-behavior: smooth;
        }

        .card {
            flex: 0 0 auto;
            margin-right: 1rem;
            width: 18rem;
        }
    </style>

    <h3>Slider</h3>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ URL::asset('images/taini.png') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ URL::asset('images/badbo.png') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ URL::asset('images/taini2.png') }}" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container">
        <h3>Mapa</h3>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14419.355409369973!2d-101.02487863085936!3d25.37671677030438!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86887309ac3f0eb7%3A0xa93415b10b6908dc!2sOrelia%20Recepciones!5e0!3m2!1ses-419!2smx!4v1681579581645!5m2!1ses-419!2smx"
            width="100%" height="30%" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        <h3>Acordeon de preguntas frecuentes</h3>
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Accordion Item #1
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the
                        <code>.accordion-flush</code> class. This is the first item's accordion body.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        Accordion Item #2
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the
                        <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this
                        being filled with some actual content.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        Accordion Item #3
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the
                        <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting
                        happening here in terms of content, but just filling up the space to make it look, at least at first
                        glance, a bit more representative of how this would look in a real-world application.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                        Accordion Item #3
                    </button>
                </h2>
                <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the
                        <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting
                        happening here in terms of content, but just filling up the space to make it look, at least at first
                        glance, a bit more representative of how this would look in a real-world application.
                    </div>
                </div>
            </div>
            <br><br><br>
            <h3>Formulario de Sugerencias por correo</h3>
            <form action="pavara_2010@hotmail.com" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="name" class="form-control" id="name" name="name">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo</label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
                <div class="mb-3">
                    <label for="subject" class="form-label">Asunto</label>
                    <input type="text" class="form-control" name="subject" id="subject">
                </div>
                <div class="mb-3">
                    <label for="sugerencia" class="form-label">Sugerencia</label>
                    <textarea name="sugerencia" class="form-control" id="sugerencia" cols="30" rows="5"></textarea>
                </div>

                <input type="hidden" name="_subject" value="Nueva Sugerencia en StellarHost">
                <input type="hidden" name="_autoresponse" value="Agradecemos tus comentarios.">
                <input type="hidden" name="_template" value="table">

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <h3>Formulario de Sugerencias</h3>
        <div class="container w-25 border p-4 my-4">
            <div class="row mx-auto">
                <form action="{{ route('sugerencias.store') }}" id="sugerenciasForm" method="POST">
                    @csrf
                    @if (session('success'))
                        <h6 class="alert alert-success">{{ session('success') }}</h6>
                    @endif

                    <div class="mb-3">
                        <label for="autor" class="form-label">Nombre del Sugerido</label>
                        <input type="text" value="{{ old('autor') }}" class="form-control" name="autor">
                    </div>
                    @error('autor')
                        <h6 class="alert alert-danger">{{ $message }}</h6>
                    @enderror

                    <div class="mb-3">
                        <label for="contenido" class="form-label">Contenido</label>
                        <input type="text" value="{{ old('contenido') }}" class="form-control" name="contenido">
                    </div>
                    @error('contenido')
                        <h6 class="alert alert-danger">{{ $message }}</h6>
                    @enderror

                    <div class="mb-3">
                        <label for="calificacion" class="form-label">Calificacion</label>
                        <select name="calificacion" class="form-control" id="calificacion">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    @error('calificacion')
                        <h6 class="alert alert-danger">{{ $message }}</h6>
                    @enderror

                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>

            </div>
        </div>
        <h3>Noticias del día</h3>
        <div class="noticias-container">
            <!-- Tarjetas de noticias -->
            @foreach ($noticias as $noticia)
                <div class="card" style="width: 18rem;">
                    <h6><strong>{{ $noticia->publishedAt }}</strong></h6>
                    <img class="card-img-top" src="{{ $noticia->urlToImage }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $noticia->author }}</h5>
                        <p class="card-text" style="font-size: 2.5vh">{{ $noticia->title }}</p>
                        <a href="{{ $noticia->url }}" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            @endforeach
        </div>
    @endsection
