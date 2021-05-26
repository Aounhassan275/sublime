<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','amount','model_id','brand_id'
    ];
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }  
    public function model(){
        return $this->belongsTo(Category::class,'model_id');
    }  
}
