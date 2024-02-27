

document.addEventListener('DOMContentLoaded', function() {
    // Tu código JavaScript aquí
    let boton = document.getElementById('apertura');
    let icono = document.getElementById('icono');
    let cierre = document.getElementById('cierre');

    boton.addEventListener("click", function() {

        if(cierre.style.display == 'none'){
            icono.classList.add("cierre");
            cierre.classList.remove("cierre");
        }else{
            cierre.classList.add("cierre");
            icono.classList.remove("cierre");
        }
    });
});

