@extends('layouts.master')
@section('title')
    Admin DashBoard | Edit About Page
@endsection
@section('sidebar')
</head>
    <div class="container mt-5 ml-3">
        <h2 class=" text-danger">Updating  About Page</h2>
            <div class="row">
                <div class="col-sm-9">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 ">
                        <label for="name" class="form-label">Name</label>
                        <input type="name" class="form-control" id="name" name="name" value="{{ $about->name }}">
                        </div> 
                        <div class="mb-3">
                            <label for="desc" class="form-label">Description</label>
                            <textarea type="text" class="form-control" id="desc" name="desc" rows="3" value="{{ $about->desc }}" ></textarea>
                        </div>   
                        <div class="mb-3">
                            <label for="">Owner Image</label>
                            <input type="file" name="image" class="form-control">
                            <img src="{{ asset('uploads/products/'.$about->image) }}" width="90px" height="70px" alt="Image">
                        </div>
                        <button type="submit" class="btn btn-danger">Update About Page</button><br><br>
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
