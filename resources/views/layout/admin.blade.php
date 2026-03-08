<!DOCTYPE html>
<html lang="vi" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Quản trị Hệ thống Khoa học</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gray-50 font-sans antialiased">

    <!-- Navbar fixed -->
    @include('layout.navbar')

    <!-- Wrapper -->
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        @include('layout.sidebar')

        <!-- Main -->
        <main class="flex-1 sm:ml-64 pt-16 bg-gray-100 overflow-y-auto">
            @yield('content')
        </main>
    </div>

</body>
</html>