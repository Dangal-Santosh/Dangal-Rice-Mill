<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Providers\SweetAlertServiceProvider;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\InStock;
use DB;
use PDF;


class InStockPDFController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }

    public function get_in_stocks_data()
    {

        $instocks = DB::table('in_stocks')
        ->orderby('id','desc')
        ->limit(20)
        ->get();
        return $instocks;
    }
    public function pdf()
    {
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($this->convert_in_stocks_data_to_html());
    return $pdf->stream();
    }
    public function convert_in_stocks_data_to_html()
    {
    $instocks = $this->get_in_stocks_data();
    $output = '
    <h3 align="center">InStocks Data</h3>
    <table width="100%" style="border-collapse: collapse; border: 0px;">
    <tr>
    <th style="border: 1px solid; padding:12px;" width="20%">ID</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Name</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Quantity</th>
    <th style="border: 1px solid; padding:12px;" width="30%">supplier</th>
   </tr>
     ';  
     foreach($instocks as $in)
     {
      $output .= '
      <tr>
      <td style="border: 1px solid; padding:12px;">'.$in->id.'</td>
       <td style="border: 1px solid; padding:12px;">'.$in->name.'</td>
       <td style="border: 1px solid; padding:12px;">'.$in->quantity.'</td>
       <td style="border: 1px solid; padding:12px;">'.$in->supplier.'</td>
      </tr>
      ';
     }
     $output .= '</table>';
     return $output;
    }
}


