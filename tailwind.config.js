const plugin = require("tailwindcss/plugin");
const colors = require("tailwindcss/colors");
const { parseColor } = require("tailwindcss/lib/util/color");

/* Converts HEX color to RGB */
const toRGB = (value) => parseColor(value).color.join(" ");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./app/View/Components/**/*.php",
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        extend: {
            flex: {
                '1/0': '1 0 auto',
            },
            colors: {
                'accent': {
                    '50': 'rgb(var(--color-accent-50) / <alpha-value>)',
                    '100': 'rgb(var(--color-accent-100) / <alpha-value>)',
                    '200': 'rgb(var(--color-accent-200) / <alpha-value>)',
                    '300': 'rgb(var(--color-accent-300) / <alpha-value>)',
                    '400': 'rgb(var(--color-accent-400) / <alpha-value>)',
                    '500': 'rgb(var(--color-accent-500) / <alpha-value>)',
                    '600': 'rgb(var(--color-accent-600) / <alpha-value>)',
                    '700': 'rgb(var(--color-accent-700) / <alpha-value>)',
                    '800': 'rgb(var(--color-accent-800) / <alpha-value>)',
                    '900': 'rgb(var(--color-accent-900) / <alpha-value>)',
                    '950': 'rgb(var(--color-accent-950) / <alpha-value>)',
                }
            },
            minWidth: {
                'sm': '24rem',
                'md': '28rem',
                'lg': '32rem',
                'xl': '36rem',
                '2xl': '42rem',
                '3xl': '48rem',
                '4xl': '56rem',
                '5xl': '64rem',
                '6xl': '72rem',
                '7xl': '80rem',
                '8xl': '88rem',
                '9xl': '96rem',
            },
            gridTemplateRows: {
                'variable': 'repeat(var(--rows), minmax(0, 1fr))',
            },
            gridTemplateColumns: {
                'variable': 'repeat(var(--columns), minmax(0, 1fr))',
            }
        },
  },
    plugins: [
        require('flowbite/plugin'),
        plugin(function ({ addBase }) {
            addBase({
                ":root": {
                    "--color-default-50": toRGB(colors.gray[50]),
                    "--color-default-100": toRGB(colors.gray[100]),
                    "--color-default-200": toRGB(colors.gray[200]),
                    "--color-default-300": toRGB(colors.gray[300]),
                    "--color-default-400": toRGB(colors.gray[400]),
                    "--color-default-500": toRGB(colors.gray[500]),
                    "--color-default-600": toRGB(colors.gray[600]),
                    "--color-default-700": toRGB(colors.gray[700]),
                    "--color-default-800": toRGB(colors.gray[800]),
                    "--color-default-900": toRGB(colors.gray[900]),
                    "--color-default-950": toRGB(colors.gray[950]),
                }
            })
        })
    ],
    darkMode: 'class'
}
