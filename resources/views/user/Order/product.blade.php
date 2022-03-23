<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ ('css/style2.css') }}">
    <link rel="stylesheet" href="{{ ('css/style.css') }}">
    <title>User | Products</title>
</head>
<body>
    <div class="container">
        
    </div>
    <ul class="products">
        <li>
            <a>
                <div class="image" style="background-image:url(http://www.blogdobg.com.br/wp-content/uploads/2012/08/seu-madruga.jpg);"></div>
                <h1>Information 1</h1>
                <h2>Information 2</h2>
                <div class="informations">
                    <p>any aditional information you want here bla bla bla bla lorem ipsum bacon yeah</p>
                    <label><input type="checkbox"/>checkbox</label>
                </div>
            </a>
        </li>
        <li>
            <a>
                <div class="image" style="background-image:url(http://www.culturamix.com/wp-content/gallery/chiquinha-do-chaves/chiquinha-do-chaves-8.jpg);"></div>
                <h1>Information 1</h1>
                <h2>Information 2</h2>
                <div class="informations">
                    <p>any aditional information you want here bla bla bla bla lorem ipsum bacon yeah</p>
                    <label><input type="checkbox"/>checkbox</label>
                </div>
            </a>
        </li>
        <li>
            <a>
                <div class="image" style="background-image:url(http://blog.idealshop.com.br/wp-content/uploads/2013/08/chaves.jpg);"></div>
                <h1>Information 1</h1>
                <h2>Information 2</h2>
                <div class="informations">
                    <p>any aditional information you want here bla bla bla bla lorem ipsum bacon yeah</p>
                    <label><input type="checkbox"/>checkbox</label>
                </div>
            </a>
        </li>
        <li>
            <a>
                <div class="image" style="background-image:url(http://1.bp.blogspot.com/_kKqgMFCHaF4/SwHeXl5znVI/AAAAAAAACQk/DQKFfzyIVEs/s1600/kiko.JPG);"></div>
                <h1>Information 1</h1>
                <h2>Information 2</h2>
                <div class="informations">
                    <p>any aditional information you want here bla bla bla bla lorem ipsum bacon yeah</p>
                    <label><input type="checkbox"/>checkbox</label>
                </div>
            </a>
        </li>
        <li>
            <a>
                <div class="image" style="background-image:url(http://www.geocities.ws/chapolinbrasil/girafales.JPG);"></div>
                <h1>Information 1</h1>
                <h2>Information 2</h2>
                <div class="informations">
                    <p>any aditional information you want here bla bla bla bla lorem ipsum bacon yeah</p>
                    <label><input type="checkbox"/>checkbox</label>
                </div>
            </a>
        </li>
    </ul>
    <div class="small-container">
        <h2 class="title">Latest Products</h2>
        <div class="row1">
        @foreach($product as $pro)
            <div class="col4">
                <img src="{{url("uploads/products")}}/{{ $pro->image}}" alt="p-1" /> 
        
                <h4>{{ $pro->name }}</h4>
                <p>Rs.{{ $pro->price }}</p>
            </div>
            @endforeach
        </div>
        </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
</body>
</html>
