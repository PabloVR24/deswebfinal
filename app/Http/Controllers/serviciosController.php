<?php

namespace App\Http\Controllers;

use App\Models\noticias;
use App\Models\servicios;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class serviciosController extends Controller
{
    public function index()
    {
        $servicios = servicios::all();
        return view('admin.servicios.index', ['servicios' => $servicios]);
    }

    public function indexall()
    {
        $servicios = servicios::all();
        $noticias = noticias::all();
        return view('users.servicios', ['servicios' => $servicios], ['noticias' => $noticias]);
    }

    public function allServices()
    {
        $servicios = servicios::all();
        return view('users.allServices', ['servicios' => $servicios]);
    }

    public function indexHosting()
    {
        $serviciosHosting = servicios::where('categoria', 'hosting')->get();
        return view('users.web_hosting', ['servicios' => $serviciosHosting]);
    }

    public function indexDomains()
    {
        $serviciosHosting = servicios::where('categoria', 'dominio')->get();
        return view('users.dominios', ['servicios' => $serviciosHosting]);
    }

    public function indexDedicated()
    {
        $serviciosHosting = servicios::where('categoria', 'DEDICADO')->get();
        return view('users.servidor_dedicado', ['servicios' => $serviciosHosting]);
    }

    public function indexOthers()
    {
        $serviciosHosting = servicios::where('categoria', 'CLOUD')->get();
        return view('users.mas_servicios', ['servicios' => $serviciosHosting]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_servicio' => 'required|string|min:3|max:255',
            'precio_servicio' => 'required|numeric|min:50|max:10000',
            'precio_oferta' => 'required|numeric|min:50|max:10000',
            'categoria' => 'required',
            'frase_servicio' => 'required|string|min:10|max:255',
            'beneficios_servicio' => 'required|string|min:3|max:2500',
        ]);

        $servicios = new servicios;
        $servicios->nombre_servicio = $request->nombre_servicio;
        $servicios->precio_servicio = $request->precio_servicio;
        $servicios->precio_oferta = $request->precio_oferta;
        $servicios->categoria = $request->categoria;
        $servicios->frase_servicio = $request->frase_servicio;
        $servicios->beneficios_servicio = $request->beneficios_servicio;
        $servicios->save();
        return redirect()->route('servicios.index')->with('success', 'Registro Exitoso');
    }

    public function show(string $id)
    {
        $servicio = servicios::find($id);
        return view('admin.servicios.show', ['servicio' => $servicio]);
    }

    public function findService(string $id)
    {
        $servicio = servicios::find($id);
        return view('users.servicio', ['servicio' => $servicio]);
    }

    public function update(Request $request, string $id)
    {
        $servicio = servicios::find($id);
        $servicio->nombre_servicio = $request->nombre_servicio;
        $servicio->precio_servicio = $request->precio_servicio;
        $servicio->beneficios_servicio = $request->beneficios_servicio;
        $servicio->categoria = $request->categoria;
        $servicio->frase_servicio = $request->frase_servicio;
        $servicio->precio_oferta = $request->precio_oferta;
        $servicio->save();
        return redirect()->route('servicios.index')->with('success', 'Actualizado Correctamente');
    }

    public function destroy(string $id)
    {
        $servicio = servicios::find($id);
        // $category->todos()->each(function ($todo) {
        //     $todo->delete();
        // });
        $servicio->delete();

        return redirect()->route('servicios.index')->with('success', 'Categoria Eliminada');
    }
    public function export(string $id)
    {
        $servicio = servicios::find($id);
        $data = [
            'servicio' => $servicio
        ];;
        $pdf = Pdf::loadView('users.exportservice', $data);
        $pdf->set_base_path(asset('css/export.css'));
        return $pdf->stream('SRV' . $id . '.pdf');
    }
}
