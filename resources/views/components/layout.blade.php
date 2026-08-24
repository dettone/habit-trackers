<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>

    @fonts
    @vite('resources/css/app.css')
</head>
<body class="flex min-h-screen flex-col bg-slate-50 font-sans text-slate-900 antialiased selection:bg-brand-100">
<x-header />

<main class="flex-1">
    {{ $slot }}
</main>

<x-footer />
</body>
</html>
