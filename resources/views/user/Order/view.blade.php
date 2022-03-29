<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.0/sweetalert2.min.js">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Order Details</title>
    <style type="text/css">
        .box{
        width:600px;
        margin:0 auto;
        }
    </style>
</head>
    <body>
    <br />
    <div class="container">
        <h3 align="center">Order Details</h3><br />
        <div class="row">
        <div class="col-md-7" align="right">
        </div>
        </div>
        <br />
        <div class="table-responsive">
        <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Category</th>
            <th>Quantity </th>
            <th>Total</th>
            <th>Order Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
        <tr>
            <td >{{ $order->id }}</td>
            <td class="name">{{ $order->name }}</td>
            <td class="email">{{ $order->email }}</td>
            <td class="address">{{ $order->address }}</td>
            <td class="product_id">{{ $order->product_id }}</td>
            <td class="product_name">{{ $order->product_name }}</td>
            <td class="product_price">{{ $order->product_price }}</td>
            <td class="category_name">{{ $order->category_name }}</td>
            <td class="quantity">{{ $order->quantity }}</td>
            <td class="total">{{ $order->total }}</td>     
            <td class="created_at">{{ $order->created_at }}</td>     
        </tr>
        <input type="hidden" name="user_id" value="{{ $order->user_id }}" class="user_id">
        @endforeach
        </tbody>
        </table>
        </div>
            
        <div id="paypal-button-container" class="w-25 p-3 mx-auto">
            <a    type= "button" class="btn btn-danger w-100 fw-bold" 
            style="height:5vh"   href="{{   route('cashondelivery', $order) }}" id="cash_payment" >Cash on Delivery | COD </a><br><br>
        </div>
    </div>
    <script src="https://www.paypal.com/sdk/js?client-id=AZb5niAPBcvae6yObV9yul3c3AgrYr1WWO7G2Y0bMIx9X5FyxGBFI_nay7CkqxgMYQLTZt374ir-uxzk&currency=USD"></script>
    <script>
        paypal.Buttons({
          // Sets up the transaction when a payment button is clicked
            createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                amount: {
                value: '{{ $order->total }}' // Can reference variables or functions. Example: `value: document.getElementById('...').value`
                }
                }]
            });
            },
          // Finalize the transaction after payer approval
            onApprove: function(data, actions) {
            return actions.order.capture().then(function(orderData) {
                var user_id = $('.user_id').val();
                var name = $('.name').text();
                var email = $('.email').text();
                var address = $('.address').text();
                var product_id = $('.product_id').text();
                var product_name = $('.product_name').text();
                var product_price = $('.product_price').text();
                var category_name = $('.category_name').text();
                var quantity = $('.quantity').text();
                var total = $('.total').text();
                $.ajax({
                    method:"POST",
                    url: "/place-order",
                    data:{
                        '_token': "{{ csrf_token() }}",
                        'user_id': user_id,
                        'name': name,
                        'email': email,
                        'address':address,
                        'product_id':product_id,
                        'product_name':product_name,
                        'product_price' :product_price,
                        'category_name' :category_name,
                        'quantity':quantity,
                        'total': total,
                        'payment_mode':"Paid with Paypal",
                        'payment_id':orderData.id,
                    },
                    success:function(response){
                        swal(response.status);
                        window.location.href ="/homepage";
                    }
                });
        });
        }
        }).render('#paypal-button-container');
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" 
    crossorigin="anonymous"></script>
    @include('sweetalert::alert')
    </body>
</html>






