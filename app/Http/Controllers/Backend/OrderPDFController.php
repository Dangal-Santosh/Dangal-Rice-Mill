<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Providers\SweetAlertServiceProvider;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use DB;
use PDF;


class OrderPDFController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }

    public function get_order_data()
    {

        $orders = DB::table('orders')
        ->orderby('id','desc')
        ->limit(20)
        ->get();
        return $orders;
    }
    public function pdf()
    {
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($this->convert_order_data_to_html());
    return $pdf->stream();
    }
    public function convert_order_data_to_html()
    {
    $orders = $this->get_order_data();
    $output = '
    <h3 align="center">orders Data</h3>
    <table width="100%" style="border-collapse: collapse; border: 0px;">
    <tr>
    <th style="border: 1px solid; padding:12px;" width="20%">ID</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Name</th>
    <th style="border: 1px solid; padding:12px;" width="30%">Email</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Address</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Product Name </th>
    <th style="border: 1px solid; padding:12px;" width="15%">Price </th>
    <th style="border: 1px solid; padding:12px;" width="20%">Quantity</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Total</th>
   </tr>
     ';  
     foreach($orders as $order)
     {
      $output .= '
      <tr>
      <td style="border: 1px solid; padding:12px;">'.$order->id.'</td>
       <td style="border: 1px solid; padding:12px;">'.$order->name.'</td>
       <td style="border: 1px solid; padding:12px;">'.$order->email.'</td>
       <td style="border: 1px solid; padding:12px;">'.$order->address.'</td>
       <td style="border: 1px solid; padding:12px;">'.$order->product_name.'</td>
       <td style="border: 1px solid; padding:12px;">'.$order->product_price.'</td>
       <td style="border: 1px solid; padding:12px;">'.$order->quantity.'</td>
       <td style="border: 1px solid; padding:12px;">'.$order->total.'</td>
      </tr>
      ';
     }
     $output .= '</table>';
     return $output;
    }
}

