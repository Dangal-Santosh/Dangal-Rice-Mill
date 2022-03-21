@extends('layouts.master')
@section('title')
    Admin DashBoard | Edit Home Page
@endsection
@section('sidebar')
</head>
    <div class="container mt-5 ml-4">
        <h2 class=" text-danger">Updating  HomePage</h2>
            <div class="row">
                <div class="col-sm-9">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 ">
                        <label for="name" class="form-label">Name</label>
                        <input type="name" class="form-control" id="name" name="name" value="{{ $homepage->name }}">
                        </div>    
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea type="description" class="form-control" id="description" rows="3" name="description" value="{{ $homepage->description }}"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">HomePage Image</label>
                            <input type="file" name="image" class="form-control">
                            <img src="{{ asset('uploads/products/'.$homepage->image) }}" width="90px" height="70px" alt="Image">
                        </div>
                        <button type="submit" class="btn btn-danger">Update Homepage</button><br><br>
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