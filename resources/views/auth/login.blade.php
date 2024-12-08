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

    <form id="login-form" class="container mt-5" action="{{ route('login') }}" method="POST">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center mb-4">Login</h1>
                <div class="text-center mb-4">
                    <img src="{{ asset('build/assets/img/LogoPNG.png') }}" alt="Logo" class="logo-clase" />
                </div>

                <!-- Email Address -->
                <div class="form-group mb-4">
                    <x-input-label for="Email" :value="__('Email')" />
                    <x-text-input id="Email" class="form-control" type="email" name="Email" :value="old('Email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('Email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="form-group mb-4">
                    <x-input-label for="contrasena" :value="__('Contraseña')" />

                    <x-text-input id="contrasena" class="form-control"
                    type="password"
                    name="contrasena"
                    required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('contrasena')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="form-group mb-4">
                    <div class="form-check">
                        <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                        <label for="remember_me" class="form-check-label">{{ __('Recuerdame') }}</label>
                    </div>
                </div>

                <!-- Botones -->
                <div class="row">
                    <div class="col-6">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md" href="{{ route('password.request') }}">
                                {{ __('¿Olvidaste tu contraseña?') }}
                            </a>
                        @endif
                    </div>
                    <div class="col-6 text-end">
                        <x-primary-button class="btn btn-primary BottonBlue">
                            {{ __('Iniciar Sesión') }}
                        </x-primary-button>
                    </div>
                </div>
            </div>
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