<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    public function index()
    {
        $noticias = Noticia::publicadas()
            ->ordenadas()
            ->get();

        return view('pages.noticias', compact('noticias'));
    }

    public function show($slug)
    {
        $noticia = Noticia::where('slug', $slug)
            ->where('publicado', true)
            ->firstOrFail();

        return view('pages.noticia-detalle', compact('noticia'));
    }
}
