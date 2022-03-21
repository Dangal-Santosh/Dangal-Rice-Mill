@extends('layouts.master')
@section('title')
    Admin DashBoard | Edit Contact Us Page
@endsection
@section('sidebar')
<body>
    <div class="container mt-5 ml-3">
        <div class="row">
            <h1 class="text-danger">Edit Contact Us Details</h1>
            <div class="col-sm-6">
                <form action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $contact->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $contact->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="address" class="form-control" id="address" name="address" value="{{ $contact->address }}">
                    </div>
                    <div class="mb-3">
                        <label for="contact" class="form-label">Contact Us</label>
                        <input type="contact" class="form-control" id="contact" name="contact" value="{{ $contact->contact }}">
                    </div>
                        <button type="submit" class="btn btn-danger">Update</button>
                        <button href="/contacts" class="btn btn-success">Back</button><br><br>
                </form>
            </div>
        </div>
    </div>
@endsection


