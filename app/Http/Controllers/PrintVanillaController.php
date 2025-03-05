<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer; 

class PrintVanillaController extends Controller
{
    public function index(){

        return view('vanilla.index');
    }

    public function print(Request $request){

        $tickets = range($request->first, $request->last);
        $file = $request->file('imagen');
        $imagen = NULL;
        if ($file) {
            $imagen = base64_encode(file_get_contents($file->path()));
        }

        return view('vanilla.tickets-'.$request->type, compact('tickets', 'imagen'));
    }
}
