<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Schedulo</title>
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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
</head>

<body class="bg-[#e8eef2] min-h-screen flex flex-col">
    <header class="bg-[#1e5ebd] p-4 flex items-center">
        <div class="flex items-center">
            <img src="{{ asset('img/logo.png') }}" alt="Schedulo Logo" class="h-8 w-auto">
            <div class="ml-2 w-6 h-6 bg-white rounded-full flex items-center justify-center">
                <i class="fas fa-check text-primary-blue text-sm"></i>
            </div>
        </div>
    </header>
    <main class="flex-grow flex flex-col justify-center items-center px-4">
        <h2 class="text-gray-800 font-semibold text-center mb-12 text-lg max-w-xs">
            Selamat Datang Di Schedulo!
        </h2>

        @if ($errors->any())
            <div class="w-full max-w-md mb-4">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <form method="POST" action="{{ route('login.proses') }}" class="w-full max-w-md space-y-4">
            @csrf
            <input name="nomor_induk"
                class="w-full rounded-md border border-gray-600 px-4 py-3 text-sm placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#1e5ebd]"
                placeholder="Masukkan NIM/NIP" type="text" />
            <div class="relative">
                <input name="password"
                    class="w-full rounded-md border border-gray-600 px-4 py-3 pr-12 text-sm placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#1e5ebd]"
                    placeholder="Masukkan Password" type="password" />
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

    <!-- Footer -->
    <x-footer />

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const passwordIcon = document.getElementById('password-icon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.className = 'fas fa-eye';
            } else {
                passwordInput.type = 'password';
                passwordIcon.className = 'fas fa-eye-slash';
            }
        }

        function handleLogin(event) {
            event.preventDefault();

            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            // Basic validation
            if (!username || !password) {
                showError(['Username dan password harus diisi!']);
                return;
            }

            if (username.length < 3) {
                showError(['Username minimal 3 karakter!']);
                return;
            }

            if (password.length < 6) {
                showError(['Password minimal 6 karakter!']);
                return;
            }

            // Simulate login process
            showSuccess('Login berhasil! Selamat datang, ' + username);
        }

        function isValidEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        function showError(errors) {
            const errorContainer = document.getElementById('error-container');
            const errorList = document.getElementById('error-list');

            errorList.innerHTML = '';
            errors.forEach(error => {
                const li = document.createElement('li');
                li.textContent = error;
                errorList.appendChild(li);
            });

            errorContainer.classList.remove('hidden');

            // Auto hide after 5 seconds
            setTimeout(() => {
                errorContainer.classList.add('hidden');
            }, 5000);
        }

        function showSuccess(message) {
            // Create success notification
            const successDiv = document.createElement('div');
            successDiv.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50';
            successDiv.innerHTML = `
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-2"></i>
                    <span>${message}</span>
                </div>
            `;

            document.body.appendChild(successDiv);

            // Auto remove after 3 seconds
            setTimeout(() => {
                successDiv.remove();
            }, 3000);
        }
    </script>
</body>

</html>
