@extends('layouts.master')
@section('title')
Admin DashBoard
@endsection

@section('sidebar')
<div class="overview-boxes">
    <div class="box">
        <div class="right-side">
            <div class="box-topic"><strong>Total Orders</strong></div>
            <div class="number my-2">
                <h2 class="card-title ">{{ $total_orders }}</h2>
            </div>
            <div class="indicator">
                <i class='bx bx-data'></i>
                <a href="{{ url('/orderdetails') }}">See Detailed Report</a>
            </div>
        </div>
        <i class="material-icons">list_alt</i>
    </div>
    <div class="box">
        <div class="right-side">
            <div class="box-topic"><strong>Total Users</strong></div>
            <div class="number my-2" >
                <h2 class="card-title">{{ $total_users }}</h2>
            </div>
            <div class="indicator">
                <i class='bx bxs-user-detail'></i>
                <a href="#pablo">See Detailed Report</a>
            </div>
        </div>
        <i class="material-icons">account_box</i>
    </div>
    <div class="box">
        <div class="right-side">
            <div class="box-topic"><strong>Total Products</strong></div>
            <div class="number my-2">
                <h2 class="card-title">{{ $total_products }}</h2>
            </div>
            <div class="indicator">
                <i class='bx bx-data'></i>
                <a href="{{ url('/productdetails') }}">See Detailed Report</a>
            </div>
        </div>
        <i class="material-icons">inventory</i>
    </div>
    <div class="box">
        <div class="right-side">
            <div class="box-topic"><strong>Total Income</strong></div>
            <div class="number my-2">
                <h2 class="card-title">${{ $sum}}</h2>
            </div>
            <div class="indicator">
                <i class='bx bx-data'></i>
                <a href="{{ ('/paymentdetails') }}">See Detailed Report</a>
            </div>
        </div>
        <i class="material-icons">account_balance_wallet</i>
    </div>
</div>

<div class="sales-boxes">
    <div class="recent-sales box">
        <div class="card-header card-header-text">
            <a href="{{ url('stock_pdf/pdf') }}" class="btn btn-success">
                <span class="font-weight-bold text-reset">Stock Details</span>
                <i class=" bx bxs-download"></i> 
            </a>
        </div>
        <div class="sales-details">
            <table class="table table-hover">
                <thead>
                <tr class="text-danger">
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity</th>                      
                    <th scope="col">Price</th>                      
                    <th scope="col">Category</th>                      
                    <th scope="col">Supplier</th> 
                    <th scope="col">Total Price</th>                      
                </tr>
                </thead>
                <tbody>
                    @foreach ($stocks as $stock)
                    <tr>
                        <th>{{$stock->id}}</th>
                        <td>{{$stock->name}}</td>
                        <td>{{$stock->quantity}}</td>
                        <td>{{$stock->price}}</td>
                        <td>{{$stock->category}}</td>
                        <td>{{$stock->supplier}}</td>
                        <td>{{$stock->total}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    {{-- <div class="top-sales box">
        <div class="title">Top Seling Product</div>
        <ul class="top-sales-details">
            <li>
                <a href="#">
                    <img src="images/sunglasses.jpg" alt="">
                    <span class="product">Vuitton Sunglasses</span>
                </a>
                <span class="price">$1107</span>
            </li>
            <li>
                <a href="#">
                    <img src="images/jeans.jpg" alt="">
                    <span class="product">Hourglass Jeans </span>
                </a>
                <span class="price">$1567</span>
            </li>
            <li>
                <a href="#">
                    <img src="images/nike.jpg" alt="">
                    <span class="product">Nike Sport Shoe</span>
                </a>
                <span class="price">$1234</span>
            </li>
            <li>
                <a href="#">
                    <img src="images/scarves.jpg" alt="">
                    <span class="product">Hermes Silk Scarves.</span>
                </a>
                <span class="price">$2312</span>
            </li>
            <li>
                <a href="#">
                    <img src="images/blueBag.jpg" alt="">
                    <span class="product">Succi Ladies Bag</span>
                </a>
                <span class="price">$1456</span>
            </li>
            <li>
                <a href="#">
                    <img src="images/bag.jpg" alt="">
                    <span class="product">Gucci Womens's Bags</span>
                </a>
                <span class="price">$2345</span>
            <li>
                <a href="#">
                    <img src="images/addidas.jpg" alt="">
                    <span class="product">Addidas Running Shoe</span>
                </a>
                <span class="price">$2345</span>
            </li>
            <li>
                <a href="#">
                    <img src="images/shirt.jpg" alt="">
                    <span class="product">Bilack Wear's Shirt</span>
                </a>
                <span class="price">$1245</span>
            </li>
        </ul>
    </div> --}}
</div>
</div>

@endsection