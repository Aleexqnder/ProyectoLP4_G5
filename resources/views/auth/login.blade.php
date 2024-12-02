<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Metadatos y enlaces de estilos -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MecaMasters</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.css') }}" />
    <link href="{{ asset('build/assets/css/Login.css') }}" rel="stylesheet" />
</head>
<body>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form id="login-form">
        @csrf
        <h1>Login</h1>
        <img src="{{ asset('build/assets/img/LogoPNG.png') }}" alt="Logo" class="logo-clase" />    
        <!-- Email Address -->
        <div>
            <x-input-label for="Email" :value="__('Email')" />
            <x-text-input id="Email" class="block mt-1 w-full" type="email" name="Email" :value="old('Email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('Email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
             <x-input-label for="contrasena" :value="__('Contraseña')" />

            <x-text-input id="contrasena" class="block mt-1 w-full"
            type="password"
            name="contrasena"
            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('contrasena')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

   <script>
    document.getElementById('login-form').addEventListener('submit', function(event) {
        event.preventDefault();

        const data = {
            Email: document.getElementById('Email').value,
            contrasena: document.getElementById('contrasena').value,
        };

        console.log('Datos enviados:', data);

        fetch('http://localhost:3000/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Redirigir al dashboard después de un login exitoso
                window.location.href = '/dashboard';
            } else {
                alert(data.message || 'Las credenciales no coinciden con nuestros registros.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Hubo un problema al intentar iniciar sesión.');
        });
    });
</script>
</body>
</html>