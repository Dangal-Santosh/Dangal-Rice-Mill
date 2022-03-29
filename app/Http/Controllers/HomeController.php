<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Providers\SweetAlertServiceProvider;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    // User CRUD Operation
    public function indexx()
    {
        $users = User::where ('roles', 'user')->get();
        return view('admin.User.user', ['users'=>$users]);
    }

    public function createe(Request $request)
    {
        
        //User Validation
        $this->validate($request, [
            'id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'age' => 'required',
            'phone' => 'required',
            'password' => 'required',
        ]);

        Alert::success('Customer Added Successfully !!!', 'Customers');

        $user = new User;
        $user->name = $request->name;
		$user->email = $request->email;
        $user->roles='user';
        $user->password =bcrypt($request->password);
        $user->address =$request->address;
        $user->age =$request->age;
        $user->phone =$request->phone;
        $user->save();
        return redirect(route('indexx'));

        // $userids = $request ->user_id;
        // $user->products = $attach ->userids;
    }

    public function editt($id)
    {
        $user = User::find($id);
        return view('admin.User.edit', ['user'=>$user]);
    }

    public function updatee(Request $request, $id)
    {
        //User Validation
        $this->validate($request, [
            'id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'age' => 'required',
            'phone' => 'required',
            'password' => 'required',
        ]);

        Alert::success('Customer Details Updated Successfully !!!', 'Customers');
        $user = User::find($id);
        $user->name = $request->name;
		$user->email = $request->email;
        $user->roles='user';
        $user->password =bcrypt($request->password);
        $user->address =$request->address;
        $user->age =$request->age;
        $user->phone =$request->phone;
        $user->save();
        return redirect(route('indexx'));

        // $userids = $request ->user_id;
        // $user->products = $attach ->userids;

    }

    public function destroyy($id)
    {
        Alert::warning('Customer Deleted Successfully !!!', 'Customers');
        User::destroy($id);
        return redirect(route('indexx'));
    }
}
