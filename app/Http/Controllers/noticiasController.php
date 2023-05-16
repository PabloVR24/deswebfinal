<?php

namespace App\Http\Controllers;

use App\Models\noticias;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class noticiasController extends Controller
{
    public function index()
    {
        $noticias = noticias::all();
        return view('admin.noticias.index', ['noticias' => $noticias]);
    }

    public function indexGuest()
    {
        $noticias = noticias::orderBy('created_at', 'asc')->get();
        return view('todo', ['noticias' => $noticias]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'author' => 'required|string|min:5|',
            'title' => 'required|string|min:20',
            'url' => 'required|string|min:10',
            'publishedAt' => 'required|string|min:10',
            'urlToImage' => 'required|string|min:10',
        ]);

        $noticias = new noticias;
        $noticias->author = $request->author;
        $noticias->title = $request->title;
        $noticias->url = $request->url;
        $noticias->publishedAt = $request->publishedAt;
        $noticias->urlToImage = $request->urlToImage;
        $noticias->save();

        return redirect()->route('noticias.index')->with('success', 'Registro Exitoso');
    }

    public function show(string $id)
    {
        $noticia = noticias::find($id);
        return view('admin.noticias.show', ['noticia' => $noticia]);
    }

    public function update(Request $request, string $id)
    {
        $noticia = noticias::find($id);
        $noticia->author = $request->author;
        $noticia->title = $request->title;
        $noticia->url = $request->url;
        $noticia->publishedAt = $request->publishedAt;
        $noticia->urlToImage = $request->urlToImage;
        $noticia->save();
        return redirect()->route('noticias.index')->with('success', 'Actualizado Correctamente');
    }


    public function getNews()
    {
        $url = 'https://newsapi.org/v2/everything?q=tech&from=2023-04-20&to=2023-04-20&sortBy=popularity&apiKey=15981b3988bc425693188994981f8b2f';

        $client = new Client();
        $response = $client->get($url);

        $data = json_decode($response->getBody(), true);

        // Procesa los datos según sea necesario

        return response()->json($data);
    }


    public function destroy(string $id)
    {
        $noticia = noticias::find($id);
        // $category->todos()->each(function ($todo) {
        //     $todo->delete();
        // });
        $noticia->delete();

        return redirect()->route('noticias.index')->with('success', 'Categoria Eliminada');
    }
}
