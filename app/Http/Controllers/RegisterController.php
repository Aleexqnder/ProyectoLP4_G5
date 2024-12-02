<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RegisterController extends Controller
{

    public function crear(Request $request)
    {
        $response = Http::post('http://localhost:3000/UsuariosCLS', [
            'NOMBRES' => $request->input('nombres'),
            'APELLIDOS' => $request->input('apellidos'),
            'DNI' => $request->input('dni'),
            'TELEFONO' => $request->input('telefono'),
            'DIRECCION' => $request->input('direccion'),
            'FECHA_NACIMIENTO' => $request->input('fecha_nacimiento'),
            'ESTADO_CIVIL' => $request->input('estado_civil'),
            'GENERO' => $request->input('genero'),
            'NACIONALIDAD' => $request->input('nacionalidad'),
            'EDAD' => $request->input('edad'),
            'NOMBRE_USUARIO' => $request->input('nombre_usuario'),
            'CONTRASENA' => $request->input('contrasena'),
            'EMAIL' => $request->input('email')
        ]);

        if ($response->successful()) {
            // Redirigir al dashboard después de un registro exitoso
            return redirect()->route('login')->with('success', 'Usuario registrado correctamente.');
        } else {
            return redirect()->route('register.index')->with('error', 'Hubo un problema al registrar el usuario.');
        }
    }
}