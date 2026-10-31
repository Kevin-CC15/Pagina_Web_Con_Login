
const preguntas = [
    {
        pregunta: "¿Qué etiqueta de HTML se usa para crear un enlace?",
        opciones: ["<a>", "<link>", "<href>", "<url>"],
        respuesta: 0
    },
    {
        pregunta: "¿Qué propiedad de CSS se usa para cambiar el color de fondo?",
        opciones: ["color", "background-color", "text-color", "border-color"],
        respuesta: 1
    },
    {
        pregunta: "¿Cuál de los siguientes NO es un tipo de dato en JavaScript?",
        opciones: ["String", "Boolean", "Float", "Undefined"],
        respuesta: 2
    }
];

let preguntaActual = 0;
let puntaje = 0;

function cargarPregunta() {

    const contenedorPregunta = document.getElementById('pregunta-texto');
    const contenedorOpciones = document.getElementById('opciones-contenedor');
    const resultadoDiv = document.getElementById('resultado-quiz');

    resultadoDiv.innerText = '';

    if (preguntaActual < preguntas.length) {
        const actual = preguntas[preguntaActual];
        contenedorPregunta.innerText = `Pregunta ${preguntaActual + 1}: ${actual.pregunta}`;
        contenedorOpciones.innerHTML = '';

        actual.opciones.forEach((opcion, index) => {
            const boton = document.createElement('button');
            boton.innerText = opcion;
            boton.style.cssText = "display: block; width: 100%; padding: 10px; margin: 5px 0; background: white; border: 1px solid #ccc; border-radius: 4px; cursor: pointer; text-align: left;";
            boton.onclick = () => verificarRespuesta(index);
            contenedorOpciones.appendChild(boton);
        });

    } else {

        contenedorPregunta.innerText = "¡Cuestionario completado!";
        contenedorOpciones.innerHTML = '';
        resultadoDiv.innerText = `Tu puntaje final es ${puntaje} de ${preguntas.length}.`;
        
        const botonReiniciar = document.createElement('button');
        botonReiniciar.innerText = "Reiniciar Cuestionario";
        botonReiniciar.style.cssText = "padding: 10px 15px; background: #007BFF; color: white; border: none; border-radius: 4px; cursor: pointer; margin-top: 10px;";
        botonReiniciar.onclick = reiniciarQuiz;
        contenedorOpciones.appendChild(botonReiniciar);
    }
}

function verificarRespuesta(seleccionada) {

    const actual = preguntas[preguntaActual];
    const resultadoDiv = document.getElementById('resultado-quiz');

    if (seleccionada === actual.respuesta) {
        puntaje++;
        resultadoDiv.style.color = "green";
        resultadoDiv.innerText = "¡Correcto!";
    } else {
        resultadoDiv.style.color = "red";
        resultadoDiv.innerText = "Incorrecto.";
    }

    preguntaActual++;
    
    setTimeout(cargarPregunta, 1000);
}

function reiniciarQuiz() {
    preguntaActual = 0;
    puntaje = 0;
    document.getElementById('resultado-quiz').style.color = "black";
    cargarPregunta();
}

window.onload = function() {
    cargarPregunta();
};