const buscar = document.getElementById('buscador')

buscar.addEventListener('keyup', function() {
    let mayus = this.value.toUpperCase()
    let expedientes = document.querySelectorAll('#contenedor-principal .contenedor-expe')

    expedientes.forEach(function(expediente) {
        let nombre = expediente.querySelector('.nombre').textContent
        if (nombre.toUpperCase().indexOf(mayus) > -1) {
            expediente.style.display = "";
        } else {
            expediente.style.display = "none";
        }
    })
})
