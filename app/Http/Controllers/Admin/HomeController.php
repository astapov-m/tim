<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }
    public function car(){
        $categories = Category::whereNull('category_id')->get();
        return view('auth.categories.layouts.car',compact('categories'));
    }
    public function helpCar($parent_id){
        $categories = Category::where('category_id',$parent_id)->get();
        return view('auth.categories.layouts.helpCar',compact('categories'));
    }
    public function helpCarProduct($parent_id){
        $categories = Category::where('category_id',$parent_id)->get();
        return view('auth.products.layouts.helpCar',compact('categories'));
    }
}
