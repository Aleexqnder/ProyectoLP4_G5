<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap.css') }}" />
  <link href="{{ asset('build/assets/css/Login.css') }}" rel="stylesheet" />
  <link rel="shortcut icon" type="image/png" href="{{ asset('build/assets/img/Logo.png') }}" />
    <title>Contraseña olvidada</title>
</head>
<body>
    
</body>
</html>
    <x-guest-layout>


        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <h1>Contraseña olvidada</h1>
            <img src="{{ asset('build/assets/img/LogoPNG.png') }}" alt="Logo" class="logo-clase" />    

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <br>
            <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="BottonBlue">
            {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
            </div>
        </form>
    </x-guest-layout>
