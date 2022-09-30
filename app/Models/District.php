<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Merelasikan tabel districs dengan tabel provinces
    public function province(){
    	return $this->belongsTo(Province::class,'province_id','id');
    }

    // Merelasikan tabel districs dengan tabel cities
    public function city(){
    	return $this->belongsTo(City::class,'city_id','id');
    }
}