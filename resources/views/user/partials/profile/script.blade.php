<script>
    function previewImage(input) {
        const preview = document.getElementById('profile-preview');
        const file = input.files[0];
        const reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "{{ $user->photo ? asset('storage/' . $user->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) }}";
        }
    }

    function removePhoto() {
        const input = document.getElementById('photo');
        const preview = document.getElementById('profile-preview');

        input.value = '';
        preview.src = "{{ $user->photo ? asset('storage/' . $user->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) }}";
        alert('Photo selection removed. Remember to save changes to update your profile.');
    }
</script>
<script>
    document.querySelectorAll('.toggle-password').forEach(function (icon) {
        icon.addEventListener('click', function () {
            const input = this.closest('.relative').querySelector('input');
            const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
            input.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
            this.classList.toggle('fa-eye');
        });
    });

    document.getElementById('photo').addEventListener('change', function (e) {
        const reader = new FileReader();
        reader.onload = function (event) {
            document.querySelector('.group img').setAttribute('src', event.target.result);
        };
        reader.readAsDataURL(e.target.files[0]);
    });
</script>
