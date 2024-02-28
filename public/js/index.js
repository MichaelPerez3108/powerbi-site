

document.addEventListener('DOMContentLoaded', function() {

    let boton = document.getElementById('boton');
    let desplegar = document.getElementById('desplegar');
    let cerrar = document.getElementById('cerrar');

    boton.addEventListener("click", function() {
        desplegar.classList.toggle("cierre");
        cerrar.classList.toggle("cierre");
    });

    document.addEventListener('click', function (event) {
        const navBar = document.querySelector('[x-data]');
        if (!navBar.contains(event.target)) {
            navBar.__x.$data.openComents = false;
        }
    });
});

let modal = document.getElementById("modal");
function modalHandler(val) {
    if (val) {
        fadeIn(modal);
    } else {
        fadeOut(modal);
    }
}
function fadeOut(el) {
    el.style.opacity = 1;
    (function fade() {
        if ((el.style.opacity -= 0.1) < 0) {
            el.style.display = "none";
        } else {
            requestAnimationFrame(fade);
        }
    })();
}
function fadeIn(el, display) {
    el.style.opacity = 0;
    el.style.display = display || "flex";
    (function fade() {
        let val = parseFloat(el.style.opacity);
        if (!((val += 0.2) > 1)) {
            el.style.opacity = val;
            requestAnimationFrame(fade);
        }
    })();
}
