<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
Use App\Providers\SweetAlertServiceProvider;

use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\InStock;
use App\Models\TotalStock;
use App\Models\Payment;
use App\Models\Category;

class IndexController extends Controller
{

    public function homeindex() {
        $roles=Auth::User()->roles;
        if($roles=='Admin'){
            return view('admin.Dashboard.admindashboard');
        }
        else{
            return view('pages.index');
            // return view('pages.index',compact('product','offers','abouts','homepages','contacts'));
        }
    }
    public function welcome(){
        return view ('welcome');
    }

    public function Adashboard() 
    {
        $sum = Order::sum('total');
        $total_orders =DB::table('orders')->count();
        $total_products =DB::table('products')->count();
        $total_payments =DB::table('payments')->count();
        $total_users =DB::table('users')->count();
        $users = User::where ('roles', 'user')->get();
        $products = Product::all();
        $orders = Order::all();
        $stocks = TotalStock::all();
        return view('admin.Dashboard.dashboard', compact('orders','users','products','total_users','sum','total_orders','total_products','stocks'));
    }

    public function sdashboard(Request $request)
    {
        $product_worth = Product::sum('total');
        $search = $request['search'] ?? "";
        if($search != "") {
            $products = Product::where('name', 'LIKE', "%$search%")->paginate(1);
        }else {
            $products = Product::orderBy('id', 'Asc')->paginate(1);
        }
        return view ('staff.Dashboard.dashboard',compact('products','product_worth'));
    }

    // public function searchProducts(Request $request) {
    //     $search = $request['search'] ?? "";
    //     if($search != "") {
    //         $products = Product::where('name', 'LIKE', "%$search%")->get();
    //     }else {
    //         $products = Bus::orderBy('id', 'Asc')->get();
    //     }
    //     return view('staff.dashboard', compact('products'));
    // }

// $search1 = $request['search1'] ?? "";
//         $search2 = $request['search2'] ?? "";
//         $search3 = $request['search3'] ?? "";
//         if($search != "") {
//             $buses = Bus::where('bus_name', 'LIKE', "%$search%")->paginate(3);
//         }elseif ($search1 != "") {
//             $buses = Bus::where('time', 'LIKE', "%$search1")->paginate(3);
//         }elseif ($search2 != "") {
//             $buses = Bus::where('price', 'LIKE', "%$search2")->paginate(3);
//         }elseif ($search3 != "") {
//             $buses = Bus::where('date', 'LIKE', "%$search3")->paginate(3);
//         }else {
//             $buses = Bus::orderBy('bus_id', 'Asc')->paginate(3);
//         }
//         return view('user.searchBus', compact('buses'));

    public function piechart(){

        $Instocks = InStock::all();
        $Instocks=DB::select(DB::raw(" SELECT name, quantity from in_stocks group by quantity,name"));
        $chartData="";
        foreach($Instocks as $Instock)
        {
            $chartData.="['".$Instock->name."',  ".$Instock->quantity."],";

        }
        $arr['chartData']=rtrim($chartData,",");
        return view ('admin.Stock.Instock.chart',$arr,compact('Instocks'));
        }



        public function bargraph(){

            $payments = Payment::all();
            $payments=DB::select(DB::raw("SELECT product_name, quantity,product_price, total from payments group by product_name, quantity,product_price, total;"));
            $barData="";
            foreach($payments as $payment)
            {
                $barData.="['".$payment->product_name."',  ".$payment->product_price.",".$payment->quantity.", ".$payment->total."],";
    
            }
            $arr['barData']=rtrim($barData,",");
            return view ('admin.Sales.bargraph',$arr,compact('payments'));
            }

    public function orderdetails(Request $request){
        $users = User::all();
        $products = Product::all();
        $order = Order::all();
        $search2 = $request['search2'] ?? "";
        if($search2 != "") {
            $orders = Order::where('created_at', 'LIKE', "%$search2%")->paginate(2);
        }else {
            $orders = Order::orderBy('id', 'Asc')->paginate(5);
        }
        return view ('admin.Order.details',compact('users','products','order','orders'));
    }

    public function productdetails(Request $request){
        $product = Product::all();
        $in_stocks = InStock::all();
        $categories = Category::all();
        $finds = $request['finds'] ?? "";
        if($finds != "") {
            $products = Product::where('name', 'LIKE', "%$finds%")->get();
        }else {
            $products = Product::orderBy('id', 'Asc')->get();
        }
        return view ('admin.Product.details',compact('in_stocks','categories','products','product'));
    }

    public function paymentdetails(Request $request) 
    {
        $payment = Payment::all();
        $users = User::where ('roles', 'user')->get();
        $products = Product::all();
        $orders = Order::all();
        $paysearch = $request['paysearch'] ?? "";
        if($paysearch != "") {
            $payments = Payment::where('created_at', 'LIKE', "%$paysearch%")->get();
        }else {
            $payments = Payment::orderBy('id', 'Asc')->get();
        }
        return view('admin.Sales.details',compact('orders','users','products','payments','payment'));
    }

    public function userdetails(){

        $user = User::all();
        $usersearch = $request['usersearch'] ?? "";
        if($usersearch != "") {
            $users = User::where('created_at', 'LIKE', "%$usersearch%")->get();
        }else {
            $users = User::orderBy('id', 'Asc')->get();
        }
        return view('admin.User.details',compact('users','user'));
    }
}
