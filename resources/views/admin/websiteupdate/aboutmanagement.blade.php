@extends('layouts.master')
@section('title')
    Admin DashBoard
@endsection
@section('sidebar')
    <div class="container mt-5 ml-3">
        <h2 class=" text-danger">Adding About</h2>
            <div class="row">
                <div class="col-sm-9">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 ">
                        <label for="name" class="form-label">Name</label>
                        <input type="name" class="form-control" id="name" name="name">
                        </div> 
                        <div class="mb-3">
                            <label for="desc" class="form-label">Description</label>
                            <textarea type="desc" class="form-control" id="desc" rows="3" name="desc"></textarea>
                        </div>                      
                        <div class="mb-3">
                            <label for="">Owner Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-danger">Add About Page</button>
                    </form>
                    @if (session()->has('status'))
                        <div class="alert alert-success">
                            {{session('status')}}
                        </div>                      
                    @endif
                </div>
                <div class="col-sm-9 mt-5">
                <h2 class=" text-danger">About</h2>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>                      
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($abouts as $about)
                            <tr>
                                <th>{{$about->id}}</th>
                                <td>{{$about->name}}</td>
                                <td>{{$about->desc}}</td>
                                <td>
                                    <img src="{{ asset('uploads/products/'.$about->image) }}" width="90px" height="70px" alt="Image">
                                </td>
                                <td>
                                    <a href="{{ url('/editabouts', $about->id) }}" class="btn btn-info btn-sm">Edit</a>
                                    <a href="{{ url('/deleteabouts', $about->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
@endsection