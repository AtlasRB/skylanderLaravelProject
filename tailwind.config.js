import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/views/**/*.js',
        './resources/views/**/*.vue',
    ],

    safelist: [
        'text-5xl',
        'md:text-5xl',
        'lg:text-5xl',
        'xl:text-5xl',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                'faded-full-faded': 'linear-gradient(to right, transparent, rgba(255,255,255,0.8) 20%, rgba(255,255,255,0.6) 80%, transparent)',
            }
        },
    },

    plugins: [forms],
};
