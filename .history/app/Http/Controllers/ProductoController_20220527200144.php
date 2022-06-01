<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{
    public function index(){ 
        $productos = Product::all();
        return view( 'productos', compact( 'productos' ) ); 
    }
    public function verificacion(){ 
        
        $idusuario = Auth::user()->name;
        return view( 'verificacion' ); 
    }

    public function enviar_orden(){

    }
}
