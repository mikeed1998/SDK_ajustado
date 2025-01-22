@extends('layouts.admin')

@section('extraCSS')
    <style>

        /* Estilos Generales */
body {
    background-color: #2c2f36 !important; /* Fondo oscuro */
    font-family: 'Roboto', sans-serif;
    color: #f4f4f4; /* Texto claro para mejorar la legibilidad */
}

/* Estilo para las tarjetas */
.card {
    border-radius: 8px;
    background-color: #3a3f47; /* Fondo oscuro para las tarjetas */
    border: 1px solid #444; /* Borde sutil */
    box-shadow: none;
    margin-bottom: 20px;
}

/* Encabezado de las tarjetas */
.card-header {
    background-color: #6f42c1; /* Púrpura para el encabezado */
    color: #fff;
    font-size: 1.2rem;
    font-weight: 600;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
    padding: 15px;
}

/* Botones */
.btn {
    border-radius: 20px;
    font-weight: 500;
    padding: 8px 20px;
    transition: all 0.3s ease;
    text-transform: uppercase;
}

/* Botones Principales */
.btn-primary {
    background-color: #6f42c1; /* Púrpura */
    border-color: #6f42c1;
}

.btn-primary:hover {
    background-color: #5a2d9d; /* Púrpura más oscuro */
    border-color: #5a2d9d;
}

.btn-dark {
    background-color: #343a40; /* Gris oscuro */
    border-color: #343a40;
}

.btn-dark:hover {
    background-color: #23272b; /* Gris aún más oscuro */
    border-color: #23272b;
}

.btn-success {
    background-color: #28a745; /* Verde */
    border-color: #28a745;
}

.btn-success:hover {
    background-color: #218838;
    border-color: #218838;
}

.btn-info {
    background-color: #17a2b8; /* Azul */
    border-color: #17a2b8;
}

.btn-info:hover {
    background-color: #138496;
    border-color: #138496;
}

.btn-danger {
    background-color: #dc3545; /* Rojo */
    border-color: #dc3545;
}

.btn-danger:hover {
    background-color: #c82333;
    border-color: #c82333;
}

/* Enlaces */
a {
    text-decoration: none;
    color: inherit;
}

a:hover {
    text-decoration: underline;
}

/* Espaciado y márgenes */
.mt-5, .mb-4 {
    margin-top: 40px !important;
    margin-bottom: 30px !important;
}

.row {
    margin-left: 0;
    margin-right: 0;
}

.col-2 {
    display: flex;
    justify-content: flex-end;
}

.card-body {
    padding: 15px;
}

/* Iconos de botones */
.fa, .bi {
    font-size: 1.2rem;
}

/* Estilo para la tarjeta */
.card .row {
    display: flex;
    align-items: center; /* Centra el contenido verticalmente */
    padding: 10px 15px;
}

/* Estilo específico para el enlace de la pregunta */
.card a {
    font-size: 1rem;
    font-weight: 500;
    color: #f4f4f4;
    text-decoration: none;
    display: flex; /* Flex para permitir el centrado */
    align-items: center; /* Centra el texto verticalmente */
    justify-content: flex-start; /* Alinea el texto al inicio (izquierda) */
    height: 100%; /* Asegura que ocupe toda la altura disponible */
}

.card a:hover {
    color: #6f42c1; /* Púrpura al pasar el cursor */
    text-decoration: none;
}


/* Estilo para las acciones de editar y eliminar */
.card .row .col-6 {
    padding: 5px;
}

/* Mejorar la apariencia del botón de eliminar */
.card .btn-danger {
    background-color: #dc3545;
    color: white;
}

.card .btn-danger:hover {
    background-color: #c82333;
}

/* Acentuar los botones en los títulos de las tarjetas */
.card .row a, .card .row button {
    background-color: #444;
    border: none;
    color: white;
    font-size: 0.9rem;
    padding: 8px;
    border-radius: 12px;
}

.card .row a:hover, .card .row button:hover {
    background-color: #6f42c1; /* Púrpura */
}

/* Mejora en la disposición de la fila para edición y eliminación */
.card .row {
    display: flex;
    justify-content: space-between;
    padding: 10px 15px;
}


    </style>
@endsection

@section('content')

    <div class="row mt-5 mb-4 px-2">
        <div class="col-8"></div>
        <div class="col-2">
            <a href="{{ route('admin.index') }}" class="mt-5 w-100 col col-md-2 btn btn-sm btn-dark mx-end"><i class="fa fa-reply"></i> Regresar</a>
        </div>
        <div class="col-2">
            <a href="{{ route('faqs.create') }}" class="mt-5 w-100 col col-md-2 btn btn-sm btn-success text-white"><i class="fa fa-plus"></i> Agregar</a>
        </div>
    </div>

    @foreach ($faqs as $f)
        <div class="card" data-card="{{ $f->id }}">
            <div class="row">
                <div class="col-9">
                    <a href="{{ route('faqs.show', ['id' => $f->id]) }}" class="btn btn-link btn-block py-0 text-left fs-5">
                        {{ $f->pregunta }}
                    </a>
                </div>
                <div class="col-3">
                    <div class="row">
                        <div class="col-6">
                            <a href="{{ route('faqs.edit', ['id' => $f->id]) }}" class="btn btn-sm btn-info text-center w-100 rounded-0 d-flex justify-content-center align-items-center">
                                <i class="bi bi-pencil-square fs-5"></i>
                            </a>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-sm btn-danger text-right w-100 rounded-0" onclick="confirmDeletion({{ $f->id }})">
                                <i class="bi bi-trash fs-5"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection

@section('extraJS')
    <script type="text/javascript">
        function confirmDeletion(id) {
            Swal.fire({
                title: '¿Deseas eliminar está pregunta?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminarla!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route("faqs.destroy", ":id") }}'.replace(':id', id),
                        type: 'DELETE',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            Swal.fire(
                                'Eliminado!',
                                'La pregunta ha sido eliminada.',
                                'success'
                            );
                            // Remove the card
                            $('div[data-card="' + id + '"]').remove();
                        },
                        error: function(response) {
                            Swal.fire(
                                'Error!',
                                'Hubo un problema al eliminar la pregunta.',
                                'error'
                            );
                        }
                    });

                }
            });
        }
    </script>
@endsection