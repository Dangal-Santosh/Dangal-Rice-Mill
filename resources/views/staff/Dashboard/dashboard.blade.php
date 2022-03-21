@extends('layouts.child')
@section('title')
Staff DashBoard | Edit Product
@endsection
@section('staffarea')
<div class="main-content ml-3">
    <div class="dashb">
    <form action="" class="p-4">
        <div class="row">
            <div class="col-md-6">
                <input type="search" class="form-control p-2 mt-4" id="name" placeholder="Search Products" name="search" />
            </div>
            <div class="col-md-6 mt-4 pt-1">
                <button class="btn btn-primary bus-btn p-1">
                    Search &rarr;</button>
            </div>
        </div>
    </form>
    <div class="row ">
        <div class="col-sm-11" id="dash">
            <div class="card" style="min-height: 250px">
                <div class="card-content table-responsive">
                    <table class="table table-hover">
                        <thead class="text-danger">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Total</th>
                                <th scope="col">Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($products->count() > 0)

                            @foreach ($products as $pro)
                            <tr>
                                <th>{{$pro->id}}</th>
                                <td>{{$pro->name}}</td>
                                <td>{{$pro->quantity}}</td>
                                <td>{{$pro->price}}</td>
                                <td>{{$pro->total}}</td>
                                <td>
                                    <img src="{{ asset('uploads/products/'.$pro->image) }}" width="90px" height="70px"
                                        alt="Image">
                                </td>
                            </tr>
                            @endforeach
                            <h4><span class="text-success">Products Worth: </span>{{ $product_worth }}</h4>
                            @else
                            <div class="text-danger">
                                No Products found!!
                            </div>
                            @endif
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
<br><br>
@endsection