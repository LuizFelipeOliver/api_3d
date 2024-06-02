<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/three.js'])
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div id="canvas-container"></div>
</body>

</html>
