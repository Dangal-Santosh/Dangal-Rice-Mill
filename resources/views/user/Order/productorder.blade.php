<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ url('css/style4.css') }}">
    {{-- materials icons CDN link --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Make Order</title>
</head>
<body>
    <div class="container mt-5">
        <div class="make_order">
            <div class="pl-3">
                <a href="{{url('/buy_products')}}">
                    <div class="pt-2 pb-2">
                        <button class="btn btn-danger">
                            Back
                        </button>
                    </div>
                </a><br>
                <h6 class="text-danger">New Order</h6>
            </div>
            <form action="{{ route('createOrder') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <input type="hidden" id="user_id" name="user_id" class="form-control"
                                value="{{ Auth::user()->id }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ Auth::user()->name }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="category_name" class="form-label">Category </label>
                            <input type="string" class="form-control " id="category_name" name="category_name"
                                value="{{ ($pro->categories->name) }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="">Product Image</label>
                            <input name="image" class="form-control" id="image" value="{{ $pro->image }}" readonly
                                alt="Image"><br>
                            <img src="{{ url('uploads/products') }}/{{ $pro->image }}" alt="image" width="170px"
                                height="140px">
                        </div>
                    </div>
                    <div class="col-lg-4 mt-3">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="string" class="form-control" id="email" name="email"
                                value="{{ Auth::user()->email }}" readonly>
                        </div>
                        <div class="mb-3">
                            {{-- <label for="product_id" class="form-label">Products</label> --}}
                            <input type="hidden" class="form-control text-danger   text-weight-bold" name="product_id"
                                id="product_id" value="{{ ($pro->id) }}">
                        </div>
                        <div class="mb-3">
                            <label for="product_name" class="form-label">Product Name </label>
                            <input type="text" class="form-control " id="product_name" name="product_name"
                                value="{{ ($pro->name) }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="product_quantity" class="text-danger" > Available
                                Stock:</label><br>
                            <input type="text" class="form-control" id="product_quantity" name="product_quantity"
                            value="{{ ($pro->quantity) }}" readonly>
                            <label for="quantity" class="form-label"> Quantity </label>&nbsp;
                            &nbsp;&nbsp;
                            <label for="error" id="error" style="color: red"></label>
                            <input type="quantity" class="form-control changevalue" id="quantity" name="quantity"
                                onkeyup="quantityValidation()">
                        </div>
                        <div >
                            <a class="alert-danger">
                                @error('id'){{$message}}
                    
                                @enderror
                                @error('user_id'){{$message}}
                    
                                @enderror
                                @error('name'){{$message}}
                    
                                @enderror
                                @error('email'){{$message}}
                    
                                @enderror
                                @error('address'){{$message}}
                    
                                @enderror
                                @error('product_id'){{$message}}
                    
                                @enderror
                                @error('product_name'){{$message}}
                    
                                @enderror
                                @error('product_price'){{$message}}
                    
                                @enderror
                                @error('quantity'){{$message}}
                    
                                @enderror
                                @error('category_name'){{$message}}
                    
                                @enderror
                                @error('total'){{$message}}
                    
                                @enderror
                                @error('created_at'){{$message}}
                    
                                @enderror
                    
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-3">
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="string" class="form-control" id="address" name="address"
                                value="{{ Auth::user()->address }}" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="product_price" class="form-label">Product Price </label>
                            <input type="biginteger" class="form-control changevalue" id="product_price"
                                name="product_price" value="{{ ($pro->price) }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="total" class="form-label">Total</label>
                            <input type="biginteger" class="form-control" id="total" name="total" readonly>
                        </div>
                        <button type="submit" class="btn btn-success mt-3 " id="button">Make Order</button>
                        {{-- <button type="submit" class="btn btn-danger mt-3 " id="button" href="{{ url('/buy_products') }}">Cancel</button> --}}
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-12">

            <div class="order_view">
                <h3 class="text-danger">Order Details</h3>
                <div class="row">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">User ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            {{-- <th scope="col">Product ID</th> --}}
                            <th scope="col">Product Name</th>
                            <th scope="col">Product Price </th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Category</th>
                            <th scope="col">Image</th>
                            <th scope="col">Total</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <th>{{$order->id}}</th>
                            <th>{{$order->user_id}}</th>
                            <td>{{$order->name}}</td>
                            <td>{{$order->email}}</td>
                            <td>{{$order->address}}</td>
                            {{-- <td>{{$order->product_id}}</td> --}}
                            <td>{{$order->product_name}}</td>
                            <td>${{$order->product_price}}</td>
                            <td>{{$order->quantity}}</td>
                            <td>{{$order->category_name}}</td>
                            <td>
                                <img src="{{ asset('uploads/products/'.$order->image) }}" width="90px" height="70px"
                                    alt="Image">
                            </td>
                            <td>{{$order->total }}</td>
                            <td>{{$order->created_at }}</td>
                            <td>
                                {{-- <a href="{{ url('/editorder', $order->id) }}" class="btn btn-info btn-sm">Edit</a> --}}
                                <a href="{{ url('/vieworder', $order->id) }}" class="btn btn-success btn-sm px-3 mb-1">Pay</a>
                                <a href="{{ url('/deleteorder', $order->id) }}" class="btn btn-danger btn-sm">Cancel</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(".changevalue").change(function(e){
    var quantity = $("#quantity").val();
    var price = $("#product_price").val();
    var total = quantity * price;
    $("#total").val(total);
})
    </script>
    <script src="{{ url('js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
    @include('sweetalert::alert')

</body>

</html>