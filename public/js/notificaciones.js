window.addEventListener('notify', event => {
    console.log('Evento notify recibido:', event.detail);
    const { type, message } = event.detail;
    const notification = document.getElementById('notification');

    // Configura el mensaje y el estilo
    notification.textContent = ''; // Limpiar cualquier texto previo
    notification.className = `${type} visible`;

    // Agrega un ícono correspondiente según el tipo de notificación
    const icon = document.createElement('i');
    if (type === 'success') {
        icon.classList.add('bi', 'bi-check-circle'); // Ícono de éxito
    } else if (type === 'error') {
        icon.classList.add('bi', 'bi-exclamation-circle'); // Ícono de error
    }
    notification.appendChild(icon);
    notification.appendChild(document.createTextNode(message)); // Añadir el mensaje al lado del ícono

    // Oculta la notificación después de 3 segundos
    setTimeout(() => {
        notification.className = 'hidden';
    }, 3000);
});

// window.dispatchEvent(new CustomEvent('notify', {
//     detail: {
//         type: 'success', // Cambia a 'error' para un mensaje de error
//         message: 'Prueba de notificación'
//     }
// }));
