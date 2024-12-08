<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ReservacionesController extends Controller
{
    // Método para listar las reservaciones del modulo
    public function listar()
    {
        $response = Http::get('http://localhost:3000/reservaciones');
        $data = $response->json();

        if ($response->successful()) {
            $reservaciones = $data;
            return view('Reservaciones', compact('reservaciones'));
        } else {
            return back()->withErrors(['error' => 'No se pudo obtener la lista de reservaciones.']);
        }
    }

    // Método para crear una nueva reservación
    public function crear(Request $request)
    {
        $response = Http::post('http://localhost:3000/reservaciones', [
            'cod_persona' => $request->input('cod_persona'),
            'cod_vehiculo' => $request->input('cod_vehiculo'),
            'fecha_reservacion' => $request->input('fecha_reservacion'),
        ]);

        if ($response->successful()) {
            return response()->json(['success' => 'Reservación creada con éxito.']);
        } else {
            return response()->json(['error' => 'Hubo un problema al crear la reservación.'], 500);
        }
    }

    // Método para actualizar una reservación existente
    public function actualizar(Request $request, $id)
    {
        $response = Http::put("http://localhost:3000/reservaciones/$id", [
            'cod_persona' => $request->input('cod_persona'),
            'cod_vehiculo' => $request->input('cod_vehiculo'),
            'fecha_reservacion' => $request->input('fecha_reservacion'),
        ]);

        if ($response->successful()) {
            return response()->json(['success' => 'Reservación actualizada correctamente.']);
        } else {
            return response()->json(['error' => 'Hubo un error al actualizar la reservación.'], 500);
        }
    }
}