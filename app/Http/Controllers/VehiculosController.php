<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VehiculosController extends Controller
{
    public function listar()
    {
        $response = Http::get('http://localhost:3000/VEHICULOS');
        $data = $response->json();

        if ($response->successful()) {
            $vehiculos = $data['data'];
            return view('Vehiculos', compact('vehiculos'));
        } else {
            return back()->withErrors(['error' => 'No se pudo obtener la lista de vehiculos.']);
        }
    }

    public function crear(Request $request)
    {
        $response = Http::post('http://localhost:3000/VEHICULOS', [
            'cod_persona' => $request->input('cod_persona'),
            'marca' => $request->input('marca'),
            'modelo' => $request->input('modelo'),
            'año' => $request->input('año'),
        ]);

        if ($response->successful()) {
            return response()->json(['success' => 'Vehiculo  creado con éxito.']);
        } else {
            return response()->json(['error' => 'Hubo un problema al crear vehiculo.'], 500);
        }
    }

    public function actualizar(Request $request, $id)
    {
        $response = Http::put('http://localhost:3000/VEHICULOS', [
            'cod_vehiculo' => $id,
            'cod_persona' => $request->input('cod_persona'),
            'marca' => $request->input('marca'),
            'modelo' => $request->input('modelo'),
            'año' => $request->input('año'),
        ]);

        if ($response->successful()) {
            return response()->json(['success' => 'Vehiculo actualizado correctamente.']);
        } else {
            return response()->json(['error' => 'Hubo un error al actualizar vehiculo.'], 500);
        }
    }
}

