<?php

namespace App\Http\Controllers;

use App\Models\TotalStock;
use RealRashid\SweetAlert\Facades\Alert;
Use App\Providers\SweetAlertServiceProvider;
use Illuminate\Http\Request;

class TotalStockController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }
    
    public function index()
    {
        $stocks = TotalStock::all();
         return view('admin.Stock.TotalStock.stock',compact('stocks'));
    }


    public function create(Request $request)
    {
        Alert::success('Stock Details Added Successfully !!!', 'Total Stock');
        $stock = new TotalStock;
        $stock->name = $request->name;
        $stock->quantity = $request->quantity;
		$stock->price = $request->price;
		$stock->supplier = $request->supplier;
		$stock->category = $request->category;
		$stock->total = $request->total;

        $stock->save();
        return redirect(route('index'));   
    }
    
    public function edit($id)
    {
        $stock = TotalStock::find($id);
        return view('admin.Stock.TotalStock.edit',compact('stock'));
    }

    public function update(Request $request, $id)
    {
        Alert::success('Stock Details Updated Successfully !!!','Total Stock');
        $stock = TotalStock::find($id);
        $stock->name = $request->name;
        $stock->quantity = $request->quantity;
		$stock->price = $request->price;
		$stock->category = $request->category;
		$stock->supplier = $request->supplier;
		$stock->total = $request->total;
        $stock->save();
        return redirect(route('index'));
    }

    public function destroy($id)
    {
        Alert::warning('Stock Details Deleted Successfully !!!', 'Total Stock');
        TotalStock::destroy($id);
        return redirect(route('index'));
    }
}
