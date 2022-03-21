<?php

namespace App\Http\Controllers;
Use App\Providers\SweetAlertServiceProvider;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\InStock;
use App\Models\Product;
use App\Models\User;
use File;


class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }

    // Product CRUD Operation
    public function indexxx()
    {
        $products = Product::all();
        $in_stocks = InStock::all();
        $categories = Category::all();
        $roles=Auth::User()->roles;
        if($roles=='Admin'){
            return view('admin.Product.product',compact('products','categories','in_stocks'));
        }
        else if($roles=='Staff'){
        
            return view('staff.Product.product',compact('products','categories','in_stocks'));
        }
    }


    

    // public function search1(){

    //     $search =$_GET['product_item'];
    //     $products = Product::where('name', 'LIKE', '%' .$search. '%')->get();
    //     return view('admin.Product.details', compact('products'));


    // }


    public function createee(Request $request)
    {
        Alert::success('Product Added Successfully !!!', 'Products');
        $product = new Product;
        $product->name = $request->name;
        $product->quantity = $request->quantity;
		$product->price = $request->price;
		$product->category_id = $request->category_id;
		$product->in_stock_id = $request->in_stock_id;
		$product->total = $request->total;
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/products/', $filename);
            $product->image = $filename;
        }
        $product->save();
        $Instock = InStock::where('id',$product->in_stock_id)->first();
        $Instock->quantity = $Instock->quantity - $request->quantity;
        $Instock->save();
        return redirect(route('indexxx'));

        // 🤣🤣🤣😊 press windows + . to generate emogis

        
        
    }
    
    public function edittt($id)
    {
        $product = Product::find($id);
        $Instock = InStock::all();
        $category = Category::all();
        $roles=Auth::User()->roles;
        if($roles=='Admin'){
            return view('admin.Product.edit',compact('product','category','Instock'));
        }
        else if($roles=='Staff'){
        
            return view('staff.Product.edit',compact('product','category','Instock'));
        }
    }

    public function updateee(Request $request, $id)
    {
        Alert::success('Product Updated Successfully !!!', 'Products');
        $product = Product::find($id);
        $product->name = $request->name;
        $product->quantity = $request->quantity;
		$product->price = $request->price;
		$product->category_id = $request->category_id;
		$product->in_stock_id = $request->in_stock_id;
		$product->total = $request->total;

        if($request->hasfile('image'))
        {
            $destination = 'uploads/products/'.$product->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/products/', $filename);
            $product->image = $filename;
        }
        $product->save();
        return redirect(route('indexxx'));
        // Alert::success('Product Added Successfully !!!', 'Products');

    }

    public function destroyyy($id)
    {
        Alert::warning('Product Deleted Successfully !!!', 'Products');
        Product::destroy($id);
        return redirect(route('indexxx'));

    }

    public function get_stocks($id)
    {
        $Instock = InStock::where('id',$id)->first();
        $name =$Instock->name;
        $stock_quantity =$Instock->quantity;
        $res =['status'=>'Success','name'=>$name,'stock_quantity'=>$stock_quantity];
        echo (json_encode($res));
    }

}
