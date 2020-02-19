<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Landing Page</title>
    </head>

    <body>
        <p>Task One: dump out cached API data.</p>
        {{ print_r($apiData) }}
    </body>
</html>
