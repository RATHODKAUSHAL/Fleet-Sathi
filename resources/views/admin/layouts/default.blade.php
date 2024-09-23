<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link href="{{ asset('favicons/favicon.ico') }}" rel="shortcut icon" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <title>Responsive Layout</title>
</head>

<body class="min-h-screen flex flex-col bg-gray-50">

    <div class="flex flex-col md:flex-row flex-grow">
        <!-- Sidebar Section -->
        <aside class="w-full md:w-64 bg-white border-r border-gray-200 dark:border-gray-300 md:flex-shrink-0">
            <div class="p-2">
                <a href="#">
                    <img class="w-40 md:w-60 p-2" src="{{ asset('assets/front/media/logo.svg') }}" alt="Logo">
                </a>
                <button
                    class="absolute md:left-full top-1/2 transform -translate-x-1/2 -translate-y-1/2 rounded-lg border border-gray-200 dark:border-gray-300 bg-gray-100 text-gray-500 hover:text-white transition-all duration-300"
                    id="sidebar_toggle">
                    <i class="ki-filled ki-black-left-line toggle-active:rotate-180 transition-all duration-300"></i>
                </button>
            </div>

            <nav class="space-y-2 p-4">
                <div class="menu-item">
                    <a class="flex items-center gap-2.5 p-2.5 border border-transparent rounded-lg hover:bg-gray-100 dark:hover:bg-gray-900" href="#">
                        <img class="w-5" src="{{ asset('assets/front/media/dashboard.png') }}" alt="Dashboard">
                        <span class="text-sm font-semibold text-gray-700 hover:text-primary">Dashboards</span>
                    </a>
                </div>

                <div class="menu-section pt-4">
                    <span class="text-xs font-semibold text-gray-500 uppercase px-2.5">User</span>
                    <div class="menu-item">
                        <a class="flex items-center gap-2.5 p-2.5 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-900" href="#">
                            <img class="w-5" src="{{ asset('assets/front/media/user.png') }}" alt="User">
                            <span class="text-sm font-semibold text-gray-600">Location</span>
                            <div class="ml-auto flex gap-2">
                                <img class="w-4" src="{{ asset('assets/front/media/add.png') }}" alt="Add">
                                <img class="w-4" src="{{ asset('assets/front/media/minus.png') }}" alt="Minus">
                            </div>
                        </a>
                    </div>
                    {{-- <div class="menu-item">
                        <a class="flex items-center gap-3 p-2 hover:bg-gray-100 dark:hover:bg-gray-900" href="#">
                            <span class="menu-bullet w-1.5 h-1.5 bg-primary rounded-full"></span>
                            <span class="text-sm font-medium text-gray-700 hover:text-primary">City</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="flex items-center gap-3 p-2 hover:bg-gray-100 dark:hover:bg-gray-900" href="#">
                            <span class="text-sm font-medium text-gray-700">States</span>
                        </a>
                    </div> --}}
                </div>

                <div class="menu-section">
                    <div class="menu-item">
                        <a class="flex items-center gap-2.5 p-2.5 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-900" href="#">
                            <img class="w-5" src="{{ asset('assets/front/media/project-manager.png') }}" alt="User">
                            <span class="text-sm font-semibold text-gray-600">User Management</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="flex items-center gap-2.5 p-2.5 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-900" href="#">
                            <img class="w-5" src="{{ asset('assets/front/media/office-building.png') }}" alt="User">
                            <span class="text-sm font-semibold text-gray-600">Company</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="flex items-center gap-2.5 p-2.5 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-900" href="#">
                            <img class="w-5" src="{{ asset('assets/front/media/cityscape.png') }}" alt="User">
                            <span class="text-sm font-semibold text-gray-600">TC City URLs</span>
                        </a>
                    </div>
                </div>
            </nav>
        </aside>

        <!-- Main Content Section -->
        <div class="flex flex-col flex-grow">
            <header class="flex items-center justify-between bg-white shadow-sm z-10 p-4">
                <div class="flex items-center gap-4">
                    <button class="md:hidden">
                        <img class="w-5 h-5" src="{{ asset('assets/front/media/menu.png') }}" alt="Menu">
                    </button>
                </div>

                <div class="flex items-center gap-4">
                    <div class="relative">
                        <button class="flex items-center">
                            <img class="w-8 h-8 rounded-full" src="{{ asset('assets/front/media/profile.png') }}" alt="Profile">
                        </button>
                        <div class="absolute right-0 z-20 hidden bg-white shadow-lg w-48 mt-2 rounded-md">
                            <div class="p-2">
                                <span class="block text-gray-800 font-semibold">Name</span>
                                <span class="block text-gray-500">email@example.com</span>
                            </div>
                            <div class="border-t">
                                <a href="#" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">Public Profile</a>
                                <a href="#" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">Dark Mode</a>
                                <a href="#" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-grow p-6">
                @yield('content')
            </main>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const profileButton = document.querySelector('.menu-toggle');
            const dropdownMenu = document.querySelector('.menu-dropdown');
    
            // Toggle dropdown menu visibility
            profileButton.addEventListener('click', () => {
                dropdownMenu.classList.toggle('hidden');
            });
    
            // Close dropdown if clicked outside
            document.addEventListener('click', (event) => {
                if (!profileButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.add('hidden');
                }
            });
        });
    </script>
    
</body>

</html>
