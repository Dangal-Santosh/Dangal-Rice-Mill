<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    {{-- materials icons CDN link --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Make Order</title>
    <style>
        .make_order {
            padding: 10px;
            border-radius: 5px;
            max-width: 1200px;
            box-shadow: 5px 5px 5px 5px#616060;
            margin-top: 8%;
            margin-left: 3%;
        }
    </style>
</head>

<body>
    <div class="container mt-5 ">
        <div class="make_order">
        <div class="row">
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Order</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col-sm-10">

                                    <form action="" method="POST" enctype="multipart/form-data">
                                        @csrf
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
                                            <label for="email" class="form-label">Email</label>
                                            <input type="string" class="form-control" id="email" name="email"
                                                value="{{ Auth::user()->email }}" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Address</label>
                                            <input type="string" class="form-control" id="address" name="address"
                                                value="{{ Auth::user()->address }}" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="product_id" class="form-label">Products</label>
                                            <select class="form-select text-danger   text-weight-bold"
                                                name="product_id" aria-label="Default select example" id="product_id">
                                                <option selected="selected">---- Select Product ----</option>
                                                @foreach ($products as $pro)
                                                <option value="{{ $pro->id }}">
                                                    {{ ($pro->name) }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="product_name" class="form-label">Product Name </label>
                                            <input type="text" class="form-control " id="product_name"
                                                name="product_name" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="product_price" class="form-label">Product Price </label>
                                            <input type="biginteger" class="form-control changevalue" id="product_price"
                                                name="product_price" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="category_name" class="form-label">Category </label>
                                            <input type="string" class="form-control " id="category_name"
                                                name="category_name" readonly>
                                        </div>
                                        {{-- <div class="mb-3">
                                            <label for="">Product Image</label>
                                            <input name="image"  class="form-control" id="image" readonly>
                                            @foreach ($products as $product)
                                            @if ($product->image== $order->image){
                                                <td> <img src="{{ asset('uploads/products/' . $product->image) }}" /> </td>
                                            }
                                             
                                            @else{
                                                <h6>No image found!!!</h6>
                                            }
                                                
                                            @endif
                                            @endforeach
                                        </div> --}}
                                        <div class="mb-3">
                                            <label for="">Product Image</label>
                                            <input name="image"  class="form-control" id="image" readonly alt="Image">
                                            {{-- @foreach ($product() as $pro)
                                            {{ ($pro->image) }}    
                                            @endforeach  --}}                                    
                                        {{-- <img src="{{ asset('uploads/products/' . $pro->image) }}" />  --}}

                                        </div>
                                        <div class="mb-3">
                                            <label for="product_quantity" class="text-danger"> Available
                                                Stock</label><br>
                                            <input type="biginteger" class="form-control" id="product_quantity"
                                                name="product_quantity" readonly>
                                            <label for="quantity" class="form-label"> Quantity </label>&nbsp;
                                            &nbsp;&nbsp;
                                            <label for="error" id="error" style="color: red"></label>
                                            <input type="quantity" class="form-control changevalue" id="quantity"
                                                name="quantity" onkeyup="quantityValidation()">
                                        </div>
                                        <div class="mb-3">
                                            <label for="total" class="form-label">Total</label>
                                            <input type="biginteger" class="form-control" id="total" name="total"
                                                readonly>
                                        </div>
                                        <button type="submit" class="btn btn-danger" id="button">Make Order</button>
                                    </form>
                                    @if (session()->has('status'))
                                    <div class="alert alert-success">
                                        {{session('status')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <button value="Go back!" onclick="history.back()" class="btn btn-danger mb-4">Back</button>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success mb-4" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <i class="bx bx-plus-medical"></i> New Order
                    </button>
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
                            @error('image'){{$message}}
                
                            @enderror
                            @error('total'){{$message}}
                
                            @enderror
                            @error('created_at'){{$message}}
                
                            @enderror
                
                        </a>
                    </div>
                    <h6 class=" text-danger">Order Details</h6>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">User ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Address</th>
                                <th scope="col">Product ID</th>
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
                            @foreach ($user_order as $order)
                            <tr>
                                <th>{{$order->id}}</th>
                                <th>{{$order->user_id}}</th>
                                <td>{{$order->name}}</td>
                                <td>{{$order->email}}</td>
                                <td>{{$order->address}}</td>
                                <td>{{$order->product_id}}</td>
                                <td>{{$order->product_name}}</td>
                                <td>{{$order->product_price}}</td>
                                <td>{{$order->quantity}}</td>
                                <td>{{$order->category_name}}</td>
                                <td>
                                    <img src="{{ asset('uploads/products/'.$order->image) }}" width="90px" height="70px" alt="Image">
                                </td>
                                {{-- <td>{{$order->image}}</td> --}}
                                <td>{{$order->total }}</td>
                                <td>{{$order->created_at }}</td>
                                <td>
                                    <a href="{{ url('/editorder', $order->id) }}" class="btn btn-info btn-sm">Edit</a>
                                    <a href="{{ url('/vieworder', $order->id) }}" class="btn btn-success btn-sm">Pay</a>
                                    <a href="{{ url('/deleteorder', $order->id) }}" class="btn btn-danger btn-sm">Cancel
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        $( "#product_id" ).change(function () {  
        var id = $(this).val();

        $.ajax({
            url:'{{url('get_products') }}/'+id,
            type: 'get',
            dataType:'json',
            success: function($response){
                var price =JSON.parse(JSON.stringify($response.price));
                var name =JSON.parse(JSON.stringify($response.name));
                var quantity =JSON.parse(JSON.stringify($response.quantity));
                var category_name =JSON.parse(JSON.stringify($response.category_name));
                var image =JSON.parse(JSON.stringify($response.image));
                $("#product_name").val(name);
                $("#product_price").val(price);
                $("#product_quantity").val(quantity);
                $("#category_name").val(category_name);
                $("#image").val(image);
            }
        })
        });
    </script>
    <script src="{{ url('js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
    @include('sweetalert::alert')
</body>

</html>