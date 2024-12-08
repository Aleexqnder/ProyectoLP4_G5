<?php
//controlador para modulo reportes
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class ReportesController extends Controller
{
    public function listar()
    {
        $response = Http::get('http://localhost:3000/Reportes');
        $data = $response->json();
        if ($response->successful()) {
            $reportes = $data['data'];
            return view('Reportes', compact('reportes'));
        } else {
            return back()->withErrors(['error' => 'No se pudo obtener la lista de reportes.']);
        }
    }
    public function crear(Request $request)
    {
        $response = Http::post('http://localhost:3000/Reportes', [
            'cod_reporte' => $request->input('cod_reporte'),
            'des_reporte' => $request->input('des_reporte'),
            'fecha_reporte' => $request->input('fecha_reporte'),
    
        ]);
        if ($response->successful()) {
            return response()->json(['success' => 'Reporte creado con éxito.']);
        } else {
            return response()->json(['error' => 'Hubo un problema al crear el reporte.'], 500);
        }
    }
    public function actualizar(Request $request, $id)
    {
        $response = Http::put('http://localhost:3000/Reportes', [
            'cod_reporte' => $id,
            'cod_reporte' => $request->input('cod_reporte'),
            'des_reporte' => $request->input('des_reporte'),
            'fecha_reporte' => $request->input('fecha_reporte'),
            
        ]);
        if ($response->successful()) {
            return response()->json(['success' => 'Reporte actualizado correctamente.']);
        } else {
            return response()->json(['error' => 'Hubo un error al actualizar el reporte.'], 500);
        }
    }
}