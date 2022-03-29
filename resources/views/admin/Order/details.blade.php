@extends('layouts.master')
@section('title')
Admin DashBoard | Order Details
@endsection

@section('sidebar')
<div class="order_details">
    <div class="row ">
        <div class="col-sm-12">
            <div class="card" style="min-height: 485px">
                <form action="">
                    <div class="row">
                        <div class="col-md-4 mt-4 ">
                            <a href="{{ url('dynamic_pdf/pdf') }}" class="btn btn-success"><span
                                    class="font-weight-bold text-reset">
                                    Order Details</span>
                                <i class='bx bxs-download'></i>
                            </a>
                        </div>
                        <div class="col-md-6 ">
                            <input type="date" class="form-control p-2 mt-4" id="name" placeholder="Search Orders"
                                name="search2"/>
                        </div>

                        <div class="col-md-2 mt-4 pt-1">
                            <button class="btn btn-primary  p-1">
                                Search &rarr;</button>
                        </div>
                    </div><br><br>
                </form>
                <h6 class=" text-danger">Total Orders</h6>
                <div class="card-content table-responsive ">
                    <table class="table table-hover ">
                        <thead class="text-dark">
                            <tr>
                                <th>Order ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Product ID</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Quantity </th>
                                <th>Total</th>
                                <th>Created At</th>
                                {{-- <th>Qr Code</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @if ($orders->count() > 0)
                            @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->address }}</td>
                                <td>{{ $order->product_id }}</td>
                                <td>{{ $order->product_name }}</td>
                                <td>{{ $order->product_price }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->total }}</td>
                                <td>{{ $order->created_at }}</td>
                                {{-- <td>
                                    <div class="qrcode">
                                        {!! QrCode::size(80)->generate(
                                        " Order ID:$order->id, Customer Name:$order->name, Email:$order->email, Address:$order->address, Product ID:$order->product_id, Product Name:$order->product_name, Product Price:$order->product_price, Quantity:$order->quantity, Total Price:$order->total"
                                        ); !!}
                                    </div>
                                </td> --}}
                            </tr>
                            @endforeach
                            @else
                            <div class="text-danger h1">
                                <span class="">No Orders found!!</span>
                            </div>
                            @endif
                            
                        </tbody>
                        
                    </table>
                    <div class="pageNum">
                      
                        {{ $orders->links() }}
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection