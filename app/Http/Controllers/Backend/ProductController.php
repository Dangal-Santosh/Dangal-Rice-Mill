<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

Use App\Providers\SweetAlertServiceProvider;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
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
    public function indexxx( Request $request)
    {
        $products = Product::all();
        $in_stocks = InStock::all();
        $categories = Category::all();
        $roles=Auth::User()->roles;
        // if ($request->sort_by) {
        // $order=($request->sort_by=='oldest')?'ASC':'DESC';
        // $product->sortByDesc()('created_at','order');
            
        // }else{
        //     $product->products('created_at','DESC');
        // }

        return view('admin.Product.product',compact('products','categories','in_stocks'));
    }


    // <form action="" class="form-inline">
    //     <select name="" id="" class="form-control" onchange="sort_by(this.value)">
    //         <option value="latest" {{ (Request::query('sort_by') && Request::query('sort_by')=='latest' || Request::query('sort_by') )?'selected':''}}>Latest</option>
    //         <option value="oldest" {{ (Request::query('sort_by') && Request::query('sort_by')=='oldest')?'selected':''}}>Oldest</option>
    //     </select>
    // </form>


//     <script type="text/javascript">
//     function sort_by (value){
//         object.assign(query,{'sort_by':value});
//         window.location.href="{{ route('orderProduct') }}"*'?'+$.param(query);
//     }
// </script>

    

    // public function search1(){

    //     $search =$_GET['product_item'];
    //     $products = Product::where('name', 'LIKE', '%' .$search. '%')->get();
    //     return view('admin.Product.details', compact('products'));


    // }


    public function createee(Request $request)
    {

        
        //Product Validation
        $this->validate($request, [
            'name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'category_name' => 'required',
            'in_stock_id' => 'required',
            'total' => 'required',
            'image' => 'image|nullable'
        ]);
        
        Alert::success('Product Added Successfully !!!', 'Products');
        $product = new Product;
        $product->name = $request->name;
        $product->quantity = $request->quantity;
		$product->price = $request->price;
        $product->category_id = $request->category_id;
		$product->category_name = $request->category_name;
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
        return view('admin.Product.edit',compact('product','category','Instock'));
    }

    public function updateee(Request $request, $id)
    {
        Alert::success('Product Updated Successfully !!!', 'Products');

        //Product Validation
        $this->validate($request, [
            'name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'category_name' => 'required',
            'in_stock_id' => 'required',
            'total' => 'required',
            'image' => 'image|nullable'
        ]);
        
        $product = Product::find($id);
        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category_id;
		$product->price = $request->price;
		$product->category_name = $request->category_name;
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
    public function get_category($id){

        $category = Category::where('id',$id)->first();
        $category_name =$category->name;
        $resp =['status'=>'Success','category_name'=>$category_name];
        echo (json_encode($resp));
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

