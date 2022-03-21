<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Providers\SweetAlertServiceProvider;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Payment;
use DB;
use PDF;


class PaymentPDFController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }

    public function get_payments_data()
    {

        $payments = DB::table('payments')
        ->orderby('id','desc')
        ->limit(20)
        ->get();
        return $payments;
    }
    public function pdf()
    {
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($this->convert_payments_data_to_html());
    return $pdf->stream();
    }
    public function convert_payments_data_to_html()
    {
    $payments = $this->get_payments_data();
    $output = '
    <h3 align="center">Payments Data</h3>
    <table width="100%" style="border-collapse: collapse; border: 0px;">
    <tr>
    <th style="border: 1px solid; padding:12px;" width="20%">ID</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Name</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Email</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Address</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Product Name</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Product Price</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Quantity</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Total</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Payment Mode</th>
   </tr>
     ';  
     foreach($payments as $payment)
     {
      $output .= '
      <tr>
      <td style="border: 1px solid; padding:12px;">'.$payment->id.'</td>
       <td style="border: 1px solid; padding:12px;">'.$payment->name.'</td>
       <td style="border: 1px solid; padding:12px;">'.$payment->email.'</td>
       <td style="border: 1px solid; padding:12px;">'.$payment->address.'</td>
       <td style="border: 1px solid; padding:12px;">'.$payment->product_name.'</td>
       <td style="border: 1px solid; padding:12px;">'.$payment->product_price.'</td>
       <td style="border: 1px solid; padding:12px;">'.$payment->quantity.'</td>
       <td style="border: 1px solid; padding:12px;">'.$payment->total.'</td>
       <td style="border: 1px solid; padding:12px;">'.$payment->payment_mode.'</td>
      </tr>
      ';
     }
     $output .= '</table>';
     return $output;
    }
}


