<?php
namespace App\Http\Controllers;

header('Access-Control-Allow-Origin: *');

//use Illuminate\Http\Request;

class AppController extends Controller{
    public function index(){ return view( 'productos' ); }
}
?>