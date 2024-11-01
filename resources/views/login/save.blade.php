<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/login2.css">
    <title>Login Page | Rumah Kos</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form method="POST" action="/register">
                @csrf
                <h1>Buat Akun!</h1>
                @if ($errors->has('registration_error'))
                    <div class="alert alert-danger">
                        {{ $errors->first('registration_error') }}
                    </div>
                @endif

                <div class="google-login mb-3">
                    <a href="{{ route('google-auth') }}" class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('images/logos/google.jpeg') }}" alt="Google Logo" style="width: 30px; height: 30px; margin-right: 10px;">
                    </a>
                </div>
                <span>Buat username atau daftar menggunakan google</span>
                <input type="text" name="username" id="username" placeholder="username" autocomplete="off" required value="{{ old('username') }}">
                <input type="text" name="nama" id="nama" placeholder="nama" autocomplete="off" required value="{{ old('nama') }}">
                <input type="password" name="password" id="password" placeholder="password" autocomplete="off" required>

                <button type="submit" class="btn-signup">Sign Up</button>
            </form>
        </div>

        <div class="form-container sign-in">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                {{-- <img src="{{ asset('images/logos/matoangin.png') }}" alt="Matoangin Logo" class="logo"> --}}
                <h1>Sign In Disini!</h1>
                <div class="google-login mb-3">
                    <a href="{{ route('google-auth') }}" class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('images/logos/google.jpeg') }}" alt="Google Logo" style="width: 30px; height: 30px; margin-right: 10px;">
                    </a>
                </div>

                <input type="text" name="username" id="username" placeholder="username" required>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <button type="submit" class="btn-login">Login</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Masukkan data kamu untuk menggunakan berbagai fitur!</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hai Customer!</h1>
                    <p>Registrasi disini jika belum ada akun</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const signUpForm = document.querySelector('.form-container.sign-up form');

            signUpForm.addEventListener('submit', function(event) {
                event.preventDefault(); // Mencegah pengiriman form biasa
                const formData = new FormData(signUpForm);

                // Hapus pesan kesalahan sebelumnya
                document.querySelectorAll('.error-message').forEach(function(message) {
                    message.remove();
                });

                fetch('/register', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': formData.get('_token')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Jika pendaftaran berhasil, arahkan ke halaman login
                        window.location.href = '/login'; // Ganti dengan URL login yang benar
                    } else {
                        // Tampilkan pesan kesalahan di bawah input yang relevan
                        Object.keys(data.errors).forEach(function(key) {
                            const inputElement = document.getElementById(key);
                            const errorMessage = document.createElement('div');
                            errorMessage.textContent = data.errors[key][0]; // Ambil pesan pertama
                            errorMessage.classList.add('error-message');
                            inputElement.parentNode.insertBefore(errorMessage, inputElement.nextSibling);
                        });
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });
        </script>

</body>

</html>
