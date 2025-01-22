window.addEventListener('notify', event => {
    const { type, message } = event.detail;
    const notification = document.getElementById('notification');

    // Configura el mensaje y el estilo
    notification.innerHTML = ''; // Limpiar cualquier texto previo
    notification.className = `${type} visible`;

    // Agrega un ícono correspondiente según el tipo de notificación
    const icon = document.createElement('i');
    if (type === 'success') {
       icon.classList.add('bi', 'bi-check-circle'); // Ícono de éxito
    } else if (type === 'error') {
       icon.classList.add('bi', 'bi-exclamation-circle'); // Ícono de error
    }
    notification.appendChild(icon);
    
    // Usar innerHTML para que el mensaje sea interpretado como HTML
    notification.innerHTML += message; // Añadir el mensaje al lado del ícono

    // Oculta la notificación después de 3 segundos
    setTimeout(() => {
       notification.className = 'hidden';
    }, 3000);
 });