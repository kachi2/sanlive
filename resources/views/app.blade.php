<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title inertia></title>
        <link href="https://fonts.googleapis.com/css?family=Jost:400,500,600,700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com/">
        <link href="" rel="shortcut icon" type="image/png">
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>

  <body>
        @inertia
    </body>
</html>
