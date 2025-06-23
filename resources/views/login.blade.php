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

<body class="bg-[#e8eef2] min-h-screen flex flex-col font-poppins">
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
            <div id="error-container" class="w-full max-w-md mb-4">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    <ul id="error-list" class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <form method="POST" action="{{ route('login.proses') }}" class="w-full max-w-md space-y-4">
            @csrf
            <div>
                <input name="nomor_induk" id="nomor_induk"
                    class="w-full rounded-md border border-gray-600 px-4 py-3 text-sm placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#1e5ebd] transition-colors"
                    placeholder="Masukkan NIM/NIP" type="text" required />
            </div>

            <div class="relative">
                <input name="password" id="password"
                    class="w-full rounded-md border border-gray-600 px-4 py-3 pr-12 text-sm placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#1e5ebd] transition-colors"
                    placeholder="Masukkan Password" type="password" required />
                <span aria-label="Toggle password visibility" tabindex="0"
                    class="absolute inset-y-0 right-3 flex items-center text-gray-400 cursor-pointer hover:text-gray-600 transition-colors">
                    <i class="fas fa-eye-slash fa-lg"></i>
                </span>
            </div>

            <p class="text-center text-xs text-gray-700">
                Belum punya akun?
                <a href="{{ route('regis') }}" class="text-[#5a6dfd] font-semibold hover:underline">
                    Daftar!
                </a>
            </p>

            <button type="submit"
                class="w-full bg-yellow-400 hover:bg-yellow-300 text-gray-900 font-medium rounded-md py-3 text-base transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                Masuk
            </button>
        </form>
    </main>

    <!-- Footer -->
    <x-footer />

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            initializePasswordToggle();
            initializeFormValidation();
            autoHideErrors();
        });

        function initializePasswordToggle() {
            const passwordInputs = document.querySelectorAll('input[type="password"]');

            passwordInputs.forEach(input => {
                const toggleSpan = input.parentElement.querySelector(
                    'span[aria-label="Toggle password visibility"]');
                if (toggleSpan) {
                    const icon = toggleSpan.querySelector('i');

                    // Click event
                    toggleSpan.addEventListener('click', function() {
                        togglePassword(input, icon);
                    });

                    // Keyboard support
                    toggleSpan.addEventListener('keypress', function(e) {
                        if (e.key === 'Enter' || e.key === ' ') {
                            e.preventDefault();
                            togglePassword(input, icon);
                        }
                    });
                }
            });
        }

        function togglePassword(input, icon) {
            if (input.type === 'password') {
                input.type = 'text';
                icon.className = 'fas fa-eye fa-lg';
            } else {
                input.type = 'password';
                icon.className = 'fas fa-eye-slash fa-lg';
            }
        }

        function initializeFormValidation() {
            const form = document.querySelector('form');
            if (!form) return;

            form.addEventListener('submit', function(event) {
                const errors = validateForm(form);

                if (errors.length > 0) {
                    event.preventDefault();
                    showError(errors);
                    return false;
                }

                // Show loading state
                const submitBtn = form.querySelector('button[type="submit"]');
                submitBtn.disabled = true;
                submitBtn.textContent = 'Memproses...';
            });

            // Real-time validation
            const inputs = form.querySelectorAll('input[required]');
            inputs.forEach(input => {
                input.addEventListener('blur', function() {
                    validateSingleField(input);
                });

                input.addEventListener('input', function() {
                    clearFieldError(input);
                });
            });
        }

        function validateForm(form) {
            const errors = [];
            const nomorInduk = form.querySelector('input[name="nomor_induk"]').value.trim();
            const password = form.querySelector('input[name="password"]').value;

            if (!nomorInduk) {
                errors.push('NIM/NIP harus diisi!');
            } else if (nomorInduk.length < 3) {
                errors.push('NIM/NIP minimal 3 karakter!');
            }

            if (!password) {
                errors.push('Password harus diisi!');
            } else if (password.length < 6) {
                errors.push('Password minimal 6 karakter!');
            }

            return errors;
        }

        function validateSingleField(input) {
            const errors = [];
            const value = input.value.trim();
            const fieldName = input.name;

            switch (fieldName) {
                case 'nomor_induk':
                    if (!value) {
                        errors.push('NIM/NIP harus diisi!');
                    } else if (value.length < 3) {
                        errors.push('NIM/NIP minimal 3 karakter!');
                    }
                    break;

                case 'password':
                    if (!input.value) {
                        errors.push('Password harus diisi!');
                    } else if (input.value.length < 6) {
                        errors.push('Password minimal 6 karakter!');
                    }
                    break;
            }

            if (errors.length > 0) {
                showFieldError(input, errors[0]);
            } else {
                clearFieldError(input);
            }
        }

        function showFieldError(input, message) {
            clearFieldError(input);

            input.classList.add('border-red-500', 'bg-red-50');

            const errorDiv = document.createElement('div');
            errorDiv.className = 'text-red-600 text-xs mt-1 field-error';
            errorDiv.textContent = message;

            input.parentElement.appendChild(errorDiv);
        }

        function clearFieldError(input) {
            input.classList.remove('border-red-500', 'bg-red-50');

            const existingError = input.parentElement.querySelector('.field-error');
            if (existingError) {
                existingError.remove();
            }
        }

        function showError(errors) {
            let errorContainer = document.getElementById('error-container');
            let errorList = document.getElementById('error-list');

            if (!errorContainer) {
                createErrorContainer(errors);
                return;
            }

            errorList.innerHTML = '';
            errors.forEach(error => {
                const li = document.createElement('li');
                li.textContent = error;
                errorList.appendChild(li);
            });

            errorContainer.classList.remove('hidden');
            errorContainer.scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });

            setTimeout(() => {
                errorContainer.classList.add('hidden');
            }, 8000);
        }

        function createErrorContainer(errors) {
            const form = document.querySelector('form');
            if (!form) return;

            const errorContainer = document.createElement('div');
            errorContainer.id = 'error-container';
            errorContainer.className = 'w-full max-w-md mb-4';

            const errorDiv = document.createElement('div');
            errorDiv.className = 'bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded';

            const errorList = document.createElement('ul');
            errorList.id = 'error-list';
            errorList.className = 'list-disc pl-5';

            errors.forEach(error => {
                const li = document.createElement('li');
                li.textContent = error;
                errorList.appendChild(li);
            });

            errorDiv.appendChild(errorList);
            errorContainer.appendChild(errorDiv);

            form.parentElement.insertBefore(errorContainer, form);

            setTimeout(() => {
                errorContainer.remove();
            }, 8000);
        }

        function autoHideErrors() {
            const errorContainer = document.getElementById('error-container');
            if (errorContainer && !errorContainer.classList.contains('hidden')) {
                setTimeout(() => {
                    errorContainer.classList.add('hidden');
                }, 10000);
            }
        }

        function showSuccess(message) {
            const existingSuccess = document.querySelectorAll('.success-notification');
            existingSuccess.forEach(el => el.remove());

            const successDiv = document.createElement('div');
            successDiv.className =
                'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 success-notification transform translate-x-full transition-transform duration-300';
            successDiv.innerHTML = `
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-2"></i>
                    <span>${message}</span>
                    <button class="ml-4 text-white hover:text-gray-200" onclick="this.parentElement.parentElement.remove()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            `;

            document.body.appendChild(successDiv);

            setTimeout(() => {
                successDiv.classList.remove('translate-x-full');
            }, 100);

            setTimeout(() => {
                successDiv.classList.add('translate-x-full');
                setTimeout(() => {
                    if (successDiv.parentElement) {
                        successDiv.remove();
                    }
                }, 300);
            }, 5000);
        }
    </script>
</body>

</html>
