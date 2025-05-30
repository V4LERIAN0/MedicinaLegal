const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.js', // <-- Needed if using JS components
    ],

    theme: {
        extend: {
            colors: {
                primary: { DEFAULT: '#0c4a6e' },
                accent: { DEFAULT: '#0ea5e9' },
            },
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('daisyui'), // <-- Added DaisyUI plugin
    ],

    daisyui: {
        themes: ['light'], // <-- Optional: switch to 'light', 'cupcake', etc.
    },
};
