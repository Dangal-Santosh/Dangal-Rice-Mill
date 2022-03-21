@extends('layouts.master')
@section('title')
Admin DashBoard | Product
@endsection
@section('sidebar')
<div class="add_products">
    <form action="">
        <div class="row">
            <div class="col-md-4 ml-5 mt-4 ">
                <a href="{{ url('/product_pdf/pdf') }}" class="btn btn-success">
                    <span class="font-weight-bold text-reset">Product Details</span>
                    <i class='bx bxs-download'></i>
                </a>

            </div>
            <div class="col-md-6 ">
                <input type="search" class="form-control p-2 mt-4" id="name" placeholder="Search Products"
                    name="finds" />
            </div>

            <div class="col-md-2 mt-4 pt-1">
                <button class="btn btn-primary  p-1">
                    Search &rarr;</button>
            </div>
        </div><br><br>
    </form>
    <h2 class=" text-dark">Total Products</h2>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Product</th>
                <th scope="col">Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Total</th>
                <th scope="col">Category</th>
                <th scope="col">Image</th>
                <th scope="col">Qr Code</th>
            </tr>
        </thead>
        <tbody>
            @if ($products->count() > 0)
            @foreach ($products as $pro)
            <tr>
                <th>{{$pro->id}}</th>
                <th>{{$pro->in_stock_id}}</th>
                <td>{{$pro->name}}</td>
                <td>{{$pro->quantity}}</td>
                <td>{{$pro->price}}</td>
                <td>{{$pro->total}}</td>
                <td>{{$pro->category_id}}</td>
                <td>
                    <img src="{{ asset('uploads/products/'.$pro->image) }}" width="90px" height="70px" alt="Image">
                </td>
                <td>
                    <div class="qrcode">
                        {!! QrCode::size(80)->generate(
                        " Product ID:$pro->id, Stock ID:$pro->in_stock_id, Product Name:$pro->name, Product Price:$pro->price, Total Price:$pro->total, Category ID:$pro->category_id, Quantity:$pro->quantity"
                        ); !!}
                    </div>
                </td>
            </tr>
            @endforeach
            {{-- <h4><span class="text-success">Products Worth: </span>{{ $product_worth }}</h4> --}}
            @else
            <div class="text-danger h1">
                <span class="">No Products found!!</span>
            </div>
            @endif
        </tbody>
    </table>

</div>
@endsection