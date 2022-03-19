<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function allProducts(){
        $products = Product::get();
        return view('allProducts',compact('products'));
    }

    public function index(){
        $events = Event::get();
        return view('index',compact('events'));
    }

    public function product($category,$productCode){
        $product = Product::where('code',$productCode)->first();
        return view('product',compact('product'));
    }
    public function categories(){
        $categories = Category::whereNull('category_id')->get();
        return view('categories',compact('categories'));
    }
    public function category($code){
        $category = Category::where('code',$code)->first();
        return view('category',compact('category'));
    }
    public function categoriesCard($id){
        $categories = Category::where('category_id',$id)->get();
        if($categories->count()){
            return view('layouts.cardCategories',compact('categories'));
        }else{
            $cat = Category::where('id',$id)->first();
            return view('layouts.cardCategories',compact('cat'));
        }

    }
    public function categoriesCardById($id){
        $categories = Category::where('id',$id)->get();
        return view('layouts.cardCategories',compact('categories'));
    }
}
