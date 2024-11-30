<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ReparacionesController extends Controller
{
    public function listar()
    {
        $response = Http::get('http://localhost:3000/REPARACIONES');
        $data = $response->json();

        if ($response->successful()) {
            $reparaciones = $data['data'];
            return view('Reparaciones', compact('reparaciones'));
        } else {
            return back()->withErrors(['error' => 'No se pudo obtener la lista de reparaciones.']);
        }
    }

    public function crear(Request $request)
    {
        $response = Http::post('http://localhost:3000/REPARACIONES', [
            'cod_vehiculo' => $request->input('cod_vehiculo'),
            'descripcion' => $request->input('descripcion'),
            'fecha_reparacion' => $request->input('fecha_reparacion'),
            'costo' => $request->input('costo'),
        ]);

        if ($response->successful()) {
            return response()->json(['success' => 'Reparación creada con éxito.']);
        } else {
            return response()->json(['error' => 'Hubo un problema al crear la reparación.'], 500);
        }
    }

    public function actualizar(Request $request, $id)
    {
        $response = Http::put('http://localhost:3000/REPARACIONES', [
            'cod_reparacion' => $id,
            'cod_vehiculo' => $request->input('cod_vehiculo'),
            'descripcion' => $request->input('descripcion'),
            'fecha_reparacion' => $request->input('fecha_reparacion'),
            'costo' => $request->input('costo'),
        ]);

        if ($response->successful()) {
            return response()->json(['success' => 'Reparación actualizada correctamente.']);
        } else {
            return response()->json(['error' => 'Hubo un error al actualizar la reparación.'], 500);
        }
    }
}

