<!DOCTYPE html>
<html>
<head>
    <title>Coming Soon</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .toast {
            animation: slideIn 0.5s ease-out;
        }
        @keyframes slideIn {
            from { transform: translateY(-100%); }
            to { transform: translateY(0); }
        }
    </style>
</head>
<body class="bg-gray-100 h-screen flex flex-col items-center justify-center">
    @if(session('success'))
    <div class="toast fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded shadow-lg">
        {{ session('success') }}
    </div>
    <script>
        setTimeout(() => {
            document.querySelector('.toast').style.display = 'none';
        }, 3000);
    </script>
    @endif

     @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                        >
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </header>


    <div class="text-center">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">More features cookin'</h1>
        <p class="text-xl text-gray-600">Stay tuned!</p>
    </div>
</body>
</html>