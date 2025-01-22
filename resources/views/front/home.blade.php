@extends('layouts.app')

@section('title', 'Inicio')

@section('styles')
    <style>
/* Estilo personalizado para el modal */
.modal-content {
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3); /* Sombra más pronunciada */
}

.modal-header {
    background-color: #000000; /* Fondo azul */
    color: white; /* Texto blanco */
    border-bottom: none; /* Quitar el borde inferior */
    padding: 1rem 1.5rem;
}

.modal-title {
    font-size: 1.25rem;
    font-weight: bold;
}

.modal-body {
    padding: 1.5rem;
    background-color: #000000; /* Fondo gris claro */
}

.btn-close {
    background: transparent;
    border: none;
    font-size: 1.25rem;
    opacity: 0.7;
}

.btn-close:hover {
    opacity: 1;
}

/* Imagen dentro del modal */
.slider-galeria img {
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2); /* Sombra suave */
}

/* Transición para el modal */
.modal.fade .modal-dialog {
    transition: transform 0.3s ease-out, opacity 0.3s ease-out;
    transform: translateY(-20px);
    opacity: 0;
}

.modal.fade.show .modal-dialog {
    transform: translateY(0);
    opacity: 1;
}

/* Puntos de navegación de Slick */
.slick-dots {
    margin-top: 3rem;
    bottom: -40px; /* Ajustar la posición vertical */
    display: flex !important;
    justify-content: center;
    gap: 10px; /* Espaciado entre puntos */
}

.slick-dots li button {
    width: 10px;
    height: 10px;
    border-radius: 50%; /* Puntos redondos */
    background-color: #ccc; /* Color predeterminado */
    border: none;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.slick-dots li.slick-active button {
    background-color: #f8f9fa; /* Color activo */
    transform: scale(1.2); /* Aumentar tamaño del punto activo */
    box-shadow: 0 0 10px rgba(0, 123, 255, 0.5); /* Resaltar el punto activo */
}
    </style>
@endsection

@section('content')
    
    <p>HOME</p>

    <div class="row px-2 g-4">
        @foreach ($projects as $project)
            <div class="col-md-4">
                <div class="card shadow-sm border-0 position-relative">
                    <div class="card position-absolute top-0 end-0">
                        <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modal-projects-{{ $project->id }}"><i class="bi bi-camera"></i></button>
                    </div>
                    <img src="{{ asset($project->image) }}" alt="{{ $project->title }}" class="card-img-top rounded">
                    <div class="card-body">
                        <h5 class="card-title">{{ $project->title }}</h5>
                        <p class="card-text text-muted">{{ $project->description }}</p>
                        <a href="{{ $project->demo_url }}" target="_blank" class="btn btn-outline-primary">Ver Demo</a>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modal-projects-{{ $project->id }}" tabindex="-1" aria-labelledby="#modal-projects-label-{{ $project->id }}" aria-hidden="true">
                <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="row px-3">
                            <div class="col-11">
                                <h1 class="modal-title fs-5" id="modal-projects-label-{{ $project->id }}">{{ $project->title }}</h1>
                            </div>
                            <div class="col-1"> 
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="slider-galeria">
                            @foreach ($project->images as $image)
                                <div>
                                    <img src="{{ asset($image->image_url) }}" alt="" class="img-fluid w-100">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    
                </div>
                </div>  
            </div>
        @endforeach
    </div>

    @if ($projects->count() < App\Project::count())
        <div class="mt-4 text-center">
            <button wire:click="loadMore" class="btn btn-primary">
                Cargar más
            </button>
        </div>
    @endif  


@endsection

@section('scripts')
<script>
   
   $(document).ready(function () {
    $('.modal').on('shown.bs.modal', function () {
        var slider = $(this).find('.slider-galeria');

        if (!slider.hasClass('slick-initialized')) {
            slider.slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false, // Activar flechas
                dots: true,
                speed: 600,
                fade: true,
                cssEase: 'ease-in-out',
            });
        } else {
            slider.slick('setPosition');
        }
    });
});



</script>
@endsection