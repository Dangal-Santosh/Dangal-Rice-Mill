@extends('layouts.master')
@section('title')
    Admin DashBoard
@endsection
@section('sidebar')
<body>
    <div class="container mt-5 ml-3">
        <h2 class=" text-danger">Adding HomePage</h2>
            <div class="row">
                <div class="col-sm-9">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 ">
                        <label for="name" class="form-label">Name</label>
                        <input type="name" class="form-control" id="name" name="name">
                        </div> 
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea type="description" class="form-control" id="description" rows="3" name="description"></textarea>
                        </div>                      
                        <div class="mb-3">
                            <label for="">HomePage Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-danger">Add HomePage</button>
                    </form>
                    @if (session()->has('status'))
                        <div class="alert alert-success">
                            {{session('status')}}
                        </div>                      
                    @endif
                </div>
                <div class="col-sm-9 mt-5">
                <h2 class=" text-danger">HomePage</h2>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($homepages as $home)
                            <tr>
                                <th>{{$home->id}}</th>
                                <td>{{$home->name}}</td>
                                <td>{{$home->description}}</td>
                                <td>
                                    <img src="{{ asset('uploads/products/'.$home->image) }}" width="90px" height="70px" alt="Image">
                                </td>
                                <td>
                                    <a href="{{ url('/edithomepages', $home->id) }}" class="btn btn-info btn-sm">Edit</a>
                                    <a href="{{ url('/deletehomepages', $home->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
@endsection