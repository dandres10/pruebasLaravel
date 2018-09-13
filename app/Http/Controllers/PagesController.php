<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMesssageRequest;

class PagesController extends Controller
{

    public function __construct(){
        $this->middleware('example',['only' => ['home']]);
    }

    public function home()
    {
        return view('home');
    }


    public function saludo($nombre = "Andres")
    {

        $consolas = [
            "play",
            "xbox",
            "Wii",
        ];
        return view('saludo', compact('nombre', 'consolas'));
    }

    public function mensajes(CreateMesssageRequest $request)
    {
        $request->all();
        return back()->with('info', 'tu mensaje ha  sido enviado correctamente');

    }
}
