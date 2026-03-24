<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Llista de la compra') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            margin: 0;
            font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col items-center justify-center px-4">
        <!-- Tarjeta principal -->
        <div class="w-full max-w-lg rounded-xl shadow-md px-8 py-6 border border-gray-200"
             style="background: #f7fafc;">
            <!-- Contenido dinámico: login / register -->
            <div class="space-y-4">
                {{ $slot }}
            </div>

            <!-- SSO -->
            <div class="mt-6 border-t pt-4 text-center">
                <a href="/google-auth/redirect"
                   class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-gray-600 border border-gray-300 rounded-md hover:bg-gray-50 transition">
                    Inicia sessió amb Google
                </a>
            </div>
        </div>

        <!-- Footer -->
        <footer class="mt-4 text-xs text-gray-400 text-center">
            © {{ date('Y') }} {{ config('app.name') }} · Tots els drets reservats.
        </footer>
    </div>
</body>
</html>

