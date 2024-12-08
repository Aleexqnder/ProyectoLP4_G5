<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class EmpleadosController extends Controller
{
    public function listar()
    {
        $response = Http::get('http://localhost:3000/empleados');
        $empleados = $response->json();
        if ($response->successful()) {
            return view('empleados', compact('empleados'));
        } else {
            return back()->withErrors(['error' => 'No se pudo obtener la lista de los empleados.']);
        }
    }
    

    public function crear(Request $request)
    {
        $response = Http::post('http://localhost:3000/empleados', [
            'nombres' => $request->input('nombres'),
            'apellidos' => $request->input('apellidos'),
            'dni' => $request->input('dni'),
            'telefono' => $request->input('telefono'),
            'direccion' => $request->input('direccion'),
            'fecha_nacimiento' => $request->input('fecha_nacimiento'),
            'estado_civil' => $request->input('estado_civil'),
            'genero' => $request->input('genero'),
            'nacionalidad' => $request->input('nacionalidad'),
            'nombre_usuario' => $request->input('nombre_usuario'),
            'contrasena' => $request->input('contrasena'),
            'email' => $request->input('email'),
            'salario' => $request->input('salario'),
            'puesto' => $request->input('puesto'),
            'fecha_contratacion' => $request->input('fecha_contratacion'),
            'edad' => $request->input('edad'),  
        ]);
        if ($response->successful()) {
            return response()->json(['success' => 'Empleado creado con éxito.']);
        } else {
            return response()->json(['error' => 'Hubo un problema al crear el Empleado.'], 500);
        }
    }
    
    public function actualizar(Request $request, $id)
    {
        $response = Http::put('http://localhost:3000/empleados/' . $id, [
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
            'edad' => $request->input('edad'),
            'salario' => $request->input('salario'),
            'puesto' => $request->input('puesto'),
            'fecha_contratacion' => $request->input('fecha_contratacion'),
        ]);
        if ($response->successful()) {
            return response()->json(['success' => 'Empleado actualizado correctamente.']);
        } else {
            return response()->json(['error' => 'Hubo un error al actualizar el Empleado.'], 500);
        }
    }
}