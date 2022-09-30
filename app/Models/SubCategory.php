<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'category_id',
        'subcategory_name', 
        'subcategory_slug', 
    ];

    // Merelasikan tabel subcategory dengan tabel category
    // 1 kategori boleh memiliki lebih dari 1 subkategori, 1 subkategori hanya boleh dimiliki 1 kategori
    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}