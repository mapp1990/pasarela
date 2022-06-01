<!doctype html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
  </head>
  <body class="body">
    <nav class="site-header sticky-top py-1">
        <div class="container d-flex flex-column flex-md-row justify-content-between">
            <a class="py-2" href="#" aria-label="Product">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img" viewBox="0 0 24 24" focusable="false"><title>Product</title><circle cx="12" cy="12" r="10"></circle><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"></path></svg>
            </a>
            <a class="py-2 d-none d-md-inline-block" href="#">Productos</a>
        </div>
    </nav>

    <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">

        <div class="bg-dark col-6 text-center text-white overflow-hidden">
            <div class="my-6 py-6">
                <h2 class="display-5">Producto Ilimitado 1</h2>
                <p class="lead">Descripcion Producto 1.</p>
            </div>
            <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
                <img src="producto.png" width="100%" style="border-radius: 21px 21px 0 0;">
                <button type="button" class="btn btn-info" style="margin-top: 30px;">Comprar</button>
            </div>
        </div>

        <div class="bg-light col-6 text-center overflow-hidden">
            <div class="my-6 p-6">
                <h2 class="display-5">Producto Ilimitado 2</h2>
                <p class="lead">Descripcion Producto 1.</p>
            </div>
            <div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
                <img src="producto.png" width="100%" style="border-radius: 21px 21px 0 0;">
                <button type="button" class="btn btn-info" style="margin-top: 30px;">Comprar</button>
            </div>
        </div>

    </div>
    
  </body>
</html>