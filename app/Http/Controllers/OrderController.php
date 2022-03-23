<?php

namespace App\Http\Controllers;
Use App\Providers\SweetAlertServiceProvider;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }

    // crud for Managing Staffs
    public function orderindex()
    {   
        $users =User::all();
        $orders = Order::all();
        $user_order = Order::orderBy('created_at','DESC')->where('user_id',Auth::user()->id)->get();
        $products = Product::all();
        return view('user.Order.order', ['orders'=>$orders,'products'=>$products,'users'=>$users,'user_order'=>$user_order]);


        // $payments = Payment::orderBy('created_at','DESC')->where('user_id',Auth::user()->id)->get();
        // return view('payment.paymentDetails',compact('payments'));
    }
    public function ordercreate(Request $request)
    {

        Alert::success('Order Placed Successfully !!!', 'Orders');
        $order = new Order;
        $order->user_id =$request->user_id;
        $order->name =$request->name;
        $order->email =$request->email;
        $order->address=$request->address;
        $order->product_id =$request->product_id;
        $order->product_name =$request->product_name;
        $order->product_price =$request->product_price;
        $order->quantity =$request->quantity;
        $order->category_id =$request->category_id;
        $order->total =$request->total;
        $order->save();
        $product = Product::where('id',$order->product_id)->first();
        $product->quantity = $product->quantity - $request->quantity;
        $product->save();
        return back();
    }
    public function orderedit($id)
    {
        $users = User::all();
        $order = Order::find($id);
        $products = Product::all();
        return view('user.Order.edit', ['order'=>$order],['products'=>$products],['users'=>$users]);
    }
    public function orderview($id)
    {      
        $users = User::all();
        $products = Product::all();
        $orders = Order::where('id',$id)->get();
        return view('user.Order.view',['orders'=>$orders],['products'=>$products],['users'=>$users]);
    }
    public function orderupdate(Request $request, $id)
    {
        Alert::success('Order Updated Successfully !!!', 'Orders');
        $order = Order::find($id);
        $order->user_id =$request->user_id;
        $order->name =$request->name;
        $order->email =$request->email;
        $order-> address=$request->address;
        $order->product_id =$request->product_id;
        $order->product_name =$request->product_name;
        $order->product_price =$request->product_price;
        $order->quantity =$request->quantity;
        $order->category_id =$request->category_id;
        $order->total =$request->total; 
        $order->save();
        $product = Product::where('id',$order->product_id)->first();
        $product->quantity = $product->quantity - $request->quantity;
        $product->save();
        return redirect(route('orderindex'));
    }
    public function orderdestroy($id)
    {
        Alert::warning('Order Cancelled Successfully !!!', 'Orders');
        $users = User::all();
        $order= Order::findOrFail($id);
        $products = Product::where('id',$order->product_id)->first();
        $products->quantity = $products->quantity + $order->quantity;
        $products->save();
        Order::destroy($id);
        return redirect(route('orderindex',compact('products','users')));
    }

    public function get_products($id){

        $product = Product::where('id',$id)->first();
        $price =$product->price;
        $name =$product->name;
        $quantity =$product->quantity;
        $category_id =$product->category_id;
        $response =['status'=>'Success','price'=>$price,'name'=>$name,'quantity'=>$quantity,'category_id'=>$category_id];
        echo (json_encode($response));
    }

    public function get_users($id){

        $user = User::where('id',$id)->first();
        $name =$user->name;
        $address =$user->address;
        $email =$user->email;
        $show =['status'=>'Success','name'=>$name,'address'=>$address,'email'=>$email];
        echo (json_encode($show));
    }

    public function product(){
        $product = DB::table('products')->select('image','name','price')->orderBy('image','desc')->limit(5)->get();
        return view ('user.Order.product',compact('product'));
    }

}
