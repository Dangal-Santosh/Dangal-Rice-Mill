<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
Use App\Providers\SweetAlertServiceProvider;

use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\InStock;
use App\Models\TotalStock;
use App\Models\Payment;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{

    public function homeindex() {
        // $homepages = DB::table('home_pages')->select('image','name','description')->orderBy('image','desc')->limit(1)->get();
        // $category = DB::table('categories')->select('image','name')->orderBy('image','desc')->limit(3)->get();
        // $abouts = DB::table('abouts')->select('image','name','desc')->orderBy('image','desc')->limit(1)->get();
        // $offers = DB::table('offers')->select('image','name','description','main_header')->orderBy('image','desc')->limit(1)->get();
        // $product = DB::table('products')->select('image','name','price')->orderBy('image','desc')->limit(5)->get();
        // $contacts = DB::table('contact_us')->select('name','email','address','contact')->orderBy('name','desc')->limit(1)->get();

        $roles=Auth::User()->roles;
        if($roles=='Admin'){
            return view('admin.Dashboard.admindashboard');
        }
        else if($roles=='Staff'){
        
            return view('staff.Dashboard.staffdashboard');
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
            $products = Product::where('name', 'LIKE', "%$search%")->get();
        }else {
            $products = Product::orderBy('id', 'Asc')->get();
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


        // public function search(){

        //     $search =$_GET['product_item'];
        //     $products = Product::where('name', 'LIKE', '%' .$search. '%')->get();
        //     return view('staff.viewproduct', compact('products'));
    
    
        // }

    // public function piechart(Request $request)
    // {
    //     $Rice = InStock::where('quantity','rice')->where('Name','Rice')->get()->count();
    //     $Baking_Goods = InStock::where('baking_goods','phone')->where('Name','Baking_Goods')->get()->count();
    //     $Bevereges = InStock::where('quantity','beverages')->where('Name','Beverages')->get()->count();       
    //     $Oils = InStock::where('quantity','olis')->where('Name','oils')->get()->count();       
    //     $Spices = InStock::where('quantity','spices')->where('Name','Spices')->get()->count();       
        
    //     // $laptop_count_18 = InStock::where('quantity','laptop')->where('year','2018')->get()->count();
    //     // $laptop_count_19 = InStock::where('quantity','laptop')->where('year','2019')->get()->count();
    //     // $laptop_count_20 = InStock::where('quantity','laptop')->where('year','2020')->get()->count();
    //     // $tablet_count_18 = InStock::where('quantity','tablet')->where('year','2018')->get()->count();
    //     // $tablet_count_19 = InStock::where('quantity','tablet')->where('year','2019')->get()->count();
    //     // $tablet_count_20 = InStock::where('quantity','tablet')->where('year','2020')->get()->count();    
        
    //     return view('piechart',compact('Rice','Baking_Goods','Oils','Spices','Beverages'));
    // }




//     public function showStatics()
//    {
    //   $products = DB::table('products')->get('*')->toArray();
    //   foreach($products as $pro)
    //    {
    //       $products[] = array
    //        (
    //         'label'=>$pro->name,
    //         'y'=>$pro->category_id
    //        ); 
    //    }
    //   return view('statics',compact('products'));
//    }

    // public function orderdetails ()
    // {
    //     $orders = Order::all();
    //     return view('admin.orderdetails',compact('orders'));
    // }

    public function orderdetails(Request $request){
        $users = User::all();
        $products = Product::all();
        $order = Order::all();
        $search2 = $request['search2'] ?? "";
        if($search2 != "") {
            $orders = Order::where('name', 'LIKE', "%$search2%")->get();
        }else {
            $orders = Order::orderBy('id', 'Asc')->get();
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
            $payments = Payment::where('name', 'LIKE', "%$paysearch%")->get();
        }else {
            $payments = Payment::orderBy('id', 'Asc')->get();
        }
        return view('admin.Sales.details',compact('orders','users','products','payments','payment'));
    }

    public function bargraph(){
        return view ('admin.Sales.bargraph');
    }


    public function product(){
        $product = DB::table('products')->select('image','name','price')->orderBy('image','desc')->limit(5)->get();
        return view ('user.pages.product',compact('product'));
    }
}
