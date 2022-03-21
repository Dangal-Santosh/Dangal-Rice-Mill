@extends('layouts.master')
@section('title')
Admin DashBoard
@endsection
@section('sidebar')
<div class="container mt-5 ml-3">
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Staffs</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="mb-3 ">
                            <label for="name" class="form-label">Name</label>
                            <input type="name" class="form-control" id="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-danger">Submit</button><br><br>
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
<div class="staff">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success mb-4 " data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="bx bx-plus-medical"></i>Add Staff
    </button>
<div class="row">
        <h6 class=" text-dark">Total Staffs</h6>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    {{-- <th scope="col">Password</th> --}}
                    <th scope="col">Role</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($staffs as $ur)
                <tr>
                    <th>{{$ur->id}}</th>
                    <td>{{$ur->name}}</td>
                    <td>{{$ur->email}}</td>
                    {{-- <td>{{$ur->password}}</td> --}}
                    <td>{{$ur->roles}}</td>
                    <td>
                        <a href="{{ url('/edit', $ur->id) }}" class="btn btn-info btn-sm ">Edit</a>
                        <a href="{{ url('/delete', $ur->id) }}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection