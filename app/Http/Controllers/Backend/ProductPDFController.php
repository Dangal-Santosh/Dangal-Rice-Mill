<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Providers\SweetAlertServiceProvider;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Product;
use DB;
use PDF;


class ProductPDFController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }

    public function get_products_data()
    {

        $products = DB::table('products')
        ->orderby('id','desc')
        ->limit(20)
        ->get();
        return $products;
    }
    public function pdf()
    {
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($this->convert_products_data_to_html());
    return $pdf->stream();
    }
    public function convert_products_data_to_html()
    {
    $products = $this->get_products_data();
    $output = '
    <h3 align="center">Products Data</h3>
    <table width="100%" style="border-collapse: collapse; border: 0px;">
    <tr>
    <th style="border: 1px solid; padding:12px;" width="20%">ID</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Category ID</th>
    <th style="border: 1px solid; padding:12px;" width="30%">InStock ID</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Name</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Quantity</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Price </th>
    <th style="border: 1px solid; padding:12px;" width="20%">Total</th>
   </tr>
     ';  
     foreach($products as $product)
     {
      $output .= '
      <tr>
      <td style="border: 1px solid; padding:12px;">'.$product->id.'</td>
      <td style="border: 1px solid; padding:12px;">'.$product->category_id.'</td>
       <td style="border: 1px solid; padding:12px;">'.$product->in_stock_id.'</td>
       <td style="border: 1px solid; padding:12px;">'.$product->name.'</td>
       <td style="border: 1px solid; padding:12px;">'.$product->quantity.'</td>
       <td style="border: 1px solid; padding:12px;">'.$product->price.'</td>
       <td style="border: 1px solid; padding:12px;">'.$product->total.'</td>
      </tr>
      ';
     }
     $output .= '</table>';
     return $output;
    }
}


