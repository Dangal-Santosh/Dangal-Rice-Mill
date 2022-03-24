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
    <div class="small-container">
        <h2 class="title">All Products</h2>
        <div class="row1">
            @foreach($product as $pro)
            <div class="col4">
                <ul class="products">
                    <li>
                        <a>
                            <div class="image">
                                <img src="{{url("uploads/products")}}/{{ $pro->image}}" alt="p-1" />
                            </div>
                            <div class="informations">
                                <h4>{{ $pro->name }}</h4>
                                <h6>Rs.{{ $pro->price }}</h6>
                            </div>
                        </a>
                    </li>

                </ul>
            </div>

            @endforeach
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
        </body>
</html>