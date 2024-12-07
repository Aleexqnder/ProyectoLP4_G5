<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Metadatos y enlaces de estilos -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - MecaMasters</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.css') }}" />
    <link href="{{ asset('build/assets/css/Login.css') }}" rel="stylesheet" />
</head>
<body>
    <x-guest-layout>
        <form method="POST" action="{{ route('register.crear') }}">
            @csrf
            <h1>Registro de usuario</h1>
            <img src="{{ asset('build/assets/img/LogoPNG.png') }}" alt="Logo" class="logo-clase" />

            <div class="container">
                <div class="row">
                    <!-- Primera columna -->
                    <div class="col-md-6">
                        <!-- Nombres -->
                        <div class="form-group">
                            <x-input-label for="nombres" :value="__('Nombre')" />
                            <x-text-input id="nombres" class="form-control" type="text" name="nombres" :value="old('nombres')" required autofocus autocomplete="nombres" />
                            <x-input-error :messages="$errors->get('nombres')" class="mt-2" />
                        </div>

                        <!-- Estado civil -->
                        <div class="form-group">
                            <x-input-label for="estado_civil" :value="__('Estado Civil')" />
                            <x-text-input id="estado_civil" class="form-control" type="text" name="estado_civil" :value="old('estado_civil')" required autocomplete="estado_civil" />
                            <x-input-error :messages="$errors->get('estado_civil')" class="mt-2" />
                        </div>

                        <!-- DNI -->
                        <div class="form-group">
                            <x-input-label for="dni" :value="__('DNI')" />
                            <x-text-input id="dni" class="form-control" type="text" name="dni" :value="old('dni')" required autocomplete="dni" />
                            <x-input-error :messages="$errors->get('dni')" class="mt-2" />
                        </div>

                        <!-- Teléfono -->
                        <div class="form-group">
                            <x-input-label for="telefono" :value="__('Teléfono')" />
                            <x-text-input id="telefono" class="form-control" type="text" name="telefono" :value="old('telefono')" required autocomplete="telefono" />
                            <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
                        </div>

                        <!-- Dirección -->
                        <div class="form-group">
                            <x-input-label for="direccion" :value="__('Dirección')" />
                            <x-text-input id="direccion" class="form-control" type="text" name="direccion" :value="old('direccion')" required autocomplete="direccion" />
                            <x-input-error :messages="$errors->get('direccion')" class="mt-2" />
                        </div>

                        <!-- Fecha de Nacimiento -->
                        <div class="form-group">
                            <x-input-label for="fecha_nacimiento" :value="__('Fecha de Nacimiento')" />
                            <x-text-input id="fecha_nacimiento" class="form-control" type="date" name="fecha_nacimiento" :value="old('fecha_nacimiento')" required autocomplete="fecha_nacimiento" />
                            <x-input-error :messages="$errors->get('fecha_nacimiento')" class="mt-2" />
                        </div>
                    </div>

                    <!-- Segunda columna -->
                    <div class="col-md-6">
                        <!-- Apellido -->                      
                        <div class="form-group">
                            <x-input-label for="apellidos" :value="__('Apellido')" />
                            <x-text-input id="apellidos" class="form-control" type="text" name="apellidos" :value="old('apellidos')" required autocomplete="apellidos" />
                            <x-input-error :messages="$errors->get('apellidos')" class="mt-2" />
                        </div>

                        <!-- Género -->
                        <div class="form-group">
                            <x-input-label for="genero" :value="__('Género')" />
                            <select 
                                id="genero" 
                                name="genero" 
                                class="form-control"
                                required
                                autocomplete="genero"
                            >
                                <option value="" disabled selected>Seleccione su género</option>
                                <option value="M" {{ old('genero') === 'M' ? 'selected' : '' }}>Masculino</option>
                                <option value="F" {{ old('genero') === 'F' ? 'selected' : '' }}>Femenino</option>
                            </select>
                            <x-input-error :messages="$errors->get('genero')" class="mt-2" />
                        </div>

                        <!-- Nacionalidad -->
                        <div class="form-group">
                            <x-input-label for="nacionalidad" :value="__('Nacionalidad')" />
                            <x-text-input id="nacionalidad" class="form-control" type="text" name="nacionalidad" :value="old('nacionalidad')" required autocomplete="nacionalidad" />
                            <x-input-error :messages="$errors->get('nacionalidad')" class="mt-2" />
                        </div>

                        <!-- Edad -->
                        <div class="form-group">
                            <x-input-label for="edad" :value="__('Edad')" />
                            <x-text-input id="edad" class="form-control" type="number" name="edad" :value="old('edad')" required autocomplete="edad" />
                            <x-input-error :messages="$errors->get('edad')" class="mt-2" />
                        </div>

                        <!-- Nombre de Usuario -->
                        <div class="form-group">
                            <x-input-label for="nombre_usuario" :value="__('Nombre de Usuario')" />
                            <x-text-input id="nombre_usuario" class="form-control" type="text" name="nombre_usuario" :value="old('nombre_usuario')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('nombre_usuario')" class="mt-2" />
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Contraseña -->
                        <div class="form-group">
                            <x-input-label for="contrasena" :value="__('Contraseña')" />
                            <x-text-input id="contrasena" class="form-control" type="password" name="contrasena" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('contrasena')" class="mt-2" />
                        </div>
                    </div>
                </div>

                <!-- Botón de registro -->
                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md" href="{{ route('login') }}">
                        {{ __('¿Ya estás registrado?') }}
                    </a>

                    <x-primary-button class="ms-4 BottonBlue">
                        {{ __('Registrar') }}
                    </x-primary-button>
                </div>
            </div>
        </form>
    </x-guest-layout>
</body>
</html>