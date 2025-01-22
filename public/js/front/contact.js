$(document).ready(function () {
   // Función para validar un campo en tiempo real
   function validarCampo(campo, valor) {
       $.ajax({
           url: window.appData.RUTA_VALIDAR_CAMPO,  // Accede a la ruta desde el objeto global
           type: "POST",
           data: {
               [campo]: valor,
               _token: window.appData.CSRF_TOKEN // Usa el token desde el objeto global
           },
           success: function () {
               // Si no hay errores, limpia el mensaje de error y los estilos
               $(`#${campo}`).removeClass('input-error');
               $(`#error-${campo}`).text('');
           },
           error: function (xhr) {
               if (xhr.status === 422) {
                   const errors = xhr.responseJSON.errors;
                   if (errors[campo]) {
                       // Si hay errores, muestra el mensaje y aplica la clase de error
                       $(`#${campo}`).addClass('input-error');
                       $(`#error-${campo}`).text(errors[campo][0]);
                   } else {
                       // Limpia el mensaje de error si ya no hay errores
                       $(`#${campo}`).removeClass('input-error');
                       $(`#error-${campo}`).text('');
                   }
               }
           }
       });
   }

   // Validar mientras el usuario escribe
   $('#name').on('input', function () {
       validarCampo('name', $(this).val());
   });

   $('#phone').on('input', function () {
       validarCampo('phone', $(this).val());
   });

   $('#subject').on('input', function () {
       validarCampo('subject', $(this).val());
   });

   $('#message').on('input', function () {
       validarCampo('message', $(this).val());
   });

   // Enviar el formulario con AJAX
   $('#contactForm').on('submit', function (e) {
       e.preventDefault(); // Evita el envío por defecto

       // Obtén los datos del formulario
       var formData = {
           name: $('#name').val(),
           phone: $('#phone').val(),
           subject: $('#subject').val(),
           message: $('#message').val(),
           _token: window.appData.CSRF_TOKEN  // Usar el token desde el objeto global
       };

       // Realizar el envío del formulario
       $.ajax({
           url: window.appData.RUTA_ENVIAR_FORMULARIO,  // Usar la ruta desde el objeto global
           type: "POST",
           data: formData,
           success: function (response) {
               // Mostrar notificación de éxito
               window.dispatchEvent(new CustomEvent('notify', {
                   detail: {
                       type: 'success', 
                       message: response.message
                   }
               }));

               // Limpiar el formulario
               $('#contactForm')[0].reset();
           },
           error: function (xhr) {
               if (xhr.status === 422) {
                   var errors = xhr.responseJSON.errors;
                   var errorMessage = '';
                   // Unir los errores con saltos de línea
                   for (var field in errors) {
                       if (errors.hasOwnProperty(field)) {
                           errorMessage += errors[field][0] + '<br>';
                       }
                   }

                   // Mostrar los errores con saltos de línea interpretados como HTML
                   window.dispatchEvent(new CustomEvent('notify', {
                       detail: {
                           type: 'error',
                           message: errorMessage // Se pasa directamente como HTML
                       }
                   }));
               } else {
                   // Mostrar error general
                   window.dispatchEvent(new CustomEvent('notify', {
                       detail: {
                           type: 'error',
                           message: 'Hubo un error al enviar el formulario.'
                       }
                   }));
               }
           }
       });
   });
});
