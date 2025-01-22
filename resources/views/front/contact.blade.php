@extends('layouts.app')

@section('title', 'Contacto')

@section('styles')

   <link rel="stylesheet" href="{{ asset('css/front/contact.min.css') }}">
   <link rel="stylesheet" href="{{ asset('css/notifications/contactForm.min.css') }}">

@endsection

@section('content')
   <div class="container py-5">
      <form id="contactForm" class="bg-white p-4 col-md-6 col-11 rounded shadow-sm mx-auto">
            <h2 class="text-center mb-4">Contáctame</h2>

            <div class="mb-3">
               <label for="name" class="form-label">Nombre</label>
               <input type="text" id="name" class="form-control">
               <div id="error-name" class="text-danger"></div>
            </div>
         
            <div class="mb-3">
               <label for="phone" class="form-label">Teléfono</label>
               <input type="text" id="phone" class="form-control">
               <div id="error-phone" class="text-danger"></div>
            </div>
            
            <div class="mb-3">
               <label for="subject" class="form-label">Asunto</label>
               <input type="text" id="subject" class="form-control">
               <div id="error-subject" class="text-danger"></div>
            </div>
            
            <div class="mb-3">
               <label for="message" class="form-label">Mensaje</label>
               <textarea id="message" rows="5" class="form-control"></textarea>
               <div id="error-message" class="text-danger"></div>
            </div>
         
            <button type="submit" id="submit" class="btn btn-primary w-100">Enviar</button>
      
      </form>

      <div id="notification" class="mt-4"></div>
   </div>

@section('scripts')

   <script src="{{ asset('js/front/contact.min.js') }}"></script>
   <script src="{{ asset('js/notifications/contactForm.min.js') }}"></script>

@endsection
