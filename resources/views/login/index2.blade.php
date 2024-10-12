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
            <form>
                <h1>Buat Akun!</h1>
                <span>Buat username dan password anda</span>
                <input type="text" placeholder="Name">
                <input type="password" placeholder="Password">
                <button class="btn-signup">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <img src="{{ asset('images/logos/matoangin.png') }}" alt="Matoangin Logo" class="logo">
                <h1>Sign In Disini!</h1>
                <input type="text" name="nik" placeholder="username" required>
                <input type="password" name="password" placeholder="Password" required>
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

</body>

</html>