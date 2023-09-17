const defaultTheme = require('tailwindcss/defaultTheme')

/** @type {import('tailwindcss').Config} */
module.exports = {
    daisyui: {
        themes: [
            {
                mytheme: {
                    "primary": "#f1765b",
                    "secondary": "#f05d9e",
                    "accent": "#4e4b5f",
                    "neutral": "#2f2b43",
                    "base-100": "#2a263e",
                    "info": "#3abff8",
                    "success": "#36d399",
                    "warning": "#fbbd23",
                    "error": "#f87272",
                },
            },
        ],
    },
    darkMode: 'class',

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },

            colors: {
                dark: {
                    'eval-0': '#2a263e',
                    'eval-1': '#2f2b43',
                    'eval-2': '#2f2b43',
                    'eval-3': '#4e4b5f',
                },
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require("daisyui")],
}
