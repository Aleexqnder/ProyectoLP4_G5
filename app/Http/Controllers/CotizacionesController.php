<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class CotizacionesController extends Controller
{
    public function listar()
    {
        $response = Http::get('http://localhost:3000/cotizaciones');
        $cotizaciones = $response->json();
        if ($response->successful()) {
            return view('cotizaciones', compact('cotizaciones'));
        } else {
            return back()->withErrors(['error' => 'No se pudo obtener la lista de las cotizaciones.']);
        }
    }
    

    public function crear(Request $request)
    {
        $response = Http::post('http://localhost:3000/cotizaciones', [
            'cod_persona' => $request->input('cod_persona'),
            'fecha' => $request->input('fecha'),
            'descripcion' => $request->input('descripcion'),
            'monto' => $request->input('monto'),
            'cod_cliente' => $request->input('cod_cliente'),
            'cod_empleado' => $request->input('cod_empleado'),
            'cantidad' => $request->input('cantidad'),
            'tipo_producto' => $request->input('tipo_producto'),
            'estado_producto' => $request->input('estado_producto'),
        ]);
        if ($response->successful()) {
            return response()->json(['success' => 'Cotizacione creada con éxito.']);
        } else {
            return response()->json(['error' => 'Hubo un problema al crear la cotización.'], 500);
        }
    }
    
    public function actualizar(Request $request, $id)
    {
        $response = Http::put('http://localhost:3000/cotizaciones/' . $id, [
            'cod_persona' => $request->input('cod_persona'),
            'fecha' => $request->input('fecha'),
            'cod_detalle' => $request->input('cod_detalle'),
            'descripcion' => $request->input('descripcion'),
            'monto' => $request->input('monto'),
            'cod_cliente' => $request->input('cod_cliente'),
            'cod_empleado' => $request->input('cod_empleado'),
            'cantidad' => $request->input('cantidad'),
            'tipo_producto' => $request->input('tipo_producto'),
            'estado_producto' => $request->input('estado_producto'),
        ]);
        if ($response->successful()) {
            return response()->json(['success' => 'Cotización actualizada correctamente.']);
        } else {
            return response()->json(['error' => 'Hubo un error al actualizar la cotización.'], 500);
        }
    }
}