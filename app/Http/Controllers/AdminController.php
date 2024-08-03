<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\ProductModel as Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function Index(){
        return view('Admin.Index',['products'=> Product::all()]);
    }
    function _Create(Request $r){
$v = $r->validate([
    "product_name"=>"string|required|min:5",
    "product_price"=>"integer|required",
    "product_quantity"=>"integer|required",
    "product_category"=>"string|required",
    "product_description"=>"string|required"
]);
if($r->file('product_img')) $v['product_img'] = $r->file('product_img')->store('product-img');
$v['slug'] = (string) Str::uuid();
Product::create($v);
return redirect()->back()->with(['success'=>'success add product','msg'=>'your new product has been added!']);
    }
}
