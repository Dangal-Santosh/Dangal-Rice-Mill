@extends('layouts.child')
@section('title')
Staff DashBoard | Edit Product
@endsection
@section('staffarea')
<div class="container mt-5 ml-3">
    <div class="edit_stock">
        <div class="row">
            <h4 class="text-dark">Edit Products Details</h4><br>
            <div class="col-sm-12">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select class="form-select text-danger  fs-3 text-weight-bold" name="category_id"
                            aria-label="Default select example" id="category_id">
                            <option selected="selected">---- Select Category ----</option>
                            @foreach ($category as $cat)
                            <option value="{{ $cat->id }}">
                                {{ ($cat->name) }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="in_stock_id" class="form-label">Products</label>
                        <select class="form-select text-danger  fs-3 text-weight-bold" name="in_stock_id"
                            aria-label="Default select example" id="in_stock_id">
                            <option selected="selected">---- Select Product ----</option>
                            @foreach ($Instock as $in)
                            <option value="{{ $in->id }}">
                                {{ ($in->name) }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 ">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="name" class="form-control" id="name" name="name" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="stock_quantity" class="text-danger fs-3"> Available Stock</label><br>
                        <input type="biginteger" class="form-control" id="stock_quantity" name="stock_quantity"
                            readonly>
                        <label for="quantity" class="form-label"> Quantity </label>&nbsp; &nbsp;&nbsp;
                        <label for="error" id="error" style="color: red"></label>
                        <input type="quantity" class="form-control changevalue" id="quantity" name="quantity"
                            onkeyup="categoryValidation()">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="biginteger" class="form-control changeQuantity" id="price" name="price">
                    </div>
                    <div class="mb-3">
                        <label for="total" class="form-label">Total</label>
                        <input type="biginteger" class="form-control " id="total" name="total">
                    </div>
                    <div class="mb-3">
                        <label for="">Product Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-danger">Add Product</button>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(".changeQuantity").change(function(e){
        var quantity = $("#quantity").val();
        var price = $("#price").val();
        var total = quantity * price;
        $("#total").val(total);
    })
    
</script>
<script>
    $( "#in_stock_id" ).change(function () {  
    var id = $(this).val();

    $.ajax({
        url:'{{url('get_stocks') }}/'+id,
        type: 'get',
        dataType:'json',
        success: function($res){
            var name =JSON.parse(JSON.stringify($res.name));
            var  stock_quantity =JSON.parse(JSON.stringify($res.stock_quantity));
            $("#name").val(name);
            $("#stock_quantity").val(stock_quantity);
        }
    })
    });
</script>
@endsection