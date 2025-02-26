const crear = document.getElementById('crear')
const form_crear = document.getElementById('contenedor-crear')

crear.addEventListener('click', function(){
    form_crear.setAttribute("style", "display:flex;")
})
function cerrarf() {
    window.location.href="../html/usuarios.php";
}
function borrar(){
    return window.confirm("¿Desea eliminar el usuario?");
}
function cancelarAc() {
document.getElementById("contenedor-agregar").style.display = "none";
}
function cancelarAg() {
document.form_crear.style.display = "none";
}
function mostrarFormulario() {
    document.getElementById("contenedor-actcon").style.display = "block"; 
    document.getElementById("inco").style.display = "none";
}