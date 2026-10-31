function convertirMoneda() {
    const montoUSD = document.getElementById('monto-usd').value;
    const resultado = document.getElementById('resultado-conversion');

    if (montoUSD === '' || isNaN(montoUSD)) {
        resultado.innerText = "Por favor, ingresa un número válido.";
        return;
    }
    
    const tipoCambioMXN = 20.0; 
    let totalMXN = montoUSD * tipoCambioMXN;

    resultado.innerText = `${montoUSD} USD equivalen a $${totalMXN.toFixed(2)} MXN`;
}