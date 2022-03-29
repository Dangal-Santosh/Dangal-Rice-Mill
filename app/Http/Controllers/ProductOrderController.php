<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Providers\SweetAlertServiceProvider;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\InStock;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
// use Illuminate\Http\Request;

class ProductOrderController extends Controller
{
//    public function productorder($product_id){
//        $this->product_id = $product_id;
//        $products = Product::where('product_id',$this->product_id)->first();
//        $orders = Order::orderBy('created_at','DESC')
//        ->where('user_id',Auth::user()->id)
//        ->whereDate('created_at',date('y-m-d'))
//        ->get();
//     return view('user.Order.productorder',compact('orders','products') );
        
//    }

    public function productOrder($product_id){
        $this->product_id = $product_id;
        $product = Product::where('product_id',$this->product_id)->first();
        $orders = Order::orderBy('created_at','DESC')
            ->where('user_id',Auth::user()->id)
            ->whereDate('created_at',date('y-m-d'))
            ->get();
        return view('user.Order.productorder',compact('product','orders'));
    }

   public function productordercreate(Request $request)
    {
        
        // $this->validate($request, [
        //     'user_id' => 'required',
        //     'name' => 'required',
        //     'email' => 'required',
        //     'address' => 'required',
        //     'product_id' => 'required',
        //     'category_name' => 'required',
        //     'quantity' => 'required',
        //     'total' => 'required',
        //     'product_price' => 'required',
        //     'quantity' => 'required',
        //     'image' => 'image|nullable'
        // ]);

        // Alert::success('Order Placed Successfully !!!', 'Orders');

        $order = new Order;
        $order->user_id =$request->user_id;
        $order->name =$request->name;
        $order->email =$request->email;
        $order->address=$request->address;
        $order->product_id =$request->product_id;
        $order->product_name =$request->product_name;
        $order->product_price =$request->product_price;
        $order->quantity =$request->quantity;
        $order->category_name =$request->category_name;
        $order->image =$request->image;
        $order->total =$request->total;
        $order->save();
        $product = Product::where('id',$order->product_id)->first();
        $product->quantity = $product->quantity - $request->quantity;
        $product->save();
        return back();
    }
}
