<!DOCTYPE html>
<html lang="en" class="h-full" data-theme="true" data-theme-mode="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link href="https://keenthemes.com/metronic" rel="canonical" />
    <link href="{{ asset('favicons/favicon.ico') }}" rel="shortcut icon" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <title>Metronic - Tailwind CSS</title>
</head>

<body class="min-h-screen flex flex-col bg-white" data-drawer="true"
    data-drawer-class="drawer drawer-start top-0 bottom-0" data-drawer-enable="true|lg:false">
    <div class="flex flex-col md:flex-row flex-grow">
        <!-- Sidebar Section -->
        <aside class="md:w-64 bg-white border-r border-gray-200  dark:border-gray-300 md:flex-shrink-0">
            <div>
                <a href="{{ route('admin.dashboard') }}">
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
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center gap-2.5 p-2.5 border border-transparent rounded-lg hover:bg-gray-100 dark:hover:bg-gray-200">
                        <img class="w-5" src="{{ asset('assets/front/media/dashboard.png') }}" alt="Dashboard">
                        <span class="text-xs font-semibold text-gray-700 hover:text-primary">Dashboards</span>
                    </a>
                </div>
                <div>
                    <span class="text-xs  font-semibold text-gray-500 uppercase px-2.5">User</span>
                </div>
                <div class="menu-section pt-2">
                    <div class="menu-item">
                        <a id="locationToggle"
                            class="flex items-center gap-2.5 p-2.5 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-200 cursor-pointer">
                            <img class="w-5" src="{{ asset('assets/front/media/user.png') }}" alt="User">
                            <span class="text-xs font-semibold text-gray-600 active:text-blue-800">Location</span>
                            <div class="ml-auto flex gap-2">
                                <img id="addIcon" class="w-4" src="{{ asset('assets/front/media/add.png') }}"
                                    alt="Add">
                                <img id="minusIcon" class="w-4 hidden" src="{{ asset('assets/front/media/minus.png') }}"
                                    alt="Minus">
                            </div>
                        </a>
                    </div>
                    <!-- Hidden menu items for City and States -->
                    <div id="locationItems" class="hidden border-l ml-4 border-gray-100">
                        <div class="menu-item active:text-blue-800">
                            <a href="{{ route('admin.cities.index') }}"
                                class="flex items-center gap-3 p-2 hover:bg-gray-100 dark:hover:bg-gray-200"
                                href="#">
                                <span class="menu-bullet w-1.5 h-1.5 bg-primary rounded-full"></span>
                                <span class="text-xs font-medium text-gray-700   hover:text-primary">City</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="{{ route('admin.states.index') }}"
                                class="flex items-center gap-3 p-2 hover:bg-gray-100 dark:hover:bg-gray-200">
                                <span class="menu-bullet w-1.5 h-1.5 bg-primary rounded-full"></span>
                                <span class="text-xs font-medium text-gray-700 hover:text-primary">States</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="menu-section">
                    <div class="menu-item">
                        <a class="flex items-center gap-2.5 p-2.5 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-200"
                            href="{{ route('admin.users.index') }}">
                            <img class="w-5" src="{{ asset('assets/front/media/project-manager.png') }}"
                                alt="User">
                            <span class="text-xs font-semibold text-gray-600">User Management</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="flex items-center gap-2.5 p-2.5 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-200"
                            href="{{ route('admin.company.index') }}">
                            <img class="w-5" src="{{ asset('assets/front/media/office-building.png') }}"
                                alt="User">
                            <span class="text-xs font-semibold text-gray-600">Company</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="flex items-center gap-2.5 p-2.5 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-200"
                            href="{{ route('admin.tc-city-url.index') }}">
                            <img class="w-5" src="{{ asset('assets/front/media/cityscape.png') }}" alt="User">
                            <span class="text-xs font-semibold text-gray-600">TC City URLs</span>
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
                        <button id="profileButton" class="flex items-center focus:outline-none">
                            <img class="w-9 h-9 border-2 border-green-600 rounded-full"
                                src="{{ asset('assets/front/media/profile.png') }}" alt="Profile">
                        </button>
                        <div id="dropdownMenu"
                            class="absolute border bg-gray-50 p-3 right-0 z-20 hidden shadow-lg w-64 mt-2 rounded-md">
                            <div class="py-2 p-2 flex flex-row">
                                <div>
                                    <img class="w-8 h-8 border-2 border-green-600 rounded-full"
                                        src="{{ asset('assets/front/media/profile.png') }}" alt="Profile">
                                </div>
                                <div class="pl-4">
                                    <span
                                        class="block text-gray-800 text-sm font-semibold">{{ auth()->user()->first_name }}</span>
                                    <span
                                        class="block text-gray-500 font-semibold text-sm">{{ auth()->user()->email }}</span>
                                </div>
                                <div>
                                    <button
                                        class="border  text-[10px] border-blue-500 text-blue-700 bg-blue-100 rounded-md w-8">
                                        Pro
                                    </button>
                                </div>
                            </div>
                            <div class="border-t ">
                                <div class="flex flex-row border-b py-3 border-gray-200">
                                    <div class="px-4 py-2">
                                        <img class="w-6 h-6 rounded-full"
                                            src="{{ asset('assets/front/media/User.png') }}" alt="Profile">
                                    </div>
                                    <a href="#"
                                        class="block px-2 py-2 font-semibold text-sm text-gray-600 hover:bg-gray-100">Public
                                        Profile</a>
                                </div>
                                <div class="flex flex-row py-2 menu-link">
                                    <div class="px-4 py-2">
                                        <img class="w-6 h-6 rounded-full"
                                            src="{{ asset('assets/front/media/moon_light.png') }}" alt="Profile">
                                    </div>
                                    <span
                                        class="block px-2 py-2 font-semibold text-sm text-gray-600 hover:bg-gray-100">Dark
                                        Mode</span>
                                    <label class="switch switch-sm">
                                        <input data-theme-state="dark" data-theme-toggle="true" name="check"
                                            type="checkbox" value="1">
                                        </input>
                                    </label>

                                </div>
                                <div class="items-center justify-center flex">
                                    <button class="bg-gray-100 rounded-md border m-3">
                                        <a href="{{ route('admin.auth.logout') }}"
                                            class="block w-52 px-2 py-1 text-gray-600 text-sm hover:shadow-lg">Log
                                            out</a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <main class="flex-grow p-6 bg-white">
                @yield('content')
            </main>
        </div>
    </div>
    <script>
        document.getElementById('profileButton').addEventListener('click', function() {
            const dropdownMenu = document.getElementById('dropdownMenu');
            dropdownMenu.classList.toggle('hidden'); // Toggle the 'hidden' class
        })


        document.getElementById('locationToggle').addEventListener('click', function() {
            const locationItems = document.getElementById('locationItems');
            const addIcon = document.getElementById('addIcon');
            const minusIcon = document.getElementById('minusIcon');

            // Toggle visibility of City and States items
            locationItems.classList.toggle('hidden');

            // Toggle between add and minus icons
            addIcon.classList.toggle('hidden');
            minusIcon.classList.toggle('hidden');
        })

        const defaultThemeMode = 'light'; // light|dark|system
        let themeMode;

        if (document.documentElement) {
            if (localStorage.getItem('theme')) {
                themeMode = localStorage.getItem('theme');
            } else if (document.documentElement.hasAttribute('data-theme-mode')) {
                themeMode = document.documentElement.getAttribute('data-theme-mode');
            } else {
                themeMode = defaultThemeMode;
            }

            if (themeMode === 'system') {
                themeMode = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
            }

            document.documentElement.classList.add(themeMode);
        }
    </script>
    <script src="{{ asset('assets/admin/js/core.bundle.js') }}"></script>
    @vite(['resources/js/admin/admin.app.js'], 'build/admin')
    @yield('page-script')
</body>

</html>
