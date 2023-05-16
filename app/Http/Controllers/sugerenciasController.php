<?php

namespace App\Http\Controllers;

use App\Models\sugerencias;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

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
            'email' => 'required|email',
            'g-recaptcha-response' => function ($attribute, $value, $fail) {
                $secretKey = "6LdD0gwmAAAAAOHfhH9VmCkWOsMGn601VBdE7kuh";
                $response = $value;
                $userIP = $_SERVER['REMOTE_ADDR'];
                $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response&remoteip=$userIP";
    
                $client = new Client();
                $response = $client->get($url);
                $responseData = json_decode($response->getBody());
    
                if (!$responseData->success) {
                    Session::flash('g-recaptcha-response', 'Favor de Marcar el Captcha');
                    Session::flash('alert-class', 'alert-danger');
                    $fail($attribute . 'google reCaptcha failed');
                }
            }
        ]);

        $sugerencia = new sugerencias;
        $sugerencia->autor = $request->autor;
        $sugerencia->contenido = $request->contenido;
        $sugerencia->email = $request->email;
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
