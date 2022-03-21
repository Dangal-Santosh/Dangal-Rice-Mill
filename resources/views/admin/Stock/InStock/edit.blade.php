@extends('layouts.master')
@section('title')
Admin DashBoard |Instock
@endsection
@section('sidebar')
<div class="container mt-5 ml-3">
    <div class="in_stock">
        <div class="row">
            <div class="col-sm-9">
                <form action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 ">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="name" class="form-control" id="name" name="name" value="{{ $Instock->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="quantity" class="form-control" id="quantity" name="quantity"
                            value="{{ $Instock->quantity }}">
                    </div>
                    <div class="mb-3 ">
                        <label for="supplier" class="form-label">Supplier Name</label>
                        <input type="supplier" class="form-control" id="supplier" name="supplier"
                            value="{{ $Instock->supplier }}">
                    </div>
                    <button type="submit" class="btn btn-danger">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection