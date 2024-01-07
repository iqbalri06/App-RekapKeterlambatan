<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DataPintar</title>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <link rel="shortcut icon" href="assets/img/icon-logo.png" type="image/x-icon">
    <script src="{{ URL::asset('assets/js/custom.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        @font-face {
            font-family: 'Ubuntu';
            src: url('{{ asset('Ubuntu-Reguler.ttf') }}') format('truetype');
        }

        body {
            font-family: Ubuntu;
        }
    </style>
</head>

<body>
    <nav class="fixed top-0 z-50 w-full bg-yellow-500 border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="px-4 py-3 lg:px-8 lg:pl-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <!-- Mobile Sidebar Toggle Button -->
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                        aria-controls="logo-sidebar" type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
    
                    <!-- Logo and Brand Name -->
                    <a href="#" class="flex ms-2 md:me-24">
                        <img src="{{ URL::asset('assets/img/icon-logo.png') }}" class="h-12 me-3" alt="FlowBite Logo" />
                        <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white" style="font-family: 'Bebas Neue', sans-serif;">
                            DataPintar
                        </span>
                    </a>
                </div>
    
                <!-- User Profile Dropdown -->
                <div class="flex items-center">
                    <div class="flex items-center ms-3">
                        <div>
                            <button type="button"
                                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <span class="sr-only">Open user menu</span>
                                <i class="fa-solid fa-user fa-xl text-white relative top-4 w-8 h-8 rounded-full"></i>
                            </button>
                        </div>
    
                        <!-- User Profile Dropdown Content -->
                        <div class="z-50 hidden my-4 text-base list-none bg-gray-200 dark:bg-gray-500 divide-y divide-gray-100 rounded shadow dark:divide-gray-600" id="dropdown-user">
                            <div class="px-4 py-3" role="none">
                                <div class="flex items-center space-x-4">
                                    <div class="h-10 w-10 bg-gray-300 rounded-full overflow-hidden flex-shrink-0 flex items-center justify-center">
                                        <i class="fa-solid fa-user fa-xl text-white"></i>
                                    </div>
                                    <div>
                                        <p class="text-lg font-semibold text-gray-900 dark:text-white">
                                            {{ Auth::user()->name }}
                                        </p>
                                        <p class="text-sm text-gray-500 dark:text-gray-300">
                                            {{ Auth::user()->email }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        
                            <ul class="py-2" role="none">
                                <li>
                                    <a href="{{ route('logout') }}"
                                        class="block px-4 py-2 text-sm text-white bg-red-500 hover:bg-red-600 focus:outline-none focus:ring focus:border-red-700 dark:bg-red-700 dark:hover:bg-red-800 dark:focus:border-red-900 dark:focus:ring-red-600 dark:text-gray-300 dark:hover:text-white dark:focus:text-white rounded-md transition duration-300 ease-in-out"
                                        role="menuitem">Log Out</a>
                                </li>
                            </ul>
                        </div>
                        


                    </div>
                </div>
            </div>
        </div>
    </nav>
    

    <aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-gray-200 border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-gray-200 dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="{{ route('dashboard') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-yellow-500 dark:hover:bg-gray-700 group">
                    <!-- Your content here -->
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
                @if (Auth::check())
                    @if (Auth::user()->role == 'admin')
                        <li>
                            <button type="button"
                            class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-yellow-500 dark:text-white dark:hover:bg-gray-700"
                            aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                
                                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 18 21">
                                    <path
                                        d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                                </svg>
                                <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Data Master</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <ul id="dropdown-example" class="hidden py-2 space-y-2">
                                <li>
                                    <a href="{{ route('admin.rombel.index') }}"
                                        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Data
                                        Rombel</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.rayon.index') }}"
                                        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Data
                                        Rayon</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.student.index') }}"
                                        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Data
                                        Siswa</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.user.index') }}"
                                        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Data
                                        User</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('admin.data-telat.index') }}"
                                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z" />
                                </svg>
                                <span class="flex-1 ms-3 whitespace-nowrap">Data Keterlambatan</span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->role == 'ps')
                        <li>
                            <a href="{{ route('indexSiswa') }}"
                                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z" />
                                </svg>
                                <span class="flex-1 ms-3 whitespace-nowrap">Data Siswa</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('indexDataTelat') }}"
                                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z" />
                                </svg>
                                <span class="flex-1 ms-3 whitespace-nowrap">Data Keterlambatan</span>
                            </a>
                        </li>
                    @endif
                @endif

    </aside>

    @yield('content')


    @vite('resources/js/app.js')
</body>

</html>
