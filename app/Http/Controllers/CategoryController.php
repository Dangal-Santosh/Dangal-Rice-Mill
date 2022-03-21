<?php

namespace App\Http\Controllers;
Use App\Providers\SweetAlertServiceProvider;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }
    
    // Product CRUD Operation
    public function categoriesindex()
    {
        $categories = Category::all();
        return view('admin.Category.category', ['categories'=>$categories]);
    }
    public function categoriescreate(Request $request)
    {
        Alert::success('Admin Added Category Successfully !!!', 'CategoryPage');
        $category = new Category;
        $category->name = $request->name;
        $category->save();
        return redirect(route('categoriesindex'));

        
        
    }
    
    public function categoriesedit($id)
    {
        $category = Category::find($id);
        return view('admin.Category.edit', ['category'=>$category]);
    }

    public function categoriesupdate(Request $request, $id)
    {
        Alert::success('Admin Updated Category Successfully !!!', 'CategoryPage');
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        return redirect(route('categoriesindex'));
    }

    public function categoriesdestroy($id)
    {
        Alert::warning('Admin Deleted Category Successfully !!!', 'CategoryPage');
        Category::destroy($id);
        return redirect(route('categoriesindex'));
    }
}
