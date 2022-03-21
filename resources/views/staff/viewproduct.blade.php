@extends('layouts.child')
@section('title')
Staff DashBoard | Product View
@endsection
@section('staffarea')
{{-- <table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
            <th scope="col">Total</th>
            <th scope="col">Image</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $pro)
        <tr>
            <th>{{$pro->id}}</th>
            <td>{{$pro->name}}</td>
            <td>{{$pro->quantity}}</td>
            <td>{{$pro->price}}</td>
            <td>{{$pro->total}}</td>
            <td>
                <img src="{{ asset('uploads/products/'.$pro->image) }}" width="90px" height="70px" alt="Image">
            </td>
            <td>
                <a href="{{ url('/editproduct', $pro->id) }}" class="btn btn-info btn-sm">Edit</a>
                <a href="{{ url('/deleteproduct', $pro->id) }}" class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table> --}}



@endsection