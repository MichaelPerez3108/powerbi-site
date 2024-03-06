document.addEventListener('DOMContentLoaded', function() {

    document.addEventListener('click', function (event) {
        const navBar = document.querySelector('[x-data]');
        if (!navBar.contains(event.target)) {
            navBar.__x.$data.openComents = false;
        }
    });

    const prevBtn = document.querySelector(".prev-btn");
    const nextBtn = document.querySelector(".next-btn");
    const container = document.querySelector(".bg-blanco");

    let scrollAmount = 0;
    const cardWidth = container.firstElementChild.offsetWidth;
    const scrollWidth = container.scrollWidth;

    prevBtn.addEventListener("click", function() {
        if (scrollAmount > 0) {
            scrollAmount -= cardWidth;
            container.scrollTo({
                top: 0,
                left: scrollAmount,
                behavior: "smooth"
            });
        }
    });

    nextBtn.addEventListener("click", function() {
        if (scrollAmount < (scrollWidth - container.offsetWidth)) {
            scrollAmount += cardWidth;
            container.scrollTo({
                top: 0,
                left: scrollAmount,
                behavior: "smooth"
            });
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

let defaultTransform = 0;
function goNext() {
    defaultTransform = defaultTransform - 398;
    var slider = document.getElementById("slider");
    if (Math.abs(defaultTransform) >= slider.scrollWidth / 1.7) defaultTransform = 0;
    slider.style.transform = "translateX(" + defaultTransform + "px)";
}
next.addEventListener("click", goNext);
function goPrev() {
    var slider = document.getElementById("slider");
    if (Math.abs(defaultTransform) === 0) defaultTransform = 0;
    else defaultTransform = defaultTransform + 398;
    slider.style.transform = "translateX(" + defaultTransform + "px)";
}
prev.addEventListener("click", goPrev);

