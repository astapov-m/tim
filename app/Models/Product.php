<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['code','name','description','image','category_id','price','status','cardPDF','visible'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

}
