@extends('layouts.master')
@section('title')
    Admin DashBoard |Contact Us
@endsection
@section('sidebar')
    <div class="container mt-5 ml-3">
        <h2 class=" text-danger">Adding Contacts</h2>
            <div class="row" >
                <div class="col-sm-10 ml-2">
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
                        <label for="address" class="form-label">Address</label>
                        <input type="address" class="form-control" id="address" name="address">
                        </div>
                        <div class="mb-3">
                            <label for="contact" class="form-label">Contact Number</label>
                            <input type="contact" class="form-control" id="contact" name="contact">
                            </div>
                        <div>
                        <button type="submit" class="btn btn-danger">Submit</button><br><br>
                        </div>
                    </form>
                        @if (session()->has('status'))
                            <div class="alert alert-success">
                                {{session('status')}}
                            </div>                      
                        @endif
                        
                    <h2 class=" text-danger">Contact Details</h2>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Contact Number</th>
                            <th scope="col">Actions</th>                                              
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                            <tr>
                                <th>{{$contact->id}}</th>
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->address}}</td>
                                <td>{{$contact->contact}}</td>
                                <td>{{$contact->roles}}</td>
                                <td>
                                    <a href="{{ url('/editcontacts', $contact->id) }}" class="btn btn-info btn-sm ">Edit</a>
                                    <a href="{{ url('/deletecontacts', $contact->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
@endsection
