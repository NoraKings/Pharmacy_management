<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'HHH Pharmacy') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset
        
            <div class="min-h-screen flex">    
            
                <aside class="w-64 bg-white shadow-lg hidden md:block">
                    <div class="p-4 text-xl font-bold border-b">
                        🏥 Pharmacy
                    </div>
                    <nav class="mt-4">
                        <ul>
                            <li class="px-4 py-2 hover:bg-gray-100">
                                <a href="{{ route('dashboard') }}" class="block">Dashboard</a>
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-100">
                                <a href="{{ route('patients.index') }}" class="block">Patients</a>
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-100">
                                <a href="{{ route('drugs.index') }}" class="block">Drugs</a>
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-100">
                                <a href="{{ route('suppliers.index') }}" class="block">Suppliers</a>
                            </li>
                        </ul>
                    </nav>
                </aside>

    
            <!-- Page Content -->
                <main class="flex-1 p-6">
                    <div class="container mx-auto">
                            <x-alert />
                            {{ $slot }}
                    </div>
                </main>
            </div>
        </div>
        <script>
            function toggleSidebar() {
                document.querySelector('aside').classList.toggle('hidden');
            }
        </script>
        
        <footer>
            <p>&copy; {{date('Y')}} HHH Pharmacy</p>
        </footer>
    </body>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Select the login success message div
        const loginMessage = document.querySelector('.p-6.text-gray-900');
        
        if (loginMessage) {
            // Set timeout to hide it after 3 seconds (3000 ms)
            setTimeout(() => {
                loginMessage.style.transition = "opacity 0.5s ease";
                loginMessage.style.opacity = "0";

                // Remove from DOM after fade-out
                setTimeout(() => loginMessage.remove(), 500);
            }, 3000);
        }
    });
</script>

</html>
