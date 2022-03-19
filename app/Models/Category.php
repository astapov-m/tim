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
    public function parent(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function getParents(){
        $parents = collect([]);

        $parent = $this->parent;

        while(!is_null($parent)){
            $parents->push($parent);
            $parent = $parent->parent;
        }
        return $parents->reverse();
    }
}
