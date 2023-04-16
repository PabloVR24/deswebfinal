<?php

namespace App\Http\Controllers;

use App\Models\sugerencias;
use Illuminate\Http\Request;

class sugerenciasController extends Controller
{
    public function index()
    {
        $sugerencias = sugerencias::all();
        return view('admin.sugerencias.index', ['sugerencias' => $sugerencias]);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function store(Request $request)
    {
        $request->validate([
            'autor' => 'required|string|min:3|max:255',
            'contenido' => 'required|string|min:3|max:500',
            'calificacion' => 'required|numeric|min:1|max:5',
        ]);

        $sugerencia = new sugerencias;
        $sugerencia->autor = $request->autor;
        $sugerencia->contenido = $request->contenido;
        $sugerencia->calificacion = $request->calificacion;
        $sugerencia->save();
        return back()->withInput()->with('success', 'Sugerencia Registrada Exitosamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
