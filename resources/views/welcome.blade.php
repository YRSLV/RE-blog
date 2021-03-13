<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/creativetimofficial/tailwind-starter-kit/compiled-tailwind.min.css"
    />
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/ea13f68d12.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="text-gray-800 antialiased">
<nav class="top-0 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 navbar-expand-lg">
    <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
        <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start">
            <a class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-no-wrap uppercase text-white"
               href="#">RE-blog
            </a>
            <button
                class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
                type="button"
                id="nav-burger-button"
            >
                <i class="text-white fas fa-bars"></i>
            </button>
        </div>
        <div class="lg:flex flex-grow items-center bg-white lg:bg-transparent lg:shadow-none hidden block rounded shadow-lg" id="example-collapse-navbar">
            <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">

                @if (Route::has('login'))
                    @auth
                    <li class="flex items-center">
                        <a href="{{ url('/dashboard') }}" class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold">Dashboard</a>
                    </li>
                    @else
                    <li class="flex items-center">
                        <a href="{{ route('login') }}" class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold">Log in</a>
                    </li>
                        @if (Route::has('register'))
                        <li class="flex items-center">
                            <a href="{{ route('register') }}" class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold">Register</a>
                        </li>
                        @endif
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>
<main>
    <div class="relative pt-16 pb-32 flex content-center items-center justify-center" style="min-height: 75vh;">
        <div class="absolute top-0 w-full h-full bg-center bg-cover"
             style='background-image: url("https://images.unsplash.com/photo-1540397106260-e24a507a08ea?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1061&q=80");'>
            <span id="blackOverlay" class="w-full h-full absolute opacity-75 bg-black"></span>
        </div>
        <div class="container relative mx-auto">
            <div class="items-center flex flex-wrap">
                <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
                    <div class="pr-12">
                        <h1 class="text-white font-semibold text-5xl">Welcome to RE-blog</h1>
                        <p class="mt-4 text-lg text-gray-100">This is an example of a blog-like application.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden"
             style="height: 70px; transform: translateZ(0px);">
            <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveaspectratio="none"
                 version="1.1" viewbox="0 0 2560 100" x="0" y="0">
                <polygon class="text-gray-300 fill-current" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>
</main>
<footer class="relative bg-gray-300 pt-8 pb-6">
    <div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
         style="height: 80px; transform: translateZ(0px);">
        <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveaspectratio="none"
             version="1.1" viewbox="0 0 2560 100" x="0" y="0">
            <polygon class="text-gray-300 fill-current" points="2560 0 2560 100 0 100"></polygon>
        </svg>
    </div>
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap">
            <div class="w-full lg:w-6/12 px-4">
                <h4 class="text-3xl font-semibold">Designed</h4>
                <h5 class="text-lg mt-0 mb-2 text-gray-700">to provide an enjoyable and creative experience to be truly fulfilling.</h5>
                <div class="mt-6"></div>
            </div>
            <div class="w-full lg:w-6/12 px-4">
                <div class="flex flex-wrap items-top mb-6">

                    <div class="w-full lg:w-4/12 px-4 ml-auto">
                        <span class="block uppercase text-gray-600 text-sm font-semibold mb-2">Some realted links</span>
                        <ul class="list-unstyled">
                            <li>
                                <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                                   href="https://laravel.com"/>Laravel Framework</a>
                            </li>
                            <li>
                                <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                                   href="https://laravel-livewire.com/">Laravel Livewire</a>
                            </li>
                            <li>
                                <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                                   href="https://tailwindcss.com/">Tailwind CSS</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-6 border-gray-400">
        <div class="flex flex-wrap items-center md:justify-between justify-center">
            <div class="w-full md:w-4/12 px-4 mx-auto text-center">
                <div class="text-sm text-gray-600 font-semibold py-1">
                    Copyright © 2021 RE-blog by <a href="https://github.com/YRSLV"
                                                   class="text-gray-600 hover:text-gray-900">YRSLV</a>
                </div>
                <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
<script>
    $( "#nav-burger-button" ).on('click', function(e) {
        $( "#example-collapse-navbar" ).toggleClass("hidden");
        $( "#example-collapse-navbar" ).toggleClass("block");
        e.preventDefault();
        e.stopPropagation();
    });
</script>
</html>
