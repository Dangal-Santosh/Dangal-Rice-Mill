@extends('layouts.master')
@section('title')
Admin DashBoard | User Details
@endsection

@section('sidebar')
<div class="row ">
    <div class="col-sm-12">
        <div class="payment_details">
            <form action="">
                <div class="row">
                    <div class="col-md-4 ml-5 mt-4 ">
                        <a href="{{ url('/user_pdf/pdf') }}" class="btn btn-success text-center">
                            <span class="font-weight-bold text-reset">
                                User Details</span>
                            <i class='bx bxs-download'></i>
                        </a>
                    </div>
                    {{-- <div class="col-md-6 ">
                        <input type="date" class="form-control p-2 mt-4" id="name" placeholder="Search Users"
                            name="usersearch" />
                    </div>
                    <div class="col-md-2 mt-4 pt-1">
                        <button class="btn btn-primary  p-1">
                            Search &rarr;</button>
                    </div> --}}
                </div><br><br>
            </form>
            <h6 class="text-danger">User Details</h6><br>
            <div class="card" >
                <div class="card-content table-responsive">
                    <table class="table table-hover">
                        <thead class="text-dark">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Age</th>
                                <th>Phone Number</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($users->count() > 0)
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->address }}</td>
                                <td>{{ $user->age }}</td>
                                <td>{{ $user->phone_number }}</td>
                                <td>{{ $user->created_at }}</td>
                            </tr>
                            @endforeach
                            @else
                            <div class="text-danger h1">
                                <span class="">No User Details Found!!</span>
                            </div>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection