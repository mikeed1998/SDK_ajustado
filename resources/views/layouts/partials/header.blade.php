<nav class="header-navbar navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">Michael Eduardo</a>
        <button class="header-navbar-toggler navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="header-navbar-toggler-icon navbar-toggler-icon"></span>
        </button>
        <div class="header-navbar-collapse collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="header-navbar-nav navbar-nav ms-auto mb-2 mb-lg-0 text-md-0 text-center">
                <li class="header-nav-item nav-item px-2">
                    <a class="header-nav-link nav-link @if(Route::is('front.home')) active @endif" aria-current="page" href="{{ route('front.home') }}">Inicio</a>
                </li>
                <li class="header-nav-item nav-item px-2">
                    <a class="header-nav-link nav-link @if(Route::is('front.about')) active @endif" href="{{ route('front.about') }}">Sobre mi</a>
                </li>
                <li class="header-nav-item nav-item px-2">
                    <a class="header-nav-link nav-link @if(Route::is('front.portfolio')) active @endif" href="{{ route('front.portfolio') }}">Portafolio</a>
                </li>
                <li class="header-nav-item nav-item px-2">
                    <a class="header-nav-link nav-link @if(Route::is('front.experience')) active @endif" href="{{ route('front.experience') }}">Experiencia</a>
                </li>
                <li class="header-nav-item nav-item px-2">
                    <a class="header-nav-link nav-link @if(Route::is('front.my_cv')) active @endif" href="{{ route('front.my_cv') }}">Mi CV</a>
                </li>
                <li class="header-nav-item nav-item px-2">
                    <a class="header-nav-link nav-link @if(Route::is('front.contact')) active @endif" href="{{ route('front.contact') }}">Contacto</a>
                </li>
                <li class="header-nav-item nav-item px-2">
                    <a class="header-nav-link nav-link @if(Route::is('front.blog')) active @endif" href="{{ route('front.blog') }}">Blog</a>
                </li>
                <li class="header-nav-item nav-item px-2">
                    <a class="header-nav-link nav-link @if(Route::is('login')) active @endif" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                {{-- <li class="header-nav-item nav-item px-2">
                    <a href="#/" class="header-btn-outline-light btn btn-outline-light" type="button">¡Contactame!</a>
                </li> --}}
            </ul>
        </div>
    </div>
</nav>
