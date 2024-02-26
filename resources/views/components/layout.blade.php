<!-- resources/views/components/layout.blade.php -->
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen font-sans antialiased bg-base-200/50 dark:bg-base-200">
        {{ $slot }}
        <x-toast />
    </body>
</html>