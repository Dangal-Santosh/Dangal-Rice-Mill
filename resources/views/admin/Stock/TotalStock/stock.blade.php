@extends('layouts.master')
@section('title')
Admin DashBoard | Total stock
@endsection
@section('sidebar')
<div class="container mt-2 ml-3">
    <div class="add_products">
        <div class="row">
            <div class="col-sm-12">
                <a href="{{ url('stock_pdf/pdf') }}" class="btn btn-success mb-4"><span class="font-weight-bold text-reset">
                        Stock Details</span>
                    <i class="bx bxs-download"></i>
                </a>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success mb-4" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    <i class="bx bx-plus-medical"></i>
                    <span class="font-weight-bold text-reset">
                        Add Stock Details</span>

                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Stock Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col-sm-9">
                                    <form action="" method="POST">
                                        @csrf
                                        <div class="mb-3 ">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="name" class="form-control" id="name" name="name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="quantity" class="form-label">Quantity</label>
                                            <input type="quantity" class="form-control Tstock" id="quantity"
                                                name="quantity">
                                        </div>
                                        <div class="mb-3">
                                            <label for="price" class="form-label">Price</label>
                                            <input type="price" class="form-control Tstock" id="price" name="price">
                                        </div>
                                        <div class="mb-3">
                                            <label for="category" class="form-label">Category</label>
                                            <input type="category" class="form-control" id="category" name="category">
                                        </div>
                                        <div class="mb-3">
                                            <label for="supplier" class="form-label">Supplier</label>
                                            <input type="supplier" class="form-control" id="supplier" name="supplier">
                                        </div>
                                        <div class="mb-3">
                                            <label for="total" class="form-label">Total</label>
                                            <input type="total" class="form-control" id="total" name="total">
                                        </div>
                                        <button type="submit" class="btn btn-danger">Add</button>
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
                <h6 class=" text-dark">Stock Details</h6>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Category</th>
                            <th scope="col">Supplier</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stocks as $stock)
                        <tr>
                            <th>{{$stock->id}}</th>
                            <td>{{$stock->name}}</td>
                            <td>{{$stock->quantity}}</td>
                            <td>{{$stock->price}}</td>
                            <td>{{$stock->category}}</td>
                            <td>{{$stock->supplier}}</td>
                            <td>{{$stock->total}}</td>
                            <td>
                                <a href="{{ url('/editstock', $stock->id) }}" class="btn btn-info btn-sm">Edit</a>
                                <a href="{{ url('/deletestock', $stock->id) }}" class="btn btn-danger btn-sm">Delete</a>
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
    $(".Tstock").change(function(e){
            var quantity = $("#quantity").val();
            var price = $("#price").val();
            var total = quantity * price;
            $("#total").val(total);
        })
</script>
@endsection