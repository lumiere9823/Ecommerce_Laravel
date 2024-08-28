<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>
@livewire('partials.navbar')
    <main class="bg-slate-200 dark:bg-slate-400">
        {{ $slot }}
    </main>
    @livewire('partials.footer')

    @livewireScripts
</body>

</html>
