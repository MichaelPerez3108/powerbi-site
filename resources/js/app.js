import axios from 'axios';
import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const obtenerObjetos = async () => {
    const nav = document.getElementById("nav");
    const carpetasDesplegadas = new Map(); // Mapa para almacenar las carpetas desplegadas y sus contenedores

    try {
        const url = "/objects";
        const response = await axios.get(url, { headers: { Accept: 'application/json' } });
        const objetos = response.data;

        // Función recursiva para renderizar objetos y carpetas
        const renderizarObjetos = (objeto, nivel, contenedor) => {
            const icono = objeto.type === 'folder' ? 'fa-folder' : 'fa-chart-column'; //verificamos el tipo para asignar el icono
            const registro = document.createElement('div');
            registro.classList.add('flex', 'items-center', 'w-full', 'p-3', 'rounded-lg', 'text-start', 'text-blanco', 'leading-tight', 'transition-all', 'hover:bg-rojoactivo', 'hover:bg-opacity-80', 'focus:bg-rojoactivo', 'focus:bg-opacity-80', 'active:bg-gray-50', 'active:bg-opacity-80', 'hover:text-blue-900', 'focus:text-blue-900', 'active:text-blue-900', 'outline-none');
            registro.style.paddingLeft = `${nivel * 20}px`;

            // Agregar icono
            const iconoElemento = document.createElement('div');
            iconoElemento.classList.add('flex', 'place-items-start', 'mr-4');
            const iconoSvg = document.createElement('i');
            iconoSvg.classList.add('fa-solid', icono, 'fa-lg');
            iconoSvg.style.color = '#fff69b';
            iconoElemento.appendChild(iconoSvg);
            registro.appendChild(iconoElemento);

            // Agregar nombre del objeto
            const nombreElemento = document.createElement('span');
            nombreElemento.textContent = objeto.name;
            registro.appendChild(nombreElemento);

            // Manejar despliegue del contenido de la carpeta
            if (objeto.type === 'folder') {
                const contenido = objetos.filter(subobjeto => subobjeto.parent_id === objeto.id);
                if (contenido.length > 0) {
                    registro.classList.add('cursor-pointer'); // Cambiar cursor al puntero para indicar que es desplegable
                    registro.addEventListener('click', (event) => {
                        event.stopPropagation(); // Evitar la propagación del evento al hacer clic en el registro
                        if (!registro.dataset.expandido) {
                            const contenidoContainer = document.createElement('div');
                            contenidoContainer.classList.add('ml-6'); // Ajustar la sangría del contenido
                            contenedor.appendChild(contenidoContainer); // Agregar el contenedor de contenido debajo del registro
                            contenido.forEach(subobjeto => renderizarObjetos(subobjeto, nivel + 1, contenidoContainer));
                            registro.dataset.expandido = true;
                            registro.classList.add('bg-gray-700'); // Marcar la carpeta expandida con un tono más oscuro
                            carpetasDesplegadas.set(objeto.id, { registro, contenidoContainer }); // Registrar la carpeta desplegada y su contenedor
                            registro.style.backgroundColor = '#C6191F'; // Cambiar el color de fondo de la carpeta expandida
                        } else {
                            contenedor.removeChild(contenedor.lastChild); // Quitar el contenedor de contenido
                            delete registro.dataset.expandido;
                            registro.classList.remove('bg-gray-700'); // Quitar el marcado de la carpeta expandida
                            carpetasDesplegadas.delete(objeto.id); // Eliminar la carpeta desplegada de la lista
                            registro.style.backgroundColor = ''; // Restablecer el color de fondo de la carpeta
                        }
                    });
                    registro.dataset.id = objeto.id; // Agregar ID para identificar la carpeta
                }
            }

            contenedor.appendChild(registro);
        };

        // Renderizar cada objeto que no tiene parent_id (nivel inicial)
        objetos.forEach(objeto => {
            if (!objeto.parent_id) {
                const contenedor = document.createElement('div');
                nav.appendChild(contenedor); // Agregar el contenedor al elemento principal
                renderizarObjetos(objeto, 0, contenedor);
            }
        });

        // Cerrar todas las carpetas desplegadas al hacer clic en una carpeta padre
        nav.addEventListener('click', () => {
            carpetasDesplegadas.forEach(({ registro, contenidoContainer }, id) => {
                registro.classList.remove('bg-gray-700'); // Quitar el marcado de la carpeta expandida
                delete registro.dataset.expandido;
                registro.style.backgroundColor = ''; // Restablecer el color de fondo de la carpeta
                contenidoContainer.parentNode.removeChild(contenidoContainer); // Quitar el contenedor de contenido
                carpetasDesplegadas.delete(id); // Eliminar la carpeta desplegada de la lista
            });
        });

    } catch (error) {
        console.log(error);
    }
};

obtenerObjetos();
