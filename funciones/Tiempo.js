function actualizarFechaHora() {

    const contenedor = document.getElementById('fecha-hora-actual');
    
    const ahora = new Date();

    const opcionesFecha = { 
        weekday: 'long',
        year: 'numeric',  
        month: 'long',    
        day: 'numeric'    
    };

    let fechaTexto = ahora.toLocaleDateString('es-ES', opcionesFecha);

    let horaTexto = ahora.toLocaleTimeString('es-ES');

    fechaTexto = fechaTexto.charAt(0).toUpperCase() + fechaTexto.slice(1);

    contenedor.innerHTML = `${fechaTexto} — ${horaTexto}`;
}

actualizarFechaHora();

setInterval(actualizarFechaHora, 1000);