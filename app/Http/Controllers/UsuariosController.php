<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class UsuariosController extends Controller
{
       
    public function listar()
    {
        $response = Http::get('http://localhost:3000/usuarios');
        $usuarios = $response->json();
        if ($response->successful()) {
            return view('usuarios', compact('usuarios'));
        } else {
            return back()->withErrors(['error' => 'No se pudo obtener la lista de los Usuarios.']);
        }
    }
    

    public function crear(Request $request)
    {
        $response = Http::post('http://localhost:3000/usuarios', [
            'cod_usuario' => $request->input('cod_usuario'),
            'cod_persona' => $request->input('cod_persona'),
            'nombre_usuario' => $request->input('nombre_usuario'),
            'contrasena' => $request->input('contrasena'),
            'email' => $request->input('email'),    
        ]);
        if ($response->successful()) {
            return response()->json(['success' => 'Usuario creado con éxito.']);
        } else {
            return response()->json(['error' => 'Hubo un problema al crear el Usuario.'], 500);
        }
    }
    
    public function actualizar(Request $request, $id)
    {
        $response = Http::put('http://localhost:3000/usuarios/' . $id, [
            'nombre_usuario' => $request->input('nombre_usuario'),
            'contrasena' => $request->input('contrasena'),
            'email' => $request->input('email'),
        ]);
        if ($response->successful()) {
            return response()->json(['success' => 'Usuario actualizado con éxito.']);
        } else {
            return response()->json(['error' => 'Hubo un problema al actualizar el Usuario.'], 500);
        }
    }  
}