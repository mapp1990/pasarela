<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{
    public function index(){ return view( 'productos' ); }
    public function verificacion(){ 
        
        $idusuario = Auth::user()->name;
        return 'Bienvenido!'.$idusuario; 
    }
}
