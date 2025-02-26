const buscar = document.getElementById('btn-b')
buscar.onclick = async (e) => {
    e.preventDefault()
    const form = document.getElementById('buscador')
    const fd = new FormData(form);
    const respuetahttp = await fetch("../php/datos-cita.php", {
        method: "post",
        body: fd,
    });
    const resultado = await respuetahttp.json();

    document.getElementById("paciente").value = resultado[0]["nombre_paciente"];
    document.getElementById("id_p").value = resultado[0]["ID_expediente"];
    document.getElementById('tel').value = resultado[0]["celular"];
}
const input = document.getElementById('buscador')
const check = document.getElementById('check')

check.addEventListener('click', function(){
    if(this.checked) {
        input.setAttribute("style", "display: none;")
    }else{
        input.removeAttribute("style", "display: flex;")
    }
})
