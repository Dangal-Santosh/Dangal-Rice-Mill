<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Providers\SweetAlertServiceProvider;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Payment;
use DB;
use PDF;

class UserPdfController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }

    public function get_users_data()
    {

        $users = DB::table('users')
        ->orderby('id','desc')
        ->limit(20)
        ->get();
        return $users;
    }
    public function pdf()
    {
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($this->convert_users_data_to_html());
    return $pdf->stream();
    }
    public function convert_users_data_to_html()
    {
    $users = $this->get_users_data();
    $output = '
    <h3 align="center">Users Data</h3>
    <table width="100%" style="border-collapse: collapse; border: 0px;">
    <tr>
    <th style="border: 1px solid; padding:12px;" width="20%">User ID</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Name</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Email</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Address</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Age</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Phone</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Date</th>
   </tr>
     ';  
     foreach($users as $user)
     {
      $output .= '
      <tr>
      <td style="border: 1px solid; padding:12px;">'.$user->id.'</td>
       <td style="border: 1px solid; padding:12px;">'.$user->name.'</td>
       <td style="border: 1px solid; padding:12px;">'.$user->email.'</td>
       <td style="border: 1px solid; padding:12px;">'.$user->address.'</td>
       <td style="border: 1px solid; padding:12px;">'.$user->age.'</td>
       <td style="border: 1px solid; padding:12px;">'.$user->phone.'</td>
       <td style="border: 1px solid; padding:12px;">'.$user->created_at.'</td>
      </tr>
      ';

     }
     $output .= '</table>';
     return $output;
    }
}
