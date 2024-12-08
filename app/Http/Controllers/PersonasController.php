<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

class PersonasController extends Controller
{
    public function listar()
    {
        $response = Http::get('http://localhost:3000/personas');
        $personas = $response->json();
        if ($response->successful()) {
            return view('personas', compact('personas'));
        } else {
            return back()->withErrors(['error' => 'No se pudo obtener la lista de las personas.']);
        }
    }
}