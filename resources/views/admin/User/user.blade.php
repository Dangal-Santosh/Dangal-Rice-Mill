@extends('layouts.master')
@section('title')
Admin Dashboard | User Details
@endsection
@section('sidebar')
<div class="container mt-3 ml-3 ">
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
                            <label for="address" class="form-label">Address</label>
                            <input type="address" class="form-control" id="address" name="address">
                        </div>
                        <div class="mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input type="age" class="form-control" id="age" name="age">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="phone" class="form-control" id="phone" name="phone">
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
<div class="user">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success mb-4 " data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="bx bx-plus-medical"></i>Add User
    </button>
    <div>
        <a class="alert-danger">
            @error('id'){{$message}}
            @enderror
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
    <div class="row">
        <div class="col-sm-12  ml-3">
                <h6 class=" text-danger">Total Users</h6>
                <table class="table table-hover ">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Age</th>
                            <th scope="col">Address</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <th>{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->age}}</td>
                            <td>{{$user->address}}</td>
                            <td>
                                <a href="{{ url('/edituser', $user->id) }}" class="btn btn-info btn-sm">Edit</a>
                                <a href="{{ url('/deleteuser', $user->id) }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection








    {{-- <div class="container mt-5 ml-3 fixed">
        <h2 class=" text-danger">Adding Users</h2>
        <div class="row">
            <div class="col-sm-11">
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
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="phone" class="form-control" id="phone" name="phone">
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="age" class="form-control" id="age" name="age">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="address" class="form-control" id="address" name="address">
                    </div>
                    <button type="submit" class="btn btn-danger">Submit</button>
                </form>
                @if (session()->has('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
                @endif
            </div>
            <div class="col-sm-9 mt-5">
                <h2 class=" text-danger">Total Customers</h2>
                <table class="table table-hover fixed">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Age</th>
                            <th scope="col">Address</th>
                            <th scope="col">Role</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <th>{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->password}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->age}}</td>
                            <td>{{$user->address}}</td>
                            <td>{{$user->roles}}</td>
                            <td>
                                <a href="{{ url('/edituser', $user->id) }}" class="btn btn-info btn-sm">Edit</a>
                                <a href="{{ url('/deleteuser', $user->id) }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

@endsection --}}

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
</script>
@include('sweetalert::alert')
</body>

</html> --}}