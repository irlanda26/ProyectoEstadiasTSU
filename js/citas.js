const agendar = document.getElementById('form-cita')

agendar.addEventListener('click', function(){
    window.location.href = "../html/form-cita.php"
})
document.addEventListener('DOMContentLoaded', () => {
    const citas = document.querySelectorAll('.citas')
    citas.forEach(cita => {
            const swish = cita.querySelector('.confirmar')
            const ID_cita = cita.getAttribute('data-id')

            const guardar = localStorage.getItem(`toggleSwitchState-${ID_cita}`)
            if (guardar === 'true') {
                swish.checked = true;
                cita.style.backgroundColor = "#8bd97c";
            } else {
                swish.checked = false;
                cita.style.backgroundColor = "#ef9d9d";
            }

            swish.addEventListener('change', () => {
                localStorage.setItem(`toggleSwitchState-${ID_cita}`, swish.checked)
                if (swish.checked) {
                    cita.style.backgroundColor = "#8bd97c";
                } else {
                    cita.style.backgroundColor = "#ef9d9d";
                }
            })
        })
    const actualizarEstado = (ID_cita, checked) => {
        const cita = document.querySelector(`.citas[data-id="${ID_cita}"]`)
        if (cita) {
            const swish = cita.querySelector('.confirmar')
            swish.checked = checked;
            if (checked) {
                cita.style.backgroundColor = "#8bd97c";
            } else {
                cita.style.backgroundColor = "#ef9d9d";
            }
        }
    }

    window.addEventListener('storage', (event) => {
        if (event.key.startsWith('toggleSwitchState-')) {
            const ID_cita = event.key.replace('toggleSwitchState-', '')
            const checked = event.newValue === 'true';
            actualizarEstado(ID_cita, checked)
        }
    })
})

const buscar = document.getElementById('buscador')

buscar.addEventListener('keyup', function() {
    let mayus = this.value.toUpperCase()
    let expedientes = document.querySelectorAll('#contenedor-citas .citas')

    expedientes.forEach(function(expediente) {
        let nombre = expediente.querySelector('#nombres').textContent
        if (nombre.toUpperCase().indexOf(mayus) > -1) {
            expediente.style.display = "";
        } else {
            expediente.style.display = "none";
        }
    })
})

