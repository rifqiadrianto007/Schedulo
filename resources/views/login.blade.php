<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>
        Schedulo
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&amp;display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: "Poppins", sans-serif;
        }
    </style>
</head>

<body class="bg-[#e8eef2] min-h-screen flex flex-col">
    <header class="bg-[#1e5ebd] p-4 flex items-center">
        <img alt="Schedulo logo clock icon white on blue background" class="mr-2" height="40"
            src="https://storage.googleapis.com/a1aa/image/b0117f03-b472-499c-a2db-a3952f5e027e.jpg" width="40" />
        <h1 class="text-white font-extrabold text-xl underline decoration-white decoration-4">
            Schedul
            <span class="inline-block align-middle">
                <svg class="inline-block" fill="none" height="24" stroke="white" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="24"
                    xmlns="http://www.w3.org/2000/svg">
                    <circle cx="12" cy="12" r="10">
                    </circle>
                    <polyline points="12 6 12 12 16 14">
                    </polyline>
                </svg>
            </span>
            <span class="sr-only">
                o
            </span>
        </h1>
    </header>
    <main class="flex-grow flex flex-col justify-center items-center px-4">
        <h2 class="text-gray-800 font-semibold text-center mb-12 text-lg max-w-xs">
            Selamat Datang Di Schedulo!
        </h2>
        <form method="POST" action="{{ route('login.proses') }}" class="w-full max-w-md space-y-4">
            @csrf
            <input name="email"
                class="w-full rounded-md border border-gray-600 px-4 py-3 text-sm placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#1e5ebd]"
                placeholder="Email" type="text" />
            <div class="relative">
                <input name="password"
                    class="w-full rounded-md border border-gray-600 px-4 py-3 pr-12 text-sm placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#1e5ebd]"
                    placeholder="Password" type="password" />
                <span aria-label="Toggle password visibility"
                    class="absolute inset-y-0 right-3 flex items-center text-gray-400 cursor-pointer">
                    <i class="fas fa-eye-slash fa-lg"></i>
                </span>
            </div>
            <p class="text-center text-xs text-gray-700">
                Belum punya akun?
                <a href="{{ route('regis') }}" class="text-[#5a6dfd] font-semibold">
                    Daftar!
                </a>
            </p>
            <button type="submit"
                class="w-full bg-yellow-400 hover:bg-yellow-300 text-gray-900 font-medium rounded-md py-3 text-base transition-colors">
                Masuk
            </button>
        </form>
    </main>
</body>

</html>
