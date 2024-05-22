<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEMA FARMACIA - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Sidebar -->
    <div class="h-screen w-64 bg-gray-800 text-gray-100 fixed top-0 left-0 overflow-y-auto ">
        <div class="p-10">
            <h class="text-lg font-">SISTEMA FARMACIA</h>
            <!-- Add your sidebar menu items here aqui AQUI -->
            <ul class="mt-4">
                <li><a href="{{route('productos.create')}}" class="block py-2 px-4 text-white hover:bg-gray-700">Agregar Productos</a></li>
                <li><a href="{{route('productos.index')}}" class="block py-2 px-4 text-white hover:bg-gray-700">Liasta de roductos</a></li>
                <li><a href="{{route('lotes.index')}}" class="block py-2 px-4 text-white hover:bg-gray-700">Lotes</a></li>
                <!-- Add more menu items as needed -->
            </ul>
        </div>
    </div>

    <!-- Content Area -->
    <div class="ml-64 p-4 "> <!-- ml-64 to offset the sidebar width -->
        <!-- Header -->
        <header class="bg-white shadow-md p-4 mb-4 hidden">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-lg font-semibold">@yield('pageTitle')</h2>
                </div>
                <div>
                    <!-- Add any header actions or components here -->
                </div>
            </div>
        </header>

        <!-- Main Content Area -->
        <div class="bg-white p-6 shadow-md">
            @yield('content')

        </div>
    </div>

</body>
</html>
