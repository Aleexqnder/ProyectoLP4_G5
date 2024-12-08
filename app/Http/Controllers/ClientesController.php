<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class ClientesController extends Controller
{
    public function listar()
    {
        $response = Http::get('http://localhost:3000/clientes');
        $clientes = $response->json();
        if ($response->successful()) {
            return view('clientes', compact('clientes'));
        } else {
            return back()->withErrors(['error' => 'No se pudo obtener la lista de los clientes.']);
        }
    }
    

    public function crear(Request $request)
    {
        $response = Http::post('http://localhost:3000/clientes', [
            'NOMBRES' => $request->input('NOMBRES'),
            'APELLIDOS' => $request->input('APELLIDOS'),
            'DNI' => $request->input('DNI'),
            'TELEFONO' => $request->input('TELEFONO'),
            'DIRECCION' => $request->input('DIRECCION'),
            'FECHA_NACIMIENTO' => $request->input('FECHA_NACIMIENTO'),
            'ESTADO_CIVIL' => $request->input('ESTADO_CIVIL'),
            'GENERO' => $request->input('GENERO'),
            'NACIONALIDAD' => $request->input('NACIONALIDAD'),
            'NOMBRE_USUARIO' => $request->input('NOMBRE_USUARIO'),
            'CONTRASENA' => $request->input('CONTRASENA'),
            'EMAIL' => $request->input('EMAIL'),
            'HISTORIAL_COMPRAS' => $request->input('HISTORIAL_COMPRAS'),
            'FECHA_REGISTRO' => $request->input('FECHA_REGISTRO'),
            'ESTADO' => $request->input('ESTADO'),
            'EDAD' => $request->input('EDAD'),
            
        ]);
        if ($response->successful()) {
            return response()->json(['success' => 'Cliente creado con éxito.']);
        } else {
            return response()->json(['error' => 'Hubo un problema al crear el Cliente.'], 500);
        }
    }
    
    public function actualizar(Request $request, $id)
    {
        $response = Http::put('http://localhost:3000/clientes/' . $id, [
            'cod_persona' => $id,
            'nombres' => $request->input('nombres'),
            'apellidos' => $request->input('apellidos'),
            'dni' => $request->input('dni'),
            'telefono' => $request->input('telefono'),
            'direccion' => $request->input('direccion'),
            'fecha_nacimiento' => $request->input('fecha_nacimiento'),
            'estado_civil' => $request->input('estado_civil'),
            'genero' => $request->input('genero'),
            'nacionalidad' => $request->input('nacionalidad'),
            'historial_compras' => $request->input('historial_compras'),
            'estado' => $request->input('estado'),
            'edad' => $request->input('edad'),
        ]);
        if ($response->successful()) {
            return response()->json(['success' => 'Cliente actualizado correctamente.']);
        } else {
            return response()->json(['error' => 'Hubo un error al actualizar el Cliente.'], 500);
        }
    }   
}