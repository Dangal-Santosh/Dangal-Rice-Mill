<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Providers\SweetAlertServiceProvider;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\TotalStock;
use DB;
use PDF;


class StockPDFController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }

    public function get_total_stocks_data()
    {

        $stocks = DB::table('total_stocks')
        ->orderby('id','desc')
        ->limit(20)
        ->get();
        return $stocks;
    }
    public function pdf()
    {
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($this->convert_total_stocks_data_to_html());
    return $pdf->stream();
    }
    public function convert_total_stocks_data_to_html()
    {
    $stocks = $this->get_total_stocks_data();
    $output = '
    <h3 align="center">Stocks Data</h3>
    <table width="100%" style="border-collapse: collapse; border: 0px;">
    <tr>
    <th style="border: 1px solid; padding:12px;" width="20%">ID</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Name</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Quantity</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Price </th>
    <th style="border: 1px solid; padding:12px;" width="15%">category</th>
    <th style="border: 1px solid; padding:12px;" width="30%">supplier</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Total</th>
   </tr>
     ';  
     foreach($stocks as $stock)
     {
      $output .= '
      <tr>
      <td style="border: 1px solid; padding:12px;">'.$stock->id.'</td>
       <td style="border: 1px solid; padding:12px;">'.$stock->name.'</td>
       <td style="border: 1px solid; padding:12px;">'.$stock->quantity.'</td>
       <td style="border: 1px solid; padding:12px;">'.$stock->price.'</td>
       <td style="border: 1px solid; padding:12px;">'.$stock->category.'</td>
       <td style="border: 1px solid; padding:12px;">'.$stock->supplier.'</td>
       <td style="border: 1px solid; padding:12px;">'.$stock->total.'</td>
      </tr>
      ';
     }
     $output .= '</table>';
     return $output;
    }
}

