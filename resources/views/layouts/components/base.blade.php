@php(\Carbon\Carbon::setLocale('de'))

<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script>
        if (document.cookie.includes('theme=dark')) document.documentElement.classList.add('dark')
        else if (document.cookie.includes('theme=light')) document.documentElement.classList.remove('dark')
        else if (window.matchMedia('(prefers-color-scheme: dark)').matches) document.documentElement.classList.add('dark')
        else document.documentElement.classList.remove('dark')
    </script>

    @livewireStyles
    @vite('resources/assets/css/app.css')

    <style>
        :root {
            --color-accent-50: {{ day()->fifty }};
            --color-accent-100: {{ day()->hundred }};
            --color-accent-200: {{ day()->two_hundred }};
            --color-accent-300: {{ day()->three_hundred }};
            --color-accent-400: {{ day()->four_hundred }};
            --color-accent-500: {{ day()->five_hundred }};
            --color-accent-600: {{ day()->six_hundred }};
            --color-accent-700: {{ day()->seven_hundred }};
            --color-accent-800: {{ day()->eight_hundred }};
            --color-accent-900: {{ day()->nine_hundred }};
        }
    </style>

    @stack('styles')

    <title>Codemania @hasSection('title') | @yield('title')@endif</title>
</head>
<body class="bg-slate-200 dark:bg-slate-800 h-screen dark:text-white">
@hasSection('baseContent')
    @yield('baseContent')
@endif

@livewireScripts
@vite('resources/assets/js/app.js')

@include('layouts.components.base.toast')

@stack('scripts')
</body>
</html>
