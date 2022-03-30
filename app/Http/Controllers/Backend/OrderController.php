<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
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


class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }

    // public function orderindex()
    // {   
    //     $users =User::all();
    //     $orders = Order::all();
    //     $user_order = Order::orderBy('created_at','DESC')->where('user_id',Auth::user()->id)->get();
    //     $products = Product::all();
    //     return view('user.Order.order', ['orders'=>$orders,'products'=>$products,'users'=>$users,'user_order'=>$user_order]);


    // }
    public function productOrder($id) {
        $this->id = $id;
        $pro = Product::where('id',$this->id)->first();
        $orders = Order::orderBy('created_at', 'DESC')
            ->where('user_id', Auth::user()->id)
            ->whereDate('created_at', date('Y-m-d'))
            ->get();
        return view('user.Order.productorder', compact('pro', 'orders'));
    }

   public function productordercreate(Request $request)
    {
        
        $this->validate($request, [
            'user_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'product_id' => 'required',
            'category_name' => 'required',
            'quantity' => 'required',
            'total' => 'required',
            'product_price' => 'required',
            'quantity' => 'required',
            'image' => 'required'
        ]);

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
        $order->category_name =$request->category_name;
        $order->image =$request->image;
        $order->total =$request->total;
        $order->save();
        $product = Product::where('id',$order->product_id)->first();
        $product->quantity = $product->quantity - $request->quantity;
        $product->save();
        return back();
    }
    // public function ordercreate(Request $request)
    // {
        
    //     $this->validate($request, [
    //         'user_id' => 'required',
    //         'name' => 'required',
    //         'email' => 'required',
    //         'address' => 'required',
    //         'product_id' => 'required',
    //         'category_name' => 'required',
    //         'quantity' => 'required',
    //         'total' => 'required',
    //         'product_price' => 'required',
    //         'quantity' => 'required',
    //         'image' => 'image|nullable'
    //     ]);

    //     Alert::success('Order Placed Successfully !!!', 'Orders');

    //     $order = new Order;
    //     $order->user_id =$request->user_id;
    //     $order->name =$request->name;
    //     $order->email =$request->email;
    //     $order->address=$request->address;
    //     $order->product_id =$request->product_id;
    //     $order->product_name =$request->product_name;
    //     $order->product_price =$request->product_price;
    //     $order->quantity =$request->quantity;
    //     $order->category_name =$request->category_name;
    //     $order->image =$request->image;
    //     // if($request->hasfile('image'))
    //     // {
    //     //     $file = $request->file('image');
    //     //     $extention = $file->getClientOriginalExtension();
    //     //     $filename = time().'.'.$extention;
    //     //     $file->move('uploads/products/', $filename);
    //     //     $order->image = $filename;
    //     // }
    //     $order->total =$request->total;
    //     $order->save();
    //     $product = Product::where('id',$order->product_id)->first();
    //     $product->quantity = $product->quantity - $request->quantity;
    //     $product->save();
    //     return back();
    // }
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
        $categories = Category::all();
        $orders = Order::where('id',$id)->get();
        return view('user.Order.view',['orders'=>$orders],['products'=>$products],['users'=>$users],['categories'=>$categories]);
    }
    public function orderupdate(Request $request, $id)
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

        // Alert::success('Order Updated Successfully !!!', 'Orders');
        
        $order = Order::find($id);
        $order->user_id =$request->user_id;
        $order->name =$request->name;
        $order->email =$request->email;
        $order-> address=$request->address;
        $order->product_id =$request->product_id;
        $order->product_name =$request->product_name;
        $order->product_price =$request->product_price;
        $order->quantity =$request->quantity;
        $order->category_name =$request->category_name;
        $order->image =$request->image;
        
        $order->total =$request->total; 
        $order->created_at =$request->created_at; 
        $order->save();
        $product = Product::where('id',$order->product_id)->first();
        $product->quantity = $product->quantity - $request->quantity;
        $product->save();
        return redirect(route('productOrder'));
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
        return redirect(route('product',compact('products','users')));
    }

    public function get_products($id){

        $product = Product::where('id',$id)->first();
        $price =$product->price;
        $name =$product->name;
        $quantity =$product->quantity;
        $category_name =$product->category_name;
        $image =$product->image;
        $response =['status'=>'Success','price'=>$price,'name'=>$name,'quantity'=>$quantity,'category_name'=>$category_name,'image'=>$image];
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

    // public function product(){
    //     $product = DB::table('products')->select('image','name','price')->orderBy('image','desc')->limit(5)->get();
    //     return view ('user.Order.product',compact('product'));
    // }

    public function product(Request $request){
        $product = DB::table('products')->select('image','name','price')->orderBy('image','desc')->limit(5)->get();
        $product = Product::all();
        $in_stocks = InStock::all();
        $categories = Category::all();
        $see_product = $request['see_product'] ?? "";
        if($see_product != "") {
            $products = Product::where('name', 'LIKE', "%$see_product%")->get();
        }else {
            $products = Product::orderBy('id', 'Asc')->get();
        }
        return view ('user.Order.Product',compact('in_stocks','categories','products','product'));
    }

}

