@extends('layouts.admin')
@section('cssExtras')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('jsLibExtras')

@endsection
@section('extraCSS')
    <style>
        @font-face {
            font-family: 'Neusharp Bold';
            font-style: normal;
            font-weight: normal;
            src: local('Neusharp Bold'), url({{ asset('fonts/Neusharp-Bold/NeusharpBold-7B8RV.woff') }}) format('woff');
        }

        body {
            background-color: #2C3E50 !important; /* Fondo oscuro elegante */
            color: #ECF0F1; /* Texto blanco/ligero para contraste */
        }

        .card-header {
            background-color: #34495E !important; /* Fondo más oscuro para el encabezado de las tarjetas */
            color: #BDC3C7; /* Color suave de texto */
        }

        .black-skin .btn-primary {
            background-color: #1ABC9C !important; /* Color vibrante para botones */
            border-radius: 30px;
        }

        .btn {
            box-shadow: none;
            border-radius: 20px;
            background-color: #16A085; /* Color de fondo de los botones */
            color: white;
        }

        .card1 {
            background-color: #34495E; /* Color de fondo oscuro de las tarjetas */
            color: #BDC3C7;
            border-radius: 20px;
            transition: all 0.3s ease; /* Transición suave */
        }

        .card1:hover {
            background-color: #1ABC9C; /* Fondo más brillante cuando se pasa el ratón */
            color: white;
        }

        .card1:hover .icon_c {
            color: white;
            transition: all 0.3s ease;
        }

        .icon_c {
            font-size: 1.3rem; /* Tamaño de los iconos */
            color: #BDC3C7;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .menu-header {
            padding: 20px;
            background-color: #34495E; /* Fondo oscuro */
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        }

        .menu-header a {
            font-size: 1.5rem;
            color: #ECF0F1;
            font-weight: bold;
            text-decoration: none;
        }

        .menu-header a:hover {
            color: #1ABC9C; /* Color destacado en hover */
        }

        .menu-image-wrapper {
            display: inline-block;
            padding: 10px;
            background-color: #34495E;
            border: 4px solid #1ABC9C;
            border-radius: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
        }

        .menu-image {
            width: 100px;
            height: auto;
            border-radius: 50%;
        }

        .menu-link {
            display: block;
            margin-top: 10px;
            color: #BDC3C7;
            font-weight: bold;
            font-size: 1.1rem;
            text-align: center;
        }

        .menu-link:hover {
            color: #1ABC9C; /* Color en hover */
            text-decoration: underline;
        }
    </style>
@endsection

@section('content')
    <div class="row mt-5 pt-5 justify-content-center">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @foreach ($seccion as $card)
            @if($card->slug != 'archivados' && $card->slug != 'archivadosc' && $card->slug != 'arquitectos' && $card->slug != 'interioristas' && $card->slug != 'blogs' && $card->slug != 'reviews')
                <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 p-2">
                    <a href="{{route('module.show',$card->slug)}}" class="card h-100 card1" style="box-shadow: none;">
                        <span class="card-body text-muted text-center">
                            <i class="{{$card->portada}} mb-3 fs-2"></i> <br>
                            <span class="icon_c" style="font-family:'Neusharp Bold';">
                                @if ($card->seccion == 'reviews')
                                    Reseñas
                                @elseif ($card->seccion == 'galeria')
                                    Clientes
                                @else
                                    {{$card->seccion}}
                                @endif
                            </span>
                        </span>
                    </a>
                </div>
            @endif
        @endforeach
    </div>
@endsection

@section('extraJS')

@endsection
