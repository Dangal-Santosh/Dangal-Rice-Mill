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
    <div class="pl-3">
        <a href="{{url('/homepage')}}">
            <div class="pt-2 buy_products">
                <button class="btn btn-danger">
                    Back
                </button>
            </div>
        </a>
    </div>
        <h2 class="title">
            All Products
        </h2>
    <form action="">
        <div class="row" id="see_products">
            <div class="col-md-5 ">
            <input type="search" class="form-control p-2  ml-5" id="created_at" placeholder="Search Products"
                name="see_product" />
        </div>
        <div class="col-md-2  pt-1">
            <button class="btn btn-primary  p-1">
                Search &rarr;</button>
        </div>
    </div> <br>
    </form>
    <div class="small-container">
        <div class="row1">
            @if ($products->count() > 0)
                @foreach($products as $pro)
                <div class="col4">
                    <div class="product">
                        <div class="image">
                            <img src="{{url("uploads/products")}}/{{ $pro->image}}" alt="p-1" />
                        </div><br>
                        <h4>{{ $pro->name }}</h4>
                        <div class="product_details">

                            <h6>${{ $pro->price }}</h6>
                            <a href="{{ route('productOrder',['id' => $pro->id]) }}" class="btn btn-danger mb-2">Buy Products</a>
                        </div>
                    </div> 
                </div>
                @endforeach
            @else
            <div class="text-danger h1">
                <span class="">No Products found!!</span>
            </div>
            @endif
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
        </body>
</html>