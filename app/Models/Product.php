<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Merelasikan tabel products dengan tabel brands
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id','id');
    }
    
    // Merelasikan tabel products dengan tabel categories
    public function category(){
    	return $this->belongsTo(Category::class,'category_id','id');
    }
}