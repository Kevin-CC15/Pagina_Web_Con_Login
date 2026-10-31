const pantalla = document.getElementById('pantalla-calc');

function agregarValor(valor) {
    pantalla.value += valor;
}

function limpiarCalc() {
    pantalla.value = '';
}

function calcularResultado() {
    try {
        pantalla.value = eval(pantalla.value);
    } catch (error) {
        pantalla.value = 'Error';
    }
}