const defaultTheme = require('tailwindcss/defaultTheme')

/** @type {import('tailwindcss').Config} */
module.exports = {
    daisyui: {
        themes: [
            {
                mytheme: {
                    "primary": "#847efa",
                    "secondary": "#ff8f6b",
                    "accent": "#6a6982",
                    "neutral": "#2f2b43",
                    "base-100": "#2a263e",
                    "info": "#3abff8",
                    "success": "#d1f7ea",
                    "warning": "#fbd8d8",
                    "error": "#ef4444",
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
                nunito: ['Nunito']
            },

            colors: {
                dark: {
                    'eval-0': '#19191d',
                    'eval-1': '#21202a',
                    'eval-2': '#272630',
                    'eval-3': '#3f3d50',
                },
                p: {
                    'green': '#1ad598',
                    'red': '#ec5255'
                }
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require("daisyui")],
}
