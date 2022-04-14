@extends('layouts.master')
@section('title')
Admin DashBoard | Sales Details
@endsection

@section('sidebar')

<div class="row ">
    <div class="col-sm-12 ">
        <div class="sales_details">

            <table class="table table-striped table-borderless" cellspacing="0">
                <tfoot>
                    <tr>
                        <th></th>
                        <th class="text-right"><u>  Total Products Sold:</u><span class="text-danger px-2">{{ $payment->sum('quantity') }}</span> products </th>
                        <th class="text-right"><u>Total Income:</u><span class="text-danger px-2"> ${{ $payment->sum('total') }}</span></th>
                        <th class="text-right"><u>Total Customer Involved: </u><span class="text-danger px-2">{{ $payment->count('user_id') }} </span>customers </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<div class="row ">
    <div class="col-sm-12 ">
        <div class="payment_details">
            <form action="">
                <div class="row">
                    <div class="col-md-4 ml-5 mt-4 ">
                        <a href="{{ url('/payment_pdf/pdf') }}" class="btn btn-success text-center">
                            <span class="font-weight-bold text-reset">
                                Sales Details</span>
                            <i class='bx bxs-download'></i>
                        </a>
                    </div>
                    <div class="col-md-6 ">
                        <input type="date" class="form-control p-2 mt-4" id="name" placeholder="Search Payments"
                            name="paysearch" />
                    </div>

                    <div class="col-md-2 mt-4 pt-1">
                        <button class="btn btn-primary  p-1">
                            Search &rarr;</button>
                    </div>
                </div><br><br>
            </form>
            <h6 class="text-danger">Sales Details</h6><br>
            <div class="card">
                <div class="card-content table-responsive">
                    <table class="table table-hover">
                        <thead class="text-dark">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Quantity </th>
                                <th>Total</th>
                                <th>Payment Mode</th>
                                <th>Date</th>
                                {{-- <th>QR Code</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @if ($payments->count() > 0)
                            @foreach($payments as $payment)
                            <tr>
                                <td>{{ $payment->id }}</td>
                                <td>{{ $payment->name }}</td>
                                <td>{{ $payment->email }}</td>
                                <td>{{ $payment->address }}</td>
                                <td>{{ $payment->product_name }}</td>
                                <td>{{ $payment->product_price }}</td>
                                <td>{{ $payment->quantity }}</td>
                                <td>{{ $payment->total }}</td>
                                <td>{{ $payment->payment_mode }}</td>
                                <td>{{ $payment->created_at }}</td>
                                {{-- <td>
                                    <div class="qrcode">
                                        {!! QrCode::size(80)->generate(
                                        " Order ID:$payment->id, Customer Name:$payment->name, Email:$payment->email,
                                        Address:$payment->address, Product Name:$payment->product_name, Product
                                        Price:$payment->product_price, Quantity:$payment->quantity, Total
                                        Price:$payment->total, Total Price:$payment->payment_mode"
                                        ); !!}
                                    </div>
                                </td> --}}
                            </tr>
                            @endforeach
                            @else
                            <div class="text-danger h1">
                                <span class="">No Payment Details Found!!</span>
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