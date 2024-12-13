import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      './resources/**/*.blade.php',
      './resources/**/*.js',
      './resources/**/*.vue',
    ],
    theme: {
      extend: {
        colors: {
          primary: {
            DEFAULT: '#B8C1EC', // Azul pastel
            light: '#DCE3F2',   // Azul claro pastel
            dark: '#7A8BAF',    // Azul escuro pastel
          },
          secondary: {
            DEFAULT: '#F5C6C0', // Rosa pastel
            light: '#FCE1DE',   // Rosa claro pastel
            dark: '#CA9B98',    // Rosa escuro pastel
          },
          accent: {
            DEFAULT: '#BEE3DB', // Verde pastel
            light: '#E4F7F2',   // Verde claro pastel
            dark: '#8AB8AD',    // Verde escuro pastel
          },
          neutral: {
            DEFAULT: '#F3F4F6', // Cinza pastel
            dark: '#D1D5DB',    // Cinza claro pastel
            darker: '#9CA3AF',  // Cinza escuro pastel
          },
          purple: {
            DEFAULT: '#C8A2D4', // Roxo pastel
            light: '#E2C9E8',   // Roxo claro pastel
            dark: '#A37CA4',    // Roxo escuro pastel
          },
          red: {
            DEFAULT: '#F2A7A1', // Vermelho pastel
            light: '#F8D0D0',   // Vermelho claro pastel
            dark: '#D18B8A',    // Vermelho escuro pastel
          },
          yellow: {
            DEFAULT: '#F3E2A9', // Amarelo pastel
            light: '#F9F4D6',   // Amarelo claro pastel
            dark: '#D1C17D',    // Amarelo escuro pastel
          },
        },
      },
    },  

    plugins: [forms],
};
