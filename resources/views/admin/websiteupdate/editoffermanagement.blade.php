@extends('layouts.master')
@section('title')
    Admin DashBoard | Edit Offer Page
@endsection
@section('sidebar')
</head>
    <div class="container mt-5 ml-3">
        <h2 class=" text-danger">Updating  Offers Page</h2>
            <div class="row">
                <div class="col-sm-9">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 ">
                        <label for="name" class="form-label">Name</label>
                        <input type="name" class="form-control" id="name" name="name" value="{{ $offer->name }}">
                        </div>    
                        <div class="mb-3 ">
                            <Header for="header" class="form-label">Main Header</label>
                            <input type="text" class="form-control" id="main_header" name="main_header" value="{{ $offer->main_header }}">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea type="description" class="form-control" id="description" rows="3" name="description" value="{{ $offer->description }}"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Product Image</label>
                            <input type="file" name="image" class="form-control">
                            <img src="{{ asset('uploads/products/'.$offer->image) }}" width="90px" height="70px" alt="Image">
                        </div>
                        <button type="submit" class="btn btn-danger">Update Product</button><br><br>
                    </form>
                    @if (session()->has('status'))
                        <div class="alert alert-success">
                            {{session('status')}}
                        </div>                      
                    @endif
                </div>
            </div>
    </div>
@endsection