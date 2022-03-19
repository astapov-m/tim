<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['code','name','description','image','category_id','visible'];

    public function products(){
        return $this->hasMany(Product::class);
    }
    public function categories(){
        return $this->hasMany(Category::class);
    }
    public function childrenCategories(){
        return $this->hasMany(Category::class)->with('categories');
    }
}
