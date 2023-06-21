@php(setlocale(LC_ALL, 'de_DE.UTF-8'))
@php(\Carbon\Carbon::setLocale('de'))

<!doctype html>
<html lang="de" @if($alwaysDark ?? false) data-always-dark @elseif($alwaysLight ?? false) data-always-light @endif>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @if($noCookie ?? false)
        <script id="cookieyes" type="text/javascript" src="https://cdn-cookieyes.com/client_data/b4630b9e20f019cf9bfc5ac8/script.js"></script>
    @endif
    <script>
        if (document.documentElement.dataset.alwaysDark !== undefined) document.documentElement.classList.add('dark')
        else if (document.documentElement.dataset.alwaysLight !== undefined) document.documentElement.classList.remove('dark')
        else {
            document.documentElement.classList.remove('dark')
            document.documentElement.classList.remove('party')

            if (document.cookie.includes('theme=dark-party')) document.documentElement.classList.add('dark', 'party')
            else if (document.cookie.includes('theme=dark')) document.documentElement.classList.add('dark')
            else if (document.cookie.includes('theme=party')) document.documentElement.classList.add('party')
        }
    </script>

    @livewireStyles
    @vite('resources/assets/css/app.css')

    <style>
        :root {
            {{ theme()?->getVariablesAttribute() ?? \App\Models\ContestDayTheme::getDefaultVariableAttributes() }}
        }
    </style>

    <link rel="icon"
          type="image/svg+xml"
          href="{{ theme()?->imagePath('logo/dark-text.svg') ?? asset('storage/backup/logo/dark-text.svg') }}"
          media="(prefers-color-scheme: light)">

    <link rel="icon"
          type="image/svg+xml"
          href="{{ theme()?->imagePath('logo/light-text.svg') ?? asset('storage/backup/logo/light-text.svg') }}"
          media="(prefers-color-scheme: dark)">

    @stack('styles')

    <title>Codemania @hasSection('title')| @yield('title') @endif</title>
</head>
<body class="bg-slate-200 dark:bg-slate-800 h-screen dark:text-white selection:bg-accent-200 dark:selection:bg-accent-800">
@hasSection('baseContent')
    @yield('baseContent')
@endif

@livewireScripts
@vite('resources/assets/js/app.js')

@include('layouts.components.base.toast')

<script defer>
    if (document.documentElement.classList.contains('party')) {
        document.querySelectorAll('*').forEach(element => {
            for (let i = 1; i <= 5; i++) element.style.setProperty(`--random-${i}`, Math.random().toString())
        })
    }
</script>

@stack('scripts')
</body>
</html>
