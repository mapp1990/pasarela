<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{
    protected $redirectTo = RouteServiceProvider::;

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){ 
        $products = Product::all();
        return view( 'productos', compact( 'products' )); 
    }
    public function verificacion(){ 
        
        $idusuario = Auth::user()->name;
        return view( 'verificacion' ); 
    }

    public function enviar_orden(){
        return null;
    }
}
