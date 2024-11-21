<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplicación de Almacén')</title>
    <!-- Tailwind CSS desde la CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Configuración personalizada de Tailwind (opcional) -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1E40AF', // Ejemplo: Azul oscuro personalizado
                    },
                },
            };
        };
    </script>
</head>
<body class="bg-gray-100 text-gray-900">
    <nav class="bg-blue-600 p-4 text-white">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-xl font-bold">Almacén</a>
            <ul class="flex space-x-4">
                <li><a href="{{ route('products.index') }}" class="hover:underline">Productos</a></li>
                <li><a href="#" class="hover:underline">Ventas</a></li>
            </ul>
        </div>
    </nav>
    <main class="container mx-auto py-8">
        @yield('content')
    </main>
</body>
</html>
