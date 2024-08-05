<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $guarded = ['id'];
    use HasFactory;
    public function productCarts(){
        return $this->hasMany(CartModel::class,'productid','id');
    }
}
