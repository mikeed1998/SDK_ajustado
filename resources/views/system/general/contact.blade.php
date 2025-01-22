@extends('layouts.admin')

@section('extraCSS')
    <style>

        /* Estilos generales */
body {
    font-family: 'Poppins', sans-serif;
    color: #333;
	background-color: #2C3E50 !important;
}

.card {
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    border-radius: 12px;
    margin-bottom: 20px;
    background-color: #ffffff;
}

.card-header {
    background-color: #4a90e2;
    color: #fff;
    font-size: 1.2rem;
    font-weight: 600;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
    padding: 15px;
}

.card-body {
    padding: 20px;
}

/* Inputs y Textareas */
input.form-control, textarea.form-control {
    border-radius: 10px;
    border: 1px solid #ddd;
    padding: 12px;
    font-size: 1rem;
    transition: all 0.3s ease;
}

input.form-control:focus, textarea.form-control:focus {
    border-color: #4a90e2;
    box-shadow: 0 0 5px rgba(74, 144, 226, 0.5);
}

/* Botones */
.btn {
    background-color: #4a90e2;
    color: white;
    padding: 8px 16px;
    border-radius: 8px;
    font-weight: 600;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.btn:hover {
    background-color: #357ab7;
    transform: scale(1.05);
}



.form-group label {
    font-weight: 600;
    margin-bottom: 8px;
}

/* Tarjetas con más espacio */
.card-body .form-group {
    margin-bottom: 20px;
}

/* Estilo para los selectores */
select.form-control {
    border-radius: 10px;
    border: 1px solid #ddd;
    padding: 12px;
    font-size: 1rem;
    transition: all 0.3s ease;
}

select.form-control:focus {
    border-color: #4a90e2;
    box-shadow: 0 0 5px rgba(74, 144, 226, 0.5);
}

/* Estilo para los títulos */
.card-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: #333;
    margin-bottom: 15px;
}

    </style>
@endsection

@section('content')
	<div class="row mt-3 py-5  px-2">
		<a href="{{ route('admin.index') }}" class="col col-md-2 btn btn-sm btn-dark ms-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>
	<div class="row justify-content-center">
        <div class="col-12 col-md-4 p-2">
			<div class=" h-100 card" style="box-shadow: none; border-radius: 16px;">
				<div class="card-body">
					<h5 class="card-title text-center">Metadatos</h5>
					<div class="form-group">
						<label for="title"> Título del sitio </label>
						<input type="text" class="form-control editarajax" id="title" name="title" data-model="Configuracion" data-field="titulo" data-id="{{$config->id}}"  value="{{ $config->titulo }}">
					</div>
					<div class="form-group">
						<label for="description"> Descripción del sitio</label>
						<textarea class="form-control editarajax" id="description" name="description" rows="2" data-model="Configuracion" data-field="descripcion" data-id="{{$config->id}}" style="resize:none;">{{ $config->descripcion }}</textarea>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-4 p-2">
			<div class=" h-100 card" style="border-radius: 16px; box-shadow: none;">
				<div class="card-body">
					<h5 class="card-title text-center">Teléfonos</h5>
					<div class="form-group">
						<label for="telefono"> Teléfono fijo</label>
						<input type="text" class="form-control editarajax" id="telefono" name="telefono" data-model="Configuracion" data-field="telefono" data-id="{{$config->id}}"  value="{{ $config->telefono }}">
                    </div>
					<div class="form-group">
						<label for="whatsapp"> Whatsapp </label>
						<input type="text" class="form-control editarajax" id="whatsapp" name="whatsapp" data-model="Configuracion" data-field="whatsapp" data-id="{{$config->id}}"  value="{{ $config->whatsapp }}">
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-4 p-2">
			<div class=" h-100 card" style="border-radius: 16px; box-shadow: none;">
				<div class="card-body">
					<h5 class="card-title text-center">Redes sociales</h5>
					<div class="form-group">
						<label for="fb"> Facebook</label>
						<input type="text" class="form-control editarajax" id="fb" name="fb" data-model="Configuracion" data-field="facebook" data-id="{{$config->id}}"  value="{{ $config->facebook }}">
					</div>
					<div class="form-group">
						<label for="whatsapp2"> Twitter</label>
						<input type="text" class="form-control editarajax" id="tiktok" name="tiktok" data-model="Configuracion" data-field="whatsapp2" data-id="{{$config->id}}"  value="{{ $config->tiktok }}">
					</div>
					<div class="form-group">
						<label for="ig"> Linkedin</label>
						<input type="text" class="form-control editarajax" id="ig" name="ig" data-model="Configuracion" data-field="instagram" data-id="{{$config->id}}"  value="{{ $config->instagram }}">
					</div>
					<div class="form-group">
						<label for="yt"> YouTube </label>
						<input type="text" class="form-control editarajax" id="yt" name="yt" data-model="Configuracion" data-field="youtube" data-id="{{$config->id}}"  value="{{ $config->youtube }}">
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-4 p-2">
			<div class=" h-100 card" style="border-radius: 16px; box-shadow: none;">
				<div class="card-body">
					<h5 class="card-title text-center">Envío de correo</h5>
					<div class="form-group">
						<label for="destinatario">  Destinatario 1 </label>
						<input type="text" class="form-control editarajax" id="destinatario" name="destinatario" data-model="Configuracion" data-field="destinatario" data-id="{{$config->id}}"  value="{{ $config->destinatario }}">
					</div>
					<div class="form-group">
						<label for="destinatario2">  Destinatario 2 </label>
						<input type="text" class="form-control editarajax" id="destinatario2" name="destinatario2" data-model="Configuracion" data-field="destinatario2" data-id="{{$config->id}}"  value="{{ $config->destinatario2 }}">
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-4 p-2">
			<div class="card" style="border-radius: 16px; box-shadow: none;">
				<div class="card-body">
					<h5 class="card-title text-center">Mapa</h5>
					<div class="form-group">
						<label for="mapa">  URL de Mapa </label>
						<input type="text" class="form-control editarajax" id="mapa" name="mapa" data-model="Configuracion" data-field="mapa" data-id="{{$config->id}}"  value="{{ $config->mapa }}">
					</div>
					<div class="form-group">
						<label for="direccion">  Dirección </label>
						<textarea rows="3" style="resize:none;" class="form-control editarajax" id="direccion" name="direccion" data-model="Configuracion" data-field="direccion" data-id="{{$config->id}}">{{ $config->direccion }}</textarea>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-4 p-2">
			<div class=" h-100 card" style="border-radius: 16px; box-shadow: none;">
				<div class="card-body">
					<h5 class="card-title text-center">Autentificación</h5>
					<div class="form-group">
						<label for="remitente"> Remitente</label>
						<input disabled type="text" class="form-control editarajax" id="remitente" name="remitente" data-model="Configuracion" data-field="remitente" data-id="{{$config->id}}"  value="{{ $config->remitente }}">
					</div>
					<div class="form-group">
						<label for="remitentepass"> Contraseña</label>
						<input disabled type="text" class="form-control editarajax" id="remitentepass" name="remitentepass" data-model="Configuracion" data-field="remitentepass" data-id="{{$config->id}}"  value="{{ $config->remitentepass }}">
					</div>
					<div class="form-group">
						<label for="remitentehost"> Servidor</label>
						<input disabled type="text" class="form-control editarajax" id="remitentehost" name="remitentehost" data-model="Configuracion" data-field="remitentehost" data-id="{{$config->id}}"  value="{{ $config->remitentehost }}">
					</div>
					<div class="form-group">
						<label for="remitenteport"> Puerto</label>
						<input disabled type="text" class="form-control editarajax" id="remitenteport" name="remitenteport" data-model="Configuracion" data-field="remitenteport" data-id="{{$config->id}}"  value="{{ $config->remitenteport }}">
					</div>
					<div class="form-group">
						<label for="remitenteseguridad">  Seguridad </label>
						<select disabled class="form-control editarajax" id="remitenteseguridad" name="remitenteseguridad" data-model="Configuracion" data-field="remitenteseguridad" data-id="{{$config->id}}"  value="{{ $config->remitenteseguridad }}">
							<option value="ssl">SSL</option>
							<option value="tls">TLS</option>
							<option value="starttls">STARTTLS</option>
						</select>
					</div>
				</div>
			</div>
		</div>

	</div>

@endsection

@section('extraJS')

@endsection