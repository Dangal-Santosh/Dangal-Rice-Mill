@extends('layouts.master')
@section('title')
    Admin DashBoard
@endsection
@section('sidebar')
    <div class="container mt-5 ml-3">
        <div class="staff">
        <div class="row">
            <h4 class="text-dark"> <i class="bx bx-plus-medical"></i>Edit Staff Details</h4>
            <div class="col-sm-6">
                <form action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $staff->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $staff->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="{{ $staff->password }}">
                    </div>
                    <button type="submit" class="btn btn-danger">Update</button>
                    <button href="/staffs" class="btn btn-success">Back</button><br><br>
                    </form>
            </div>
        </div>
    </div>
</div>

@endsection



