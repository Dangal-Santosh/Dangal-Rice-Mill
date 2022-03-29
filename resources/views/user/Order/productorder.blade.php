<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-10">
                <form action="{{ route('productordercreate') }}" method="POST" enctype="multipart/form-data">
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
                        <input class="form-control text-danger   text-weight-bold"
                            name="product_id"  id="product_id" value="{{ ($products->product_id) }}">
                    </div>
                    <div class="mb-3">
                        <label for="product_name" class="form-label">Product Name </label>
                        <input type="text" class="form-control " id="product_name"
                            name="product_name"  value="{{ ($products->product_name) }}"readonly>
                    </div>
                    <div class="mb-3">
                        <label for="product_price" class="form-label">Product Price </label>
                        <input type="biginteger" class="form-control changevalue" id="product_price"
                            name="product_price" value="{{ ($products->product_price) }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="category_name" class="form-label">Category </label>
                        <input type="string" class="form-control " id="category_name"
                            name="category_name" value="{{ ($products->category->category_name) }}"readonly>
                    </div>
                    <div class="mb-3">
                        <label for="">Product Image</label>
                        <img src="{{ url('uploads/products') }}/{{ $products->image }}" alt="image">
                        {{-- <input name="image"  class="form-control" id="image" readonly alt="Image" > --}}
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
            </div>
        </div>
    </div>

</body>
</html>