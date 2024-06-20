<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Forgot Password</title>

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
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            max-width: 400px;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .container .logo img {
            height: 100px;
            display: block;
            margin: 0 auto 20px;
        }
        .container h1 {
            margin-bottom: 20px;
            font-size: 24px;
        }
        .container .text {
            margin-bottom: 20px;
            font-size: 14px;
            color: #666666;
        }
        .container label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }
        .container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .container .btn {
            background: #ff2d20;
            color: #ffffff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            width: 100%;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
        }
        .container .btn:hover {
            background: #e60000;
        }
        .container .link {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #ff2d20;
            text-decoration: none;
        }
        .container .link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="{{ asset('images/LogoYulis.jpg') }}" alt="Logo">
        </div>
        <h1>Forgot Password</h1>
        <div class="text">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email">{{ __('Email') }}</label>
                <input id="email" type="email" name="email" :value="old('email')" required autofocus>
                @error('email')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div>
                <button type="submit" class="btn">{{ __('Email Password Reset Link') }}</button>
            </div>
        </form>
    </div>
</body>
</html>
