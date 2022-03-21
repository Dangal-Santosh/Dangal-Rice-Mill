@extends('layouts.master')
@section('title')
    Offers
@endsection
@section('sidebar')
    <div class="container mt-5 ml-3">
        <h2 class=" text-danger">Adding Offer Page</h2>
            <div class="row">
                <div class="col-sm-9">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 ">
                        <label for="name" class="form-label">Name</label>
                        <input type="name" class="form-control" id="name" name="name">
                        </div> 
                        <div class="mb-3 ">
                            <Header for="main_header" class="form-label">Main Header</label>
                            <input type="text" class="form-control" id="main_header" name="main_header">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea type="description" class="form-control" id="description" rows="3" name="description"></textarea>
                        </div>                      
                        <div class="mb-3">
                            <label for="">Product Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-danger">Add Offer</button>
                    </form>
                    @if (session()->has('status'))
                        <div class="alert alert-success">
                            {{session('status')}}
                        </div>                      
                    @endif
                </div>
                <div class="col-sm-9 mt-5">
                <h2 class=" text-danger">Offers</h2>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Main Header</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($offers as $offer)
                            <tr>
                                <th>{{$offer->id}}</th>
                                <td>{{$offer->name}}</td>
                                <td>{{$offer->main_header}}</td>
                                <td>{{$offer->description}}</td>
                                <td>
                                    <img src="{{ asset('uploads/products/'.$offer->image) }}" width="90px" height="70px" alt="Image">
                                </td>
                                <td>
                                    <a href="{{ url('/editoffers', $offer->id) }}" class="btn btn-info btn-sm">Edit</a>
                                    <a href="{{ url('/deleteoffers', $offer->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
@endsection