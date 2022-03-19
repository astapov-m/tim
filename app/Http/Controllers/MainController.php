<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
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
    public function category($code,$id){
        $categories = Category::where('category_id',$id)->get();
        $categoryList = Category::where('id',$id)->first();
        if($categories->count()){
            return view('category',compact('categories','categoryList'));
        }else{
            $cat = Category::where('id',$id)->first();
            return view('category',compact('cat','categoryList'));
        }
    }
}
