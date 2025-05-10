<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <title>@yield('title') - ModernBlog</title>
    <script src="https://kit.fontawesome.com/af96158b7b.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-50 min-h-screen flex flex-col">
    <div class="flex min-h-screen">
        @yield('content')
    </div>

    <script>
        function togglePasswordVisibility(inputId) {
            const passwordInput = document.getElementById(inputId);
            const toggleIcon = document.getElementById(inputId + '-toggle-icon');

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            }
        }
    </script>
    <script>
        function togglePasswordVisibility(inputId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(inputId + '-toggle-icon');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>

    <!-- SweetAlert2 Initialization -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if (session('swal'))
                Swal.fire({
                    icon: "{{ session('swal.icon') }}",
                    title: "{{ session('swal.title') }}",
                    text: "{{ session('swal.text') ?? '' }}",
                    html: "{{ session('swal.html') ?? '' }}",
                    timer: {{ session('swal.timer') ?? 'null' }},
                    position: "{{ session('swal.position') ?? 'center' }}",
                    confirmButtonText: "{{ session('swal.confirmButtonText') ?? 'OK' }}",
                    showConfirmButton: {{ session('swal.showConfirmButton') ?? 'true' }},
                });
            @endif

                // Display error bag as SweetAlert if any validation errors
                @if($errors->any())
                    var errorMessages = [];
                    @foreach($errors->all() as $error)
                        errorMessages.push("{{ $error }}");
                    @endforeach

                    Swal.fire({
                        icon: 'error',
                        title: 'Validation Error',
                        html: errorMessages.join('<br>'),
                        confirmButtonText: 'OK',
                    });
                @endif
        });
    </script>
</body>

</html>
