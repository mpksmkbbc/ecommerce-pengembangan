<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Merelasikan tabel cities dengan tabel provinces
    // 1 provinsi boleh memiliki lebih dari 1 kota, 1 kota hanya boleh dimiliki 1 provinsi
    public function province(){
    	return $this->belongsTo(Province::class,'province_id','id');
    }
}