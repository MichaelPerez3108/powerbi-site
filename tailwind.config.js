import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./src/**/*.{html,js}",
        "./node_modules/tw-elements/dist/js/**/*.js",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./pages/**/*.{js,ts,jsx,tsx}",
        "./components/**/*.{js,ts,jsx,tsx}",
    ],
    plugins: [require("tw-elements/dist/plugin.cjs")],
    darkMode: "class",

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
        colors:{
            'redcs': '#ED1C24',
            'amarillocs':'#fff69b',
            'grisfondo':'#EFEFEF',
            'blanco':'#ffffff',
            'grisoscuro':'#c4c4c4',
            'success':'#1BC174',
            'rojoactivo':'#C6191F',
            'negroclarito':'#4D4D4D',
            'negro':'#000000',
            'azulLink':'#0038FF',
        },
    },

    plugins: [forms],
    
};
