<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
Use App\Providers\SweetAlertServiceProvider;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Payment;
use App\Models\Order;
use App\Models\Product;




class PaymentController extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }

    public function placeorder(Request $request){

        // Alert::success('Order Placed Successfully', 'Please Visit Again!!');
        $payment = new Payment();
        $payment->user_id =Auth::id();
        $payment->name =$request->name;
        $payment->email =$request->email;
        $payment->address=$request->address;
        $payment->product_id =$request->product_id;
        $payment->product_name =$request->product_name;
        $payment->product_price =$request->product_price;
        $payment->quantity =$request->quantity;
        $payment->total =$request->total;
        $payment->payment_mode = $request->payment_mode;
        $payment->payment_id = $request->payment_id;
        $payment->save();

        if($request->payment_mode == "Paid With Paypal")
        {
        }

        return response()->json(['status'=>"Order Placed Successfully"]);
    }

    public function cashondelivery(Order $order){

        Alert::success('Order Placed Successfully', 'Please Visit Again!!');
        $payment = new Payment();
        $payment->user_id =Auth::id();
        $payment->name =$order->name;
        $payment->email =$order->email;
        $payment->address=$order->address;
        $payment->product_id =$order->product_id;
        $payment->product_name =$order->product_name;
        $payment->product_price =$order->product_price;
        $payment->quantity =$order->quantity;
        $product = Product::findOrFail( $order->product_id );
        $payment->total =$order->total;
        $payment->payment_mode = $order->payment_mode;
        $payment->payment_id = $order->payment_id;
        $payment->payment_mode = "Cash on Delivery";
        $payment->save();
        return redirect('homepage');
    }
}
