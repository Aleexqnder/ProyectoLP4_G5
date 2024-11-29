<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use GuzzleHttp\Client;

class RegisterController extends Controller
{
    /**
     * Display the registration view.
     */
    public function showRegisterForm(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function register(Request $request): RedirectResponse
    {
        $request->validate([
            'nombres' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'dni' => ['required', 'string', 'max:20'],
            'telefono' => ['required', 'string', 'max:15'],
            'direccion' => ['required', 'string', 'max:255'],
            'fecha_nacimiento' => ['required', 'date'],
            'estado_civil' => ['required', 'string', 'max:20'],
            'genero' => ['required', 'string', 'max:10'],
            'nacionalidad' => ['required', 'string', 'max:50'],
            'edad' => ['required', 'integer'],
            'nombre_usuario' => ['required', 'string', 'max:255'],
            'contrasena' => ['required', Rules\Password::defaults()],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:usuarios,Email'],
        ]);

        try {
            // Crear el usuario en la tabla usuarios
            $user = User::create([
                'nombre_usuario' => $request->nombre_usuario,
                'Email' => $request->email,
                'contrasena' => Hash::make($request->contrasena),
                'cod_persona' => null, // Asigna null o el valor adecuado según tu lógica
            ]);

            // Realizar la solicitud HTTP a la API de Node.js
            $client = new Client();
            $response = $client->post('http://localhost:3000/UsuariosCLS', [
                'json' => [
                    'NOMBRES' => $request->nombres,
                    'APELLIDOS' => $request->apellidos,
                    'DNI' => $request->dni,
                    'TELEFONO' => $request->telefono,
                    'DIRECCION' => $request->direccion,
                    'FECHA_NACIMIENTO' => $request->fecha_nacimiento,
                    'ESTADO_CIVIL' => $request->estado_civil,
                    'GENERO' => $request->genero,
                    'NACIONALIDAD' => $request->nacionalidad,
                    'EDAD' => $request->edad,
                    'NOMBRE_USUARIO' => $request->nombre_usuario,
                    'CONTRASENA' => $request->contrasena,
                    'EMAIL' => $request->email,
                ]
            ]);

            if ($response->getStatusCode() == 201) {
                event(new Registered($user));
                Auth::login($user);
                return redirect()->route('dashboard')->with('success', 'Usuario registrado correctamente.');
            } else {
                return redirect()->back()->with('error', 'Error al registrar el usuario en la API.')->withInput();
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al registrar el usuario: ' . $e->getMessage())->withInput();
        }
    }
}