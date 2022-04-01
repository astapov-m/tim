<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    protected $fillable = ['code','name','description','image','category_image_id','visible'];

    use HasFactory;
}
