<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartModel extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'cart';
    public function cartProduct(){
        return $this->belongsTo(ProductModel::class,'productid');
    }
    public function cartUser(){
        return $this->belongsTo(User::class,'userid');
    }
}
