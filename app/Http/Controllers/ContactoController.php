<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index(){

        

    }

   public function store(){
       Mail::to('')->send($correo);

       return "Mensaje enviado";
   }
}
