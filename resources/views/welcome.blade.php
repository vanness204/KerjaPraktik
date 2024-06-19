<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background: linear-gradient(to bottom, #ff2d20, #ffffff);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        .login-container .logo img {
            height: 80px;
            margin-bottom: 20px;
        }
        .login-container h2 {
            margin-bottom: 20px;
            color: #333333;
        }
        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #333333;
        }
        .form-group input {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            margin: 0 auto;
            display: block;
        }
        .form-group input:focus {
            border-color: #ff2d20;
        }
        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        .remember-me input {
            margin-right: 10px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background: #ff2d20;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
            margin-top: 10px;
            border: none;
            cursor: pointer;
        }
        .btn:hover {
            background: #e60000;
        }
        .links {
            margin-top: 10px;
        }
        .links a {
            display: inline-block;
            margin: 5px;
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s;
        }
        .links a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <img src="https://raw.githubusercontent.com/vanness204/KerjaPraktik/main/KerjaPraktikVannessFadly/LogoYulis.jpg" alt="Logo">
        </div>
        <h2>Yulis baby shop</h2>

        <!-- Form Login Shared -->
        <form method="POST" id="loginForm">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" required autofocus autocomplete="username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password">
            </div>
            <div class="remember-me">
                <input id="remember_me" type="checkbox" name="remember">
                <label for="remember_me">Remember me</label>
            </div>
            <div>
                <button type="button" class="btn" onclick="submitForm('{{ route('login') }}')">Log in by Admin</button>
                <button type="button" class="btn" onclick="submitForm('{{ route('owner.login') }}')">Log in by Owner</button>
            </div>
        </form>

        <div class="links">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">Forgot your password?</a>
            @endif
            @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
            @endif
        </div>
    </div>

    <!-- JavaScript for form submission -->
    <script>
        function submitForm(action) {
            const form = document.getElementById('loginForm');
            form.action = action;
            form.submit();
        }
    </script>
</body>
</html>
