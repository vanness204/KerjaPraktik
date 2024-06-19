<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background: linear-gradient(to bottom, #ff2d20, #ffffff);
            color: #000000;
            text-align: center;
        }
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .form-container {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
            max-width: 400px;
            text-align: left;
        }
        .form-container .logo img {
            height: 100px;
            display: block;
            margin: 0 auto 20px;
        }
        .form-container h1 {
            margin-bottom: 20px;
            font-size: 24px;
            text-align: center;
        }
        .form-container label {
            display: block;
            margin-bottom: 8px;
        }
        .form-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-container .btn {
            background: #ff2d20;
            color: #ffffff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            width: 100%;
            cursor: pointer;
        }
        .form-container .btn:hover {
            background: #e60000;
        }
        .form-container .link {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #ff2d20;
            text-decoration: none;
        }
        .form-container .link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <div class="logo">
                <img src="https://raw.githubusercontent.com/vanness204/KerjaPraktik/main/KerjaPraktikVannessFadly/LogoYulis.jpg" alt="Logo">
            </div>
            <h1>Register</h1>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name">{{ __('Name') }}</label>
                    <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name">
                    @error('name')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email Address -->
                <div>
                    <label for="email">{{ __('Email') }}</label>
                    <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username">
                    @error('email')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password">
                    @error('password')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                    @error('password_confirmation')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="btn">{{ __('Register') }}</button>
                </div>

                <a class="link" href="{{ route('welcome') }}">
                    {{ __('Already registered?') }}
                </a>
            </form>
        </div>
    </div>
</body>
</html>
