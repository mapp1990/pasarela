<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProductoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){ 
        $products = Product::all();
        return view( 'productos', compact( 'products' )); 
    }
    
    public function verificacion(Request $request){ 
        $idusuario = Auth::user()->name;
        //dd($request);
        return view( 'verificacion', compact('request') ); 
    }

    public function enviar_orden(){
        return null;
    }
}
