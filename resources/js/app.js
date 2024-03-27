import axios from "axios";
import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

const obtenerObjetos = async () => {
    const nav = document.getElementById("nav");
    const carpetasDesplegadas = new Map(); // Mapa para almacenar las carpetas desplegadas y sus contenedores

    try {
        const url = "/objects";
        const response = await axios.get(url, {
            headers: { Accept: "application/json" },
        });
        const objetos = response.data;

        // Ordenar objetos por tipo y por la presencia de contenido en las carpetas
        objetos.sort((a, b) => {
            // Primero, ordenar por tipo
            if (a.type !== b.type) {
                return a.type === "folder" ? -1 : 1;
            }
            // Si son del mismo tipo, ordenar las carpetas primero si tienen contenido
            if (a.type === "folder") {
                const contenidoA = objetos.filter(
                    (objeto) => objeto.parent_id === a.id
                );
                const contenidoB = objetos.filter(
                    (objeto) => objeto.parent_id === b.id
                );
                return contenidoB.length - contenidoA.length;
            }
            return 0;
        });

        // Función recursiva para renderizar objetos y carpetas
        const renderizarObjetos = (objeto, nivel, contenedor) => {
            const registro = document.createElement("div");
            registro.classList.add(
                "flex",
                "items-center",
                "w-full",
                "p-3",
                "rounded-lg",
                "text-start",
                "text-blanco",
                "leading-tight",
                "transition-all",
                "hover:bg-rojoactivo",
                "hover:bg-opacity-80",
                "focus:bg-rojoactivo",
                "focus:bg-opacity-80",
                "active:bg-gray-50",
                "active:bg-opacity-80",
                "hover:text-blue-900",
                "focus:text-blue-900",
                "active:text-blue-900",
                "outline-none"
            );
            registro.style.paddingLeft = `${nivel * 20}px`;

            // Agregar icono
            const iconoElemento = document.createElement("div");
            iconoElemento.classList.add(
                "flex",
                "place-items-start",
                "ml-4",
                "mr-2"
            );
            const iconoSvg = document.createElement("i");
            const icono =
                objeto.type === "folder" ? "fa-folder" : "fa-chart-column";
            iconoSvg.classList.add("fa-solid", icono, "fa-lg");
            iconoSvg.style.color = "#fff69b";
            iconoElemento.appendChild(iconoSvg);
            registro.appendChild(iconoElemento);

            // Agregar nombre del objeto
            if (objeto.type === "report") {
                const botonElemento = document.createElement("button");
                botonElemento.classList.add(
                    "border-0",
                    "bg-transparent",
                    "cursor-pointer",
                    "focus:outline-none"
                );
                botonElemento.textContent = objeto.name;
                botonElemento.addEventListener("click", () => {
                    window.location.href = `/objects/${objeto.id}`;
                });
                registro.appendChild(botonElemento);
            } else {
                const nombreElemento = document.createElement("span");
                nombreElemento.textContent = objeto.name;
                registro.appendChild(nombreElemento);
            }

            contenedor.appendChild(registro);

            // Manejar despliegue del contenido de la carpeta
            if (objeto.type === "folder") {
                const contenido = objetos.filter(
                    (subobjeto) => subobjeto.parent_id === objeto.id
                );
                if (contenido.length > 0) {
                    registro.classList.add("cursor-pointer"); // Cambiar cursor al puntero para indicar que es desplegable
                    registro.addEventListener("click", (event) => {
                        event.stopPropagation(); // Evitar la propagación del evento al hacer clic en el registro
                        if (!registro.dataset.expandido) {
                            const contenidoContainer =
                                document.createElement("div");
                            contenidoContainer.classList.add("ml-2"); // Ajustar la sangría del contenido
                            contenedor.appendChild(contenidoContainer); // Agregar el contenedor de contenido debajo del registro
                            contenido.forEach((subobjeto) =>
                                renderizarObjetos(
                                    subobjeto,
                                    nivel + 1,
                                    contenidoContainer
                                )
                            );
                            registro.dataset.expandido = true;
                            registro.classList.add("bg-gray-700"); // Marcar la carpeta expandida con un tono más oscuro
                            carpetasDesplegadas.set(objeto.id, {
                                registro,
                                contenidoContainer,
                            }); // Registrar la carpeta desplegada y su contenedor
                            registro.style.backgroundColor = "#C6191F"; // Cambiar el color de fondo de la carpeta expandida
                        } else {
                            contenedor.removeChild(contenedor.lastChild); // Quitar el contenedor de contenido
                            delete registro.dataset.expandido;
                            registro.classList.remove("bg-gray-700"); // Quitar el marcado de la carpeta expandida
                            carpetasDesplegadas.delete(objeto.id); // Eliminar la carpeta desplegada de la lista
                            registro.style.backgroundColor = ""; // Restablecer el color de fondo de la carpeta
                        }
                    });
                    registro.dataset.id = objeto.id; // Agregar ID para identificar la carpeta
                }
            }
        };

        // Renderizar objetos y carpetas
        objetos.forEach((objeto) => {
            if (!objeto.parent_id) {
                const contenedor = document.createElement("div");
                nav.appendChild(contenedor); // Agregar el contenedor al elemento principal
                renderizarObjetos(objeto, 0, contenedor);
            }
        });

        // Cerrar todas las carpetas desplegadas al hacer clic en una carpeta padre
        nav.addEventListener("click", () => {
            carpetasDesplegadas.forEach(
                ({ registro, contenidoContainer }, id) => {
                    registro.classList.remove("bg-gray-700"); // Quitar el marcado de la carpeta expandida
                    delete registro.dataset.expandido;
                    registro.style.backgroundColor = ""; // Restablecer el color de fondo de la carpeta
                    contenidoContainer.parentNode.removeChild(
                        contenidoContainer
                    ); // Quitar el contenedor de contenido
                    carpetasDesplegadas.delete(id); // Eliminar la carpeta desplegada de la lista
                }
            );
        });
    } catch (error) {
        console.log(error);
    }
};

obtenerObjetos();
