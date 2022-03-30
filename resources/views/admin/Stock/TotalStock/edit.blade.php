@extends('layouts.master')
@section('title')
    Admin DashBoard | Edit About Stock Details
@endsection
@section('sidebar')
</head>
    <div class="container mt-5 ml-3">
        <h2 class=" text-dark">Updating  Stock Details</h2>
        <div>
            <a class="alert-danger">
                @error('name'){{$message}}
    
                @enderror

                @error('quantity'){{$message}}
    
                @enderror

                @error('supplier'){{$message}}
    
                @enderror
                @error('price'){{$message}}
    
                @enderror
                @error('category'){{$message}}
    
                @enderror
                @error('total'){{$message}}
    
                @enderror
            </a>
        </div>
            <div class="row">
                <div class="col-sm-9">
                    <form action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 ">
                        <label for="name" class="form-label">Name</label>
                        <input type="name" class="form-control" id="name" name="name" value="{{ $stock->name }}">
                        </div> 
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="integer" class="form-control stock" id="quantity" name="quantity"  value="{{ $stock->quantity }}">
                        </div> 
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="integer" class="form-control stock" id="price" name="price"  value="{{ $stock->price }}" >
                        </div> 
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <input type="text" class="form-control" id="category" name="category"  value="{{ $stock->category }}">
                        </div> 
                        <div class="mb-3">
                            <label for="supplier" class="form-label">Supplier</label>
                            <input type="text" class="form-control" id="supplier" name="supplier"  value="{{ $stock->supplier }}">
                        </div> 
                        <div class="mb-3">
                            <label for="total" class="form-label">Total</label>
                            <input type="integer" class="form-control" id="total" name="total"  value="{{ $stock->total }}" readonly>
                        </div> 
                          
                        <button type="submit" class="btn btn-danger">Update</button>
                    </form>
                    @if (session()->has('status'))
                        <div class="alert alert-success">
                            {{session('status')}}
                        </div>                      
                    @endif
                </div>
            </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type= "text/javascript">
        $(".stock").change(function(e){
            var quantity = $("#quantity").val();
            var price = $("#price").val();
            var total = quantity * price;
            $("#total").val(total);
        })
    </script>
@endsection
