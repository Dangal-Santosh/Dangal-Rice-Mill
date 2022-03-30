@extends('layouts.master')
@section('title')
Admin Dashboard | User Details
@endsection
@section('sidebar')
<div class="container mt-1 ml-3">
    <div class="row">
        <h4 class="text-dark" style="margin-left: 60px;">Edit User Details</h4>
        <div>
            <a class="alert-danger">
                @error('name'){{$message}}
                @enderror
                @error('email'){{$message}}
                @enderror
                @error('phone'){{$message}}
                @enderror
                @error('address'){{$message}}
                @enderror
                @error('age'){{$message}}
                @enderror
            </a>
        </div>
        <div class="col-sm-6">
            <div class="add_products">
                <form action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                    </div>
                    <div class="mb-3">
                        {{-- <label for="password" class="form-label">Password</label> --}}
                        <input type="hidden" class="form-control" id="password" name="password"
                            value="{{ $user->password }}">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="phone" class="form-control" id="phone" name="phone" value="{{ $user->phone }}">
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="age" class="form-control" id="age" name="age" value="{{ $user->age }}">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="address" class="form-control" id="address" name="address"
                            value="{{ $user->address }}">
                    </div>
                    <button type="submit" class="btn btn-danger">Update</button><br><br>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection