<style>
/* Estilo general del navbar */
.header-navbar {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000;
    background-color: #333; /* Fondo oscuro */
}

.header-body {
    padding-top: 60px; /* Espacio para el navbar fijo */
}

/* Transiciones suaves para enlaces y botones */
.header-nav-link,
.header-btn-outline-light {
    transition: background-color 0.3s ease, color 0.3s ease;
}

/* Estilo en hover de los enlaces */
.header-nav-link:hover {
    color: #8e44ad;
    background-color: rgba(142, 68, 173, 0.1); /* Fondo morado suave */
    border-radius: 5px;
}

.header-btn-outline-light:hover {
    background-color: #8e44ad;
    color: white;
    border-color: #8e44ad;
}

/* Indicador visual para el elemento activo */
.header-nav-link.active {
    color: white;
    background-color: #8e44ad;
    border-radius: 5px;
    border-bottom: 3px solid #fff; /* Indicador de página activa */
}

/* Estilos para el foco (cuando se navega con el teclado) */
.header-nav-link:focus {
    outline: 3px solid #8e44ad;
    outline-offset: 2px;
}

/* Animación para el botón toggle */
.header-navbar-toggler-icon {
    transition: transform 0.3s ease;
}

.header-navbar-toggler.collapsed .header-navbar-toggler-icon {
    transform: rotate(0deg);
}

.header-navbar-toggler:not(.collapsed) .header-navbar-toggler-icon {
    transform: rotate(180deg); /* Rotación del icono cuando el menú está abierto */
}

/* Estilos para el dropdown */
.header-navbar-nav .header-nav-item.dropdown {
    position: relative;
}

.header-navbar-nav .header-nav-item.dropdown:hover .dropdown-menu {
    display: block;
    animation: slideDown 0.3s ease-in-out;
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Asegurando buen contraste */
.header-nav-link {
    color: #fff; /* Texto blanco */
}

/* Fondo oscuro en menús en dispositivos pequeños */
@media (max-width: 992px) {
    .header-navbar-collapse {
        background-color: #333; /* Fondo oscuro en el menú desplegable */
    }
}

/* Mejora de visibilidad en botones */
.header-navbar-toggler {
    background-color: #8e44ad; /* Color morado para el botón toggle */
    border: none;
}

.header-body {
    padding-top: 60px;
}

body {
    padding-top: 60px;
}

</style>

<nav class="header-navbar navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">Michael Eduardo</a>
        <button class="header-navbar-toggler navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="header-navbar-toggler-icon navbar-toggler-icon"></span>
        </button>
        <div class="header-navbar-collapse collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="header-navbar-nav navbar-nav ms-auto mb-2 mb-lg-0 text-md-0 text-center">
                <li class="header-nav-item nav-item px-2">
                    <a class="header-nav-link nav-link @if(Route::is('front.home')) active @endif" aria-current="page" href="#">Inicio</a>
                </li>
                <li class="header-nav-item nav-item px-2">
                    <a class="header-nav-link nav-link @if(Route::is('front.about')) active @endif" href="#">Sobre mi</a>
                </li>
                <li class="header-nav-item nav-item px-2">
                    <a class="header-nav-link nav-link @if(Route::is('front.portfolio')) active @endif" href="#">Portafolio</a>
                </li>
                <li class="header-nav-item nav-item px-2">
                    <a class="header-nav-link nav-link" href="#">Experiencia</a>
                </li>
                <li class="header-nav-item nav-item px-2">
                    <a class="header-nav-link nav-link" href="#">Mi CV</a>
                </li>
                <li class="header-nav-item nav-item px-2">
                    <a class="header-nav-link nav-link" href="#">Contacto</a>
                </li>
                <li class="header-nav-item nav-item px-2">
                    <a class="header-nav-link nav-link" href="#">Blog</a>
                </li>
                <li class="header-nav-item nav-item px-2">
                    <a href="#/" class="header-btn-outline-light btn btn-outline-light" type="button">¡Contactame!</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
