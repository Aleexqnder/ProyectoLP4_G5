<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    /**
     * Muestra la lista de empleados.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Si necesitas pasar datos a la vista, puedes hacerlo aquí.
        // Por ejemplo:
        // $empleados = Empleado::all();
        // return view('Empleado.Administrador', compact('empleados'));

        return view('Usuarios'); // Asegúrate de que la vista exista en resources/views/Administrador.blade.php
    }

    // Puedes añadir otros métodos como create, store, show, edit, update, destroy según tus necesidades.
}