import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans], // Fonte personalizada
            },
            colors: {
                lightBlue: '#A0D8F1', // Azul claro para o fundo
                softGreen: '#A7E9A6', // Verde suave para highlights
                darkGray: '#333333', // Texto em cinza escuro para contraste
                white: '#ffffff', // Branco para elementos
            },
        },
    },

    plugins: [forms], // Para estilizar formulários
};
