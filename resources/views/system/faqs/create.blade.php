@extends('layouts.admin')

@section('extraCSS')
    <style>
        body { 
            background-color: #2c2f38 !important; 
            color: #fff; 
        }

        .card { 
            /* background-color: #3a3f47;  */
            border-radius: 10px;
        }

        .card-header { 
            background-color: #6f7b8a !important; 
            color: #fff;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .black-skin .btn-primary { 
            background-color: #6f7b8a !important; 
            border-radius: 10px;
        }

        .btn { 
            box-shadow: none; 
            border-radius: 15px; 
            font-weight: 500;
        }

        .btn-dark { 
            background-color: #3a3f47; 
            color: #fff; 
            border: 1px solid #6f7b8a;
        }

        .btn-dark:hover { 
            background-color: #51585f; 
        }

        .form-control {
            /* background-color: #424c55; 
            border: 1px solid #6f7b8a; 
            color: #fff;  */
            border-radius: 10px;
        }

        .form-control:focus { 
            border-color: #9b7aaf !important;
            box-shadow: none;
        }

        .form-group label { 
            color: #b0b7c1; 
        }

        .form-group button {
            /* background-color: #9b7aaf; 
            border-color: #9b7aaf; 
            color: #fff; */
        }

        .form-group button:hover { 
            background-color: #6f7b8a; 
            border-color: #6f7b8a; 
        }

        .mt-5 { margin-top: 2rem !important; }

        /* Excluir estilos de Summernote */
        .summernote {
            background-color: transparent !important;
            border: none !important;
            color: inherit !important;
        }
    </style>
@endsection

@section('content')

    <div class="row mt-5 mb-4 px-2">
        <a href="{{ route('faqs.index') }}" class="mt-5 col col-md-2 btn btn-sm btn-dark ms-auto">
            <i class="fa fa-reply"></i> Regresar
        </a>
    </div>

    <div class="col-12 col-md-8 mx-auto">
        <div class="card">
            <div class="card-header text-center">
                <h5>Agregar Pregunta</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('faqs.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="pregunta">Pregunta</label>
                        <input type="text" name="pregunta" id="pregunta" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="respuesta">Respuesta</label>
                        <textarea name="respuesta" id="respuesta" rows="10" class="form-control summernote" style="resize:none;"></textarea>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-dark mt-3 rounded-0 w-100">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('extraJS')
    <script>
        $('.summernote').summernote({
            placeholder: 'Escribe la respuesta aquí...',
            tabsize: 2,
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
            ]
        });
    </script>
@endsection
