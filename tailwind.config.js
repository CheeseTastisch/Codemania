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
                    '50': 'rgb(var(--color-accent-50))',
                    '100': 'rgb(var(--color-accent-100))',
                    '200': 'rgb(var(--color-accent-200))',
                    '300': 'rgb(var(--color-accent-300))',
                    '400': 'rgb(var(--color-accent-400))',
                    '500': 'rgb(var(--color-accent-500))',
                    '600': 'rgb(var(--color-accent-600))',
                    '700': 'rgb(var(--color-accent-700))',
                    '800': 'rgb(var(--color-accent-800))',
                    '900': 'rgb(var(--color-accent-900))'
                }
            },
            backgroundColor: {
                'accent': {
                    '50': 'rgb(var(--color-accent-50) / var(--tw-bg-opacity, 1))',
                    '100': 'rgb(var(--color-accent-100) / var(--tw-bg-opacity, 1))',
                    '200': 'rgb(var(--color-accent-200) / var(--tw-bg-opacity, 1))',
                    '300': 'rgb(var(--color-accent-300) / var(--tw-bg-opacity, 1))',
                    '400': 'rgb(var(--color-accent-400) / var(--tw-bg-opacity, 1))',
                    '500': 'rgb(var(--color-accent-500) / var(--tw-bg-opacity, 1))',
                    '600': 'rgb(var(--color-accent-600) / var(--tw-bg-opacity, 1))',
                    '700': 'rgb(var(--color-accent-700) / var(--tw-bg-opacity, 1))',
                    '800': 'rgb(var(--color-accent-800) / var(--tw-bg-opacity, 1))',
                    '900': 'rgb(var(--color-accent-900) / var(--tw-bg-opacity, 1))'
                }
            },
            borderColor: {
                'accent': {
                    '50': 'rgb(var(--color-accent-50) / var(--tw-border-opacity, 1))',
                    '100': 'rgb(var(--color-accent-100) / var(--tw-border-opacity, 1))',
                    '200': 'rgb(var(--color-accent-200) / var(--tw-border-opacity, 1))',
                    '300': 'rgb(var(--color-accent-300) / var(--tw-border-opacity, 1))',
                    '400': 'rgb(var(--color-accent-400) / var(--tw-border-opacity, 1))',
                    '500': 'rgb(var(--color-accent-500) / var(--tw-border-opacity, 1))',
                    '600': 'rgb(var(--color-accent-600) / var(--tw-border-opacity, 1))',
                    '700': 'rgb(var(--color-accent-700) / var(--tw-border-opacity, 1))',
                    '800': 'rgb(var(--color-accent-800) / var(--tw-border-opacity, 1))',
                    '900': 'rgb(var(--color-accent-900) / var(--tw-border-opacity, 1))'
                }
            },
            textColor: {
                'accent': {
                    '50': 'rgb(var(--color-accent-50) / var(--tw-text-opacity, 1))',
                    '100': 'rgb(var(--color-accent-100) / var(--tw-text-opacity, 1))',
                    '200': 'rgb(var(--color-accent-200) / var(--tw-text-opacity, 1))',
                    '300': 'rgb(var(--color-accent-300) / var(--tw-text-opacity, 1))',
                    '400': 'rgb(var(--color-accent-400) / var(--tw-text-opacity, 1))',
                    '500': 'rgb(var(--color-accent-500) / var(--tw-text-opacity, 1))',
                    '600': 'rgb(var(--color-accent-600) / var(--tw-text-opacity, 1))',
                    '700': 'rgb(var(--color-accent-700) / var(--tw-text-opacity, 1))',
                    '800': 'rgb(var(--color-accent-800) / var(--tw-text-opacity, 1))',
                    '900': 'rgb(var(--color-accent-900) / var(--tw-text-opacity, 1))'
                }
            },
            ringColor: {
                'accent': {
                    '50': 'rgb(var(--color-accent-50) / var(--tw-ring-opacity, 1))',
                    '100': 'rgb(var(--color-accent-100) / var(--tw-ring-opacity, 1))',
                    '200': 'rgb(var(--color-accent-200) / var(--tw-ring-opacity, 1))',
                    '300': 'rgb(var(--color-accent-300) / var(--tw-ring-opacity, 1))',
                    '400': 'rgb(var(--color-accent-400) / var(--tw-ring-opacity, 1))',
                    '500': 'rgb(var(--color-accent-500) / var(--tw-ring-opacity, 1))',
                    '600': 'rgb(var(--color-accent-600) / var(--tw-ring-opacity, 1))',
                    '700': 'rgb(var(--color-accent-700) / var(--tw-ring-opacity, 1))',
                    '800': 'rgb(var(--color-accent-800) / var(--tw-ring-opacity, 1))',
                    '900': 'rgb(var(--color-accent-900) / var(--tw-ring-opacity, 1))'
                }
            }
        },
  },
    plugins: [
        require('flowbite/plugin')
    ],
    darkMode: 'class'
}
