@php(setlocale(LC_ALL, 'de_DE.UTF-8'))
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
        else document.documentElement.classList.remove('dark')
    </script>

    @livewireStyles
    @vite('resources/assets/css/app.css')

    <style>
        :root {
            --color-accent-50: {{ theme()?->fifty ?? "var(--color-default-50)"}};
            --color-accent-100: {{ theme()?->hundred ?? "var(--color-default-100)" }};
            --color-accent-200: {{ theme()?->two_hundred ?? "var(--color-default-200)"}};
            --color-accent-300: {{ theme()?->three_hundred ?? "var(--color-default-300)" }};
            --color-accent-400: {{ theme()?->four_hundred ?? "var(--color-default-400)"}};
            --color-accent-500: {{ theme()?->five_hundred ?? "var(--color-default-500)" }};
            --color-accent-600: {{ theme()?->six_hundred ?? "var(--color-default-600)"}};
            --color-accent-700: {{ theme()?->seven_hundred ?? "var(--color-default-700)" }};
            --color-accent-800: {{ theme()?->eight_hundred ?? "var(--color-default-800)"}};
            --color-accent-900: {{ theme()?->nine_hundred ?? "var(--color-default-900)" }};
            --color-accent-950: {{ theme()?->nine_hundred_fifty ?? "var(--color-default-950)" }};
        }
    </style>

    @stack('styles')

    <title>Codemania @hasSection('title')
            | @yield('title')
        @endif</title>
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
