document.addEventListener("DOMContentLoaded", function() {
    const formulario = document.getElementById("formContacto");
    const mensajeError = document.getElementById("error-mensaje");

    formulario.addEventListener("submit", function(evento) {
        
        mensajeError.textContent = "";

        const nombre = document.getElementById("nombre").value.trim();
        const apellidos = document.getElementById("apellidos").value.trim();

        if (nombre === "" || apellidos === "") {
            evento.preventDefault();
            mensajeError.textContent = "Por favor, completa los campos de Nombre y Apellidos.";
            return;
        }

        const generoM = document.getElementById("radioM").checked;
        const generoF = document.getElementById("radioF").checked;

        if (!generoM && !generoF) {
            evento.preventDefault();
            mensajeError.textContent = "Por favor, selecciona una opción de Género.";
            return;
        }

        const estudios = document.getElementById("estudios").value;
        if (estudios === "") {
            evento.preventDefault();
            mensajeError.textContent = "Por favor, selecciona tu nivel de estudios actuales.";
            return;
        }

    });
});

document.addEventListener("DOMContentLoaded", function () {
    const formRegistro = document.getElementById("registroForm");

    if (formRegistro) {
        formRegistro.addEventListener("submit", function (event) {
            const nombre = document.getElementById("nombre").value.trim();
            const correo = document.getElementById("correo").value.trim();
            const password = document.getElementById("password").value;
            const rePassword = document.getElementById("re_password").value;
            const errorMsg = document.getElementById("errorMsg");

            if (!nombre || !correo || !password || !rePassword) {
                event.preventDefault();
                errorMsg.textContent = "Por favor, completa todos los campos.";
                errorMsg.style.color = "red";
                return;
            }

            if (password !== rePassword) {
                event.preventDefault(); // Detiene el envío del formulario
                errorMsg.textContent = "¡Las contraseñas no coinciden! Por favor verifícalas.";
                errorMsg.style.color = "red";
                document.getElementById("re_password").focus();
            } else {
                errorMsg.textContent = "";
            }
        });
    }
});