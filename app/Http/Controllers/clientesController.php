<?php

namespace App\Http\Controllers;

use App\Models\clientes;
use Illuminate\Http\Request;

class clientesController extends Controller
{
    public function index()
    {
        $clientes = clientes::all();
        return view('admin.clientes.index', ['clientes' => $clientes]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_cliente' => 'required|string|min:3|max:255',
            'apellido_pat' => 'required|string|min:3|max:255',
            'apellido_mat' => 'required|string|min:3|max:255',
            'telefono' => 'required|numeric|min:1000000000|max:99999999999',
            'email' => 'required|email|min:3|max:255',
        ]);

        $clientes = new clientes;
        $clientes->nombre_cliente = $request->nombre_cliente;
        $clientes->apellido_pat = $request->apellido_pat;
        $clientes->apellido_mat = $request->apellido_mat;
        $clientes->telefono = $request->telefono;
        $clientes->email = $request->email;
        $clientes->save();
        return redirect()->route('clientes.index')->with('success', 'Registro Exitoso');
    }

    public function show(string $id)
    {
        $cliente = clientes::find($id);
        return view('admin.clientes.show', ['cliente' => $cliente]);
    }

    public function update(Request $request, string $id)
    {
        $cliente = clientes::find($id);
        $cliente->nombre_cliente = $request->nombre_cliente;
        $cliente->apellido_pat = $request->apellido_pat;
        $cliente->apellido_mat = $request->apellido_mat;
        $cliente->telefono = $request->telefono;
        $cliente->email = $request->email;
        $cliente->save();
        return redirect()->route('clientes.index')->with('success', 'Actualizado Correctamente');
    }

    public function destroy(string $id)
    {
        $cliente = clientes::find($id);
        // $category->todos()->each(function ($todo) {
        //     $todo->delete();
        // });
        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', 'Categoria Eliminada');
    }
}
