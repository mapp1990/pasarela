@extends('layouts.main')

@section('content')

    <div class="flex-md-equal  col-12">
        @foreach($products as $producto)
            <div class="bg-dark col-6 col-md text-center text-white overflow-hidden">
                <div class="my-6 py-6" style="margin-top: 22px">
                    <h2 class="display-5">{{$producto->nombre}}</h2>
                    <p class="lead">{{$producto->descripcion}}</p>
                    <h2 class="display-5">{{$producto->precio}}</h2>
                </div>
                <div class="bg-light shadow-sm mx-auto" style="width: 80%; border-radius: 21px 21px 0 0;">
                    <img src="producto.png" width="100%" style="border-radius: 21px 21px 0 0;">
                    <button type="button" class="btn btn-info" style="margin-top: 30px; margin-bottom: 30px;">Comprar</button>
                </div>
            </div>
        @endforeach
    </div>

@endsection
    