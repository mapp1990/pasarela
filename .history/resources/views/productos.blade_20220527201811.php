@extends('layouts.main')

@section('content')

    <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
        @for($products as $producto)
            <div class="bg-dark col-6 text-center text-white overflow-hidden">
                <div class="my-6 py-6">
                    <h2 class="display-5">{{$producto->name}}</h2>
                    <p class="lead">{{$producto->descripcion}}</p>
                </div>
                <div class="bg-light shadow-sm mx-auto" style="width: 80%; border-radius: 21px 21px 0 0;">
                    <img src="producto.png" width="100%" style="border-radius: 21px 21px 0 0;">
                    <button type="button" class="btn btn-info" style="margin-top: 30px; margin-bottom: 30px;">Comprar</button>
                </div>
            </div>
        @endfor
    </div>

@endsection
    