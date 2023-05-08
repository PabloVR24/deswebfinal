<?php

namespace App\Http\Controllers;

use App\Models\registros;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\clientes;
use App\Models\servicios;
use Illuminate\Support\Facades\DB;

class registrosController extends Controller
{
    public function index()
    {
        $registros = registros::all();
        $clientes = clientes::all();
        $servicios = servicios::all();
        return view('admin.registros.index', ['registros' => $registros, 'clientes' => $clientes, 'servicios' => $servicios]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha_contrato' => 'required|date',
            'fecha_instalacion' => 'required|date',
            'id_servicio' => 'required|numeric',
            'id_cliente' => 'required|numeric',
        ]);

        $registros = new registros;
        $registros->id = $request->id_cliente . $request->id_servicio . preg_replace('([^0-9])', '', $request->fecha_contrato) . preg_replace('([^0-9])', '', $request->fecha_instalacion);;
        $registros->fecha_contrato = $request->fecha_contrato;
        $registros->fecha_instalacion = $request->fecha_instalacion;
        $registros->id_servicio = $request->id_servicio;
        $registros->id_cliente = $request->id_cliente;

        $registros->save();
        return redirect()->route('registros.index')->with('success', 'Registro Exitoso');
    }

    public function show(string $id)
    {
        $registro = registros::find($id);
        $clientes = clientes::all();
        $servicios = servicios::all();
        return view('admin.registros.show',  ['registro' => $registro, 'clientes' => $clientes, 'servicios' => $servicios]);
    }

    public function findregister(Request $request)
    {
        $texto = trim($request->get('texto'));
        if (empty($texto)) {
            $registros = collect();
        } else {
            $registros = registros::where('id', 'LIKE', '%' . $texto . '%')->get();
        }
        return view('users.search', compact('registros', 'texto'))->with('registros', $registros);
    }



    public function update(Request $request, string $id)
    {
        $registro = registros::find($id);
        $registro->fecha_contrato = $request->fecha_contrato;
        $registro->fecha_instalacion = $request->fecha_instalacion;
        $registro->id_servicio = $request->id_servicio;
        $registro->id_cliente = $request->id_cliente;
        $registro->save();
        return redirect()->route('registros.index')->with('success', 'Actualizado Correctamente');
    }

    public function destroy(string $id)
    {
        $registro = registros::find($id);
        $registro->delete();
        return redirect()->route('registros.index')->with('success', 'Categoria Eliminada');
    }

    public function export(string $id)
    {
        $registro = registros::find($id);
        $data = [
            'registro' => $registro
        ];
        $pdf = Pdf::loadView('users.export', $data);
        return $pdf->stream('REG' . $id . '.pdf');
    }
}
