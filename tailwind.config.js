import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
<<<<<<< HEAD
                sans: ['Plus Jakarta Sans', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Brand gradient drgEkspedisi: hijau (asal/pickup) -> biru (tujuan/delivered)
                brand: {
                    50: '#eefdf6',
                    100: '#d5f9e7',
                    200: '#adf1d1',
                    300: '#74e3b3',
                    400: '#3ecd93',
                    500: '#18b378', // hijau utama
                    600: '#0f9563',
                    700: '#107852',
                    800: '#125f43',
                    900: '#114e39',
                },
                transit: {
                    50: '#eef7ff',
                    100: '#d9ecff',
                    200: '#bcdfff',
                    300: '#8ecbff',
                    400: '#59acff',
                    500: '#3389fd', // biru utama
                    600: '#1c6cf2',
                    700: '#1857de',
                    800: '#1a47b3',
                    900: '#1b3e8c',
                },
            },
            backgroundImage: {
                'brand-gradient': 'linear-gradient(135deg, #18b378 0%, #3389fd 100%)',
                'brand-gradient-soft': 'linear-gradient(135deg, #eefdf6 0%, #eef7ff 100%)',
=======
                sans: ['Plus Jakarta Sans', 'Inter', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                brand: {
                    50: '#ecfdf5',
                    100: '#d1fae5',
                    200: '#a7f3d0',
                    300: '#6ee7b7',
                    400: '#34d399',
                    500: '#10b981',
                    600: '#059669',
                    700: '#047857',
                    800: '#065f46',
                    900: '#064e3b',
                },
                transit: {
                    50: '#ecfeff',
                    100: '#cffafe',
                    200: '#a5f3fc',
                    300: '#67e8f9',
                    400: '#22d3ee',
                    500: '#06b6d4',
                    600: '#0891b2',
                    700: '#0e7490',
                    800: '#155e75',
                    900: '#164e63',
                },
                surface: {
                    DEFAULT: '#0a0f1e',
                    light: '#0f172a',
                    lighter: '#1e293b',
                },
            },
            backgroundImage: {
                'brand-gradient': 'linear-gradient(135deg, #10b981 0%, #06b6d4 100%)',
                'brand-gradient-soft': 'linear-gradient(135deg, rgba(16, 185, 129, 0.08) 0%, rgba(6, 182, 212, 0.06) 100%)',
                'dark-grid': 'radial-gradient(circle, rgba(52, 211, 153, 0.06) 1px, transparent 1px)',
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
            },
        },
    },
    plugins: [],
};
