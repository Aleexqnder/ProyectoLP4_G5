<?php
//Archivo para reporte
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ReportesController extends Controller
{   //lista de reportes
    public function listar()
    {
        $response = Http::get('http://localhost:3000/Reportes');
        $data = $response->json();

        if ($response->successful()) {
            $reportes = $data; 
            return view('Reportes', compact('reportes'));
        } else {
            return back()->withErrors(['error' => 'No se pudo obtener la lista de reportes.']);
        }
    }

    public function store(Request $request)
    {       //agregar reporte
        $validatedData = $request->validate([
            'DES_REPORTE' => 'required|string|max:255',
            'FECHA_REPORTE' => 'required|date_format:Y-m-d',
        ]);

        try {
            $response = Http::post('http://localhost:3000/Reportes', $validatedData);

            if ($response->failed()) {
                return response()->json(['error' => 'Error al agregar datos: ' . $response->body()], 500);
            }

            return response()->json(['message' => 'Reporte agregado exitosamente']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al conectar con la API: ' . $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
{
    // actualizar reporte
    $validatedData = $request->validate([
        'DES_REPORTE' => 'required|string|max:255',
        'FECHA_REPORTE' => 'required|date_format:Y-m-d',
    ]);

    try {
        $response = Http::put("http://localhost:3000/reportes/{$id}", $validatedData);
        if ($response->failed()) {
            return response()->json(['error' => 'Error al actualizar el reporte: ' . $response->body()], 500);
        }

        return response()->json(['message' => 'Reporte actualizado exitosamente']);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Error al conectar con la API: ' . $e->getMessage()], 500);
    }
}

    
}