<?php

namespace App\Http\Controllers;

use App\Models\registros;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\clientes;
use App\Models\servicios;
use Carbon\Carbon;

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
            'id_servicio' => 'required|numeric',
            'id_cliente' => 'required|numeric',
        ]);

        $registros = new registros;
        $fecha = Carbon::now();
        $registros->fecha_contrato = $fecha;
        $addMonth = $fecha->copy()->addMonth(1);
        $registros->fecha_instalacion = $addMonth;
        $registros->id_servicio = $request->id_servicio;
        $registros->id_cliente = $request->id_cliente;
        $registros->id = $request->id_cliente . $request->id_servicio . preg_replace('([^0-9])', '', $fecha);

        $registros->save();
        return redirect()->route('registros.index')->with('success', 'Registro Exitoso');
    }


    public function hireService(Request $request)
    {
        $request->validate([
            'id_servicio' => 'required|numeric',
            'id_cliente' => 'required|numeric',
        ]);

        $registros = new registros;
        $fecha = Carbon::now();
        $registros->fecha_contrato = $fecha;
        $addMonth = $fecha->copy()->addMonth(1);
        $registros->fecha_instalacion = $addMonth;
        $registros->id_servicio = $request->id_servicio;
        $registros->id_cliente = $request->id_cliente;
        $registros->id = $request->id_cliente . $request->id_servicio . preg_replace('([^0-9])', '', $fecha);
        $registros->save();
        return view('users.success', ['id' => $registros->id]);
    }

    public function show(string $id)
    {
        $registro = registros::find($id);
        $clientes = clientes::all();
        $servicios = servicios::all();
        return view('admin.registros.show',  ['registro' => $registro, 'clientes' => $clientes, 'servicios' => $servicios]);
    }

    public function findClient(Request $request)
    {
        $id = trim($request->get('id'));
        $servicios = servicios::all();
        if (empty($id)) {
            $cliente = null;
        } else {
            $cliente = clientes::where('id', 'LIKE', '%' . $id . '%')->first();
        }
        return view('users.hire', compact('cliente', 'id', 'servicios'));
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

    public function mostrarRegistros()
    {
        $fechaInicio = Carbon::now();
        $fechaFin = $fechaInicio->copy()->addDays(10);
        $registros = registros::whereBetween('fecha_instalacion', [$fechaInicio, $fechaFin])->get();
        $conteo = registros::select('id_cliente', registros::raw('count(*) as total_registros'))
            ->whereBetween('fecha_instalacion', [$fechaInicio, $fechaFin])
            ->groupBy('id_cliente')
            ->get();
        return view('admin.dashboard', compact('registros', 'conteo'));
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
