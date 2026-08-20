<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>

    @vite('resources/css/app.css')
</head>
<body class="w-screen h-screen bg-slate-50 flex flex-col justify-between" >
<x-header />

{{ $slot }}

<x-footer />
</body>
</html>