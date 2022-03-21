<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Providers\SweetAlertServiceProvider;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;

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
    public function managestaff() {
        return view('admin.managestaff');
    }

    public function manageuser (){
        return view('staff.manageuser');
    }

    


// crud for Managing Staffs
    public function iindex()
    {
        $staffs = User::where ('roles', 'Staff')->get();
        return view('admin.Staff.staff', ['staffs'=>$staffs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ccreate(Request $request)
    {
        Alert::success('Staff Added Successfully !!!', 'Staffs');
        $staff = new User;
        $staff->name = $request->name;
		$staff->email = $request->email;
        $staff->roles='Staff';
        $staff->password =bcrypt($request->password);
        $staff->save();
        return back()->with('status', 'Staff Added !!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eedit($id)
    {
        $staff = User::find($id);
        return view('admin.Staff.edit', ['staff'=>$staff]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function uupdate(Request $request, $id)
    {
        Alert::success('Staff Details Updated Successfully !!!', 'Staffs');
        $staff = User::find($id);
        $staff->name = $request->name;
		$staff->email = $request->email;
        $staff->password =$request->password;
        $staff->save();
        return redirect(route('iindex'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ddestroy($id)
    {
        Alert::warning('Staff Deleted Successfully !!!', 'Staffs');
        User::destroy($id);
        return redirect(route('iindex'));
    }


    // User CRUD Operation
    public function indexx()
    {
        $users = User::where ('roles', 'user')->get();
        return view('staff.User.user', ['users'=>$users]);
    }

    public function createe(Request $request)
    {
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
        return view('staff.User.edit', ['user'=>$user]);
    }

    public function updatee(Request $request, $id)
    {
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
