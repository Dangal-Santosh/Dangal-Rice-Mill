@extends('layouts.master')
@section('title')
Admin DashBoard | Edit Product Category
@endsection
@section('sidebar')
<div class="container mt-5">
    <div class="category">
    <h2 class=" text-dark">Product Category</h2>
    <div class="row">
        <div class="col-sm-11">
            <form action="" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3 ">
                    <label for="name" class="form-label">Name</label>
                    <input type="name" class="form-control" id="name" name="name" value="{{ $category->name }}">
                </div>
                <button type="submit" class="btn btn-danger">Update</button><br><br>
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