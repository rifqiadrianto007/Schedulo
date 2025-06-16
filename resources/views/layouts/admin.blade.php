<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel - Schedulo</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-blue': '#1565c0',
                        'schedul-blue': '#4A90E2'
                    },
                    fontFamily: {
                        'poppins': ['Poppins', 'sans-serif']
                    }
                }
            }
        }
    </script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
    <script src="//unpkg.com/alpinejs" defer></script>

    @stack('styles')
    @vite(['public/css/app.css', 'public/js/app.js'])
</head>

<body class="{{ $bodyClass ?? 'font-sans bg-gray-300 min-h-screen flex flex-col' }}">

    <x-admHeader />

    <div class="flex flex-grow">
        <x-admSidebar />
        <main class="flex-grow p-6">
            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>

</html>
