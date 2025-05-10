<script>
    document.addEventListener('DOMContentLoaded', function () {
        const loginForm = document.getElementById('login-form');
        if (loginForm) {
            loginForm.addEventListener('submit', function (e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Logging in',
                    html: 'Please wait...',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                this.submit();
            });
        }

        const registerForm = document.getElementById('register-form');
        if (registerForm) {
            registerForm.addEventListener('submit', function (e) {
                e.preventDefault();

                const password = document.getElementById('password').value;
                const passwordConfirm = document.getElementById('password_confirmation').value;

                if (password !== passwordConfirm) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Password Mismatch',
                        text: 'The password and confirmation do not match.',
                        confirmButtonText: 'Try Again'
                    });
                    return;
                }

                const termsCheckbox = document.getElementById('terms');
                if (!termsCheckbox.checked) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Terms Not Accepted',
                        text: 'You must accept the Terms of Service and Privacy Policy to continue.',
                        confirmButtonText: 'Understand'
                    });
                    return;
                }

                // Show loading state
                Swal.fire({
                    title: 'Creating Account',
                    html: 'Please wait...',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                this.submit();
            });
        }
    });
</script>
