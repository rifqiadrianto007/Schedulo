@extends('layouts.app')

@section('content')
<body class="bg-[#e8eef2] min-h-screen flex flex-col">
    <header class="bg-[#1e5ebd] p-4 flex items-center">
        <img alt="Schedulo logo clock icon white on blue background" class="mr-2" height="40"
            src="https://storage.googleapis.com/a1aa/image/b0117f03-b472-499c-a2db-a3952f5e027e.jpg" width="40" />
        <h1 class="text-white font-extrabold text-xl underline decoration-white decoration-4">
            Schedulo
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
        <form class="w-full max-w-md space-y-4">
            <input
                class="w-full rounded-md border border-gray-600 px-4 py-3 text-sm placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#1e5ebd]"
                placeholder="User Name" type="text" />
            <div class="relative">
                <input
                    class="w-full rounded-md border border-gray-600 px-4 py-3 pr-12 text-sm placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#1e5ebd]"
                    placeholder="Password" type="password" />
                <span aria-label="Toggle password visibility"
                    class="absolute inset-y-0 right-3 flex items-center text-gray-400 cursor-pointer">
                    <i class="fas fa-eye-slash fa-lg">
                    </i>
                </span>
            </div>
            <p class="text-center text-xs text-gray-700">
                Belum punya akun?
                <a class="text-[#5a6dfd] font-semibold" href="{{ route('login') }}">
                    Login!
                </a>
            </p>
            <a href="{{ route('login') }}"
                class="w-full bg-yellow-400 hover:bg-yellow-300 text-gray-900 font-medium rounded-md py-3 text-base transition-colors inline-block text-center">
                Masuk
            </a>
        </form>
    </main>
@endsection
