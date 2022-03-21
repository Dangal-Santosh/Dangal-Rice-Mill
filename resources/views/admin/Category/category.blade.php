@extends('layouts.master')
@section('title')
Admin DashBoard
@endsection
@section('sidebar')
<div class="container ml-5">
    <div class="category">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="bx bx-plus-medical"></i>Add Category
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            @csrf
                            <div class="mb-3 ">
                                <label for="name" class="form-label">Name</label>
                                <input type="name" class="form-control" id="name" name="name">
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
        <div class="row">
            <div class="col-sm-12 mt-3">
                <h6 class=" text-danger">Major Category</h6>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $cat)
                        <tr>
                            <th>{{$cat->id}}</th>
                            <td>{{$cat->name}}</td>
                            <td>
                                <a href="{{ url('/editcategories', $cat->id) }}" class="btn btn-info btn-sm">Edit</a>
                                <a href="{{ url('/deletecategories', $cat->id) }}"
                                    class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection