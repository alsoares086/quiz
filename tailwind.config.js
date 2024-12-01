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
            DEFAULT: '#B8C1EC', 
            light: '#DCE3F2',   
            dark: '#7A8BAF',    
          },
          secondary: {
            DEFAULT: '#F5C6C0', 
            light: '#FCE1DE', 
            dark: '#CA9B98', 
          },
          accent: {
            DEFAULT: '#BEE3DB', 
            light: '#E4F7F2',
            dark: '#8AB8AD', 
          },
          neutral: {
            DEFAULT: '#F3F4F6',
            dark: '#D1D5DB',   
            darker: '#9CA3AF',  
          },
        },
      },
    },  

    plugins: [forms],
};
