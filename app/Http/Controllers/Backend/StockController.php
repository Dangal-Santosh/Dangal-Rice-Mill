<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
Use App\Providers\SweetAlertServiceProvider;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Models\InStock;

class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }
    
    public function Instockindex()
    {
        $Instocks = InStock::all();
        return view('admin.Stock.Instock.stock', ['Instocks'=>$Instocks]);
    }
    public function Instockcreate(Request $request)
    {
        
        //Instock Validation
        $this->validate($request, [
            'name' => 'required',
            'quantity' => 'required',
            'supplier' => 'required',
        ]);
        
        Alert::success('Admin Added Stock Successfully !!!', 'InStock');
        $Instock = new InStock;
        $Instock->name = $request->name;
        $Instock->quantity = $request->quantity;
        $Instock->supplier = $request->supplier;
        $Instock->save();
        return redirect(route('Instockindex'));
    }

    public function Instockedit($id)
    {
        $Instock = InStock::find($id);
        return view('admin.Stock.Instock.edit', ['Instock'=>$Instock]);
    }

    public function Instockupdate(Request $request, $id)
    {
        Alert::success('Admin Updated InStock Successfully !!!', 'InStock');
        $Instock = InStock::find($id);
        $Instock->name = $request->name;
        $Instock->quantity = $request->quantity;
        $Instock->supplier = $request->supplier;
        $Instock->save();
        return redirect(route('Instockindex'));
    }

    public function instockdestroy($id)
    {
        Alert::warning('Admin Deleted InStock Successfully !!!', 'InStock');
        InStock::destroy($id);
        return redirect(route('Instockindex'));
    }
}

