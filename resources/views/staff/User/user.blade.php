@extends('layouts.child')
@section('title')
Staff Dashboard | User Details
@endsection
@section('staffarea')
<div class="container mt-3 ml-3 ">
    <div class="col-sm-9  ml-3">
        <div class="add_products">
        <h2 class=" text-danger">Total Customers</h2>
        <table class="table table-hover ">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Age</th>
                    <th scope="col">Address</th>
                    {{-- <th scope="col">Action</th> --}}
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
                        {{-- <a href="{{ url('/edituser', $user->id) }}" class="btn btn-info btn-sm">Edit</a> --}}
                        {{-- <a href="{{ url('/deleteuser', $user->id) }}" class="btn btn-danger btn-sm">Delete</a> --}}
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