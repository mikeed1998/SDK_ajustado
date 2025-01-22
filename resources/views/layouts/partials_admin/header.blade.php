<style>
/* Botón de menú más formal */
.menu-button {
    position: fixed;
    z-index: 9999;
    top: 4rem;
    left: 1%;
    background-color: #4A148C; /* Morado elegante */
    color: #FFFFFF; /* Texto blanco */
    border: 2px solid #9C27B0; /* Borde morado claro */
    padding: 12px 80px; /* Tamaño del botón */
    border-radius: 12px; /* Bordes redondeados */
    font-size: 1rem; /* Tamaño del texto */
    font-weight: 600; /* Peso del texto */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); /* Sombra sutil */
    cursor: pointer; /* Cursor de mano */
    transition: background-color 0.3s ease, color 0.3s ease, transform 0.2s ease; /* Animación suave */
}

.menu-button:hover {
    background-color: #9C27B0; /* Cambio a morado más claro al pasar el mouse */
    color: #FFFFFF; /* Mantener texto blanco */
    transform: scale(1.05); /* Pequeña escala al hacer hover */
}

/* Sidebar */
.menu-contenido {
    position: fixed;
    z-index: 9999;
    top: 8rem;
    left: 0;
    width: 250px;
    height: calc(100vh - 8rem);
    background-color: #2C2C2C; /* Fondo gris oscuro */
    overflow-y: auto;
    transform: translateX(-100%);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    box-shadow: 2px 0 10px rgba(0, 0, 0, 0.3);
}

.menu-contenido.visible {
    transform: translateX(0);
}

.menu-contenido::-webkit-scrollbar {
    width: 8px;
}

.menu-contenido::-webkit-scrollbar-thumb {
    background-color: #4A148C; /* Morado */
    border-radius: 8px;
}

.menu-contenido::-webkit-scrollbar-thumb:hover {
    background-color: #9C27B0; /* Morado claro */
}

.menu-header {
    padding: 1rem;
    text-align: center;
    border-bottom: 1px solid #444;
}

.menu-header img {
    max-width: 80%;
    height: auto;
}


.menu-header {
    text-align: center; /* Centra el contenido */
}

.menu-image-wrapper {
    display: inline-block;
    padding: 0px; /* Espaciado interno para el marco */
    background-color: white; /* Color del marco */
    border: 1px solid white; /* Grosor del marco */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Añade una sombra sutil */
}

.menu-image {
    width: 100px; /* Ajusta el tamaño de la imagen */
    height: 100px;
}

.menu-link {
    display: block;
    margin-top: 10px; /* Espacio entre la imagen y el enlace */
    color: #007bff; /* Color del texto del enlace (Bootstrap por defecto) */
    text-decoration: none; /* Elimina el subrayado */
    font-weight: bold;
}

.menu-link:hover {
    text-decoration: underline; /* Subraya al pasar el ratón */
}

/* Enlaces del sidebar */
.link-sider__admin {
    display: block;
    padding: 1rem 1.5rem;
    text-decoration: none;
    color: #FFFFFF; /* Texto blanco */
    font-size: 0.9rem;
    font-weight: 500;
    border-radius: 8px;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.link-sider__admin:hover {
    background-color: #9C27B0; /* Morado claro */
    color: #FFFFFF;
}

.link-sider__admin--selected {
    background-color: #9C27B0; /* Morado claro */
    color: #FFFFFF;
}

.link-slider__admin--seleccionado {
    background-color: #4A148C; /* Morado oscuro */
    color: #FFFFFF;
    font-weight: 700;
    border-radius: 8px;
}

/* Navbar */
nav.navbar {
    background-color: #2C2C2C; /* Fondo gris oscuro */
    color: #FFFFFF; /* Texto blanco */
    border-radius: 16px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
    padding: 0.5rem 2rem;
}

nav.navbar a {
    color: #9C27B0; /* Morado claro */
    text-decoration: none;
}

nav.navbar a:hover {
    text-decoration: underline;
    font-weight: bold;
}

</style>

<header>
    <nav class="navbar py-2 fixed-top navbar-expand-lg mx-3 mt-1">
        <div class="row w-100">
            <div class="col-md-6 col-12 text-start">
                System Managment Resources
            </div>
            <div class="col-md-6 col-12 text-end">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-escape"></i> Salir del administrador
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </nav>

    <div class="sidebar">
        <button id="menu-toggle" class="menu-button fw-bolder">MENÚ</button>
        <div class="menu-contenido">
            <div class="menu-header text-center">
                <div class="menu-image-wrapper">
                    <img src="{{ asset('images/resources/character.png') }}" alt="Logo" class="img-fluid menu-image">
                </div>
                <a href="{{ route('admin.index') }}" class="menu-link">Ir a Admin</a>
            </div>            
            <div class="menu-links">
                <a href="{{ route('module.show', ['slug' => 'configuracion']) }}" class="link-sider__admin">
                    <i class="bi bi-gear-fill"></i> Configuración
                </a>
                <a href="{{ route('module.show', ['slug' => 'politicas']) }}" class="link-sider__admin">
                    <i class="bi bi-shield-fill-exclamation"></i> Políticas
                </a>
                <a href="{{ route('module.show', ['slug' => 'faqs']) }}" class="link-sider__admin">
                    <i class="bi bi-question-circle-fill"></i> Preguntas Frecuentes
                </a>
                <a href="{{ route('module.show', ['slug' => 'home']) }}" class="link-sider__admin">
                    <i class="bi bi-house-door-fill"></i> Página Principal
                </a>
                <a href="{{ route('module.show', ['slug' => 'nosotros']) }}" class="link-sider__admin">
                    <i class="bi bi-postcard-fill"></i> Sobre Mi
                </a>
                <a href="{{ route('module.show', ['slug' => 'contact']) }}" class="link-sider__admin">
                    <i class="bi bi-envelope-fill"></i> Contacto
                </a>
                <a href="{{ route('module.show', ['slug' => 'catalogo']) }}" class="link-sider__admin">
                    <i class="bi bi-stack"></i> Portafolio
                </a>
                <a href="{{ route('module.show', ['slug' => 'sliders']) }}" class="link-sider__admin">
                    <i class="bi bi-card-image"></i> Experiencia Profesional
                </a>
                <a href="{{ route('module.show', ['slug' => 'galeria']) }}" class="link-sider__admin">
                    <i class="bi bi-camera-fill"></i> Mi CV
                </a>
                <a href="{{ route('module.show', ['slug' => 'soluciones']) }}" class="link-sider__admin">
                    <i class="bi bi-patch-check-fill"></i> Blog
                </a>
            </div>
        </div>
    </div>
</header>

<footer class="bg-secondary text-white text-center py-3 mt-auto fixed-bottom">
    Self Managment System - by Michael Eduardo Sandoval Pérez (2025)
</footer>

<script>
    document.getElementById('menu-toggle').addEventListener('click', function () {
        document.querySelector('.menu-contenido').classList.toggle('visible');
    });
</script>
