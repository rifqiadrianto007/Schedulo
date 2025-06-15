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

<body class="bg-gray-50 font-poppins min-h-screen flex flex-col">
    <!-- Header -->
    <header class="bg-[#1e5ebd] p-4 flex items-center">
        <div class="flex items-center">
            <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center mr-3">
                <svg class="w-6 h-6 text-[#1e5ebd]" fill="none" stroke="currentColor" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10"></circle>
                    <polyline points="12,6 12,12 16,14"></polyline>
                </svg>
            </div>
            <div class="flex items-center">
                <img src="{{ asset('img/logo.png') }}" alt="Schedulo Logo" class="h-8 w-auto">
                <div class="ml-2 w-6 h-6 bg-white rounded-full flex items-center justify-center">
                    <i class="fas fa-check text-primary-blue text-sm"></i>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow flex flex-col justify-center items-center px-4 py-8">
        <div class="w-full max-w-md">
            <h2 class="text-gray-800 font-semibold text-center mb-12 text-lg">
                Selamat Datang Di Schedulo!
            </h2>

            <!-- Error Messages (Hidden by default, would be shown by backend) -->
            <div id="error-container" class="w-full mb-4 hidden">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    <ul class="list-disc pl-5" id="error-list">
                        <!-- Error messages would be populated here -->
                    </ul>
                </div>
            </div>

            <!-- Regis Form -->
            <form action="{{ route('register.proses') }}" method="POST" class="w-full max-w-md space-y-4">
                @csrf
                <div>
                    <input name="nama"
                        class="w-full rounded-md border border-gray-600 px-4 py-3 text-sm placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#1e5ebd]"
                        placeholder="Nama Lengkap" type="text" required />
                </div>

                <div>
                    <input name="nomor_induk"
                        class="w-full rounded-md border border-gray-600 px-4 py-3 pr-12 text-sm placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#1e5ebd]"
                        placeholder="Nomor Induk" type="text" required />
                </div>

                <div>
                    <input name="password"
                        class="w-full rounded-md border border-gray-600 px-4 py-3 pr-12 text-sm placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#1e5ebd]"
                        placeholder="Password" type="password" required />
                    <span aria-label="Toggle password visibility"
                        class="absolute inset-y-0 right-3 flex items-center text-gray-400 cursor-pointer">
                        <i class="fas fa-eye-slash fa-lg"></i>
                    </span>
                </div>
                <p class="text-center text-xs text-gray-700">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="text-[#5a6dfd] font-semibold">
                        Login!
                    </a>
                </p>

                <button type="submit"
                    class="w-full bg-yellow-400 hover:bg-yellow-300 text-gray-900 font-medium rounded-md py-3 text-base transition-colors">
                    Daftar
                </button>
            </form>
        </div>
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
