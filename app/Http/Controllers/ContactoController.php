<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MensajeRecibido;

class ContactoController extends Controller
{
    public function store(){

        request()->validate([
            'nombre' => 'required',
            'email' => 'requiere|email',
            'telefono' => 'required',
            'mensaje' => 'required\min:3'
        ], [
            'nombre.required' => __('I need your name')

        ]);

        Mail::to('abainf@gmail.com')->send(new MesajeRecibido);

        return 'Datos enviados';
    }

   
}
