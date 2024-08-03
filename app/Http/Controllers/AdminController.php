<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\ProductModel as Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    function Index(){
        return view('Admin.Index',['products'=> Product::paginate(8)]);
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
    function ProductDetail(Product $slug){
return view('Admin.ProductDetail',compact('slug'));
    }
    function _productedit(Request $r){
        $product = Product::where('slug', $r->slug)->firstOrFail();
        $v = $r->validate([
            "product_name"=>"string|required|min:5",
            "product_price"=>"integer|required",
            "product_quantity"=>"integer|required",
            "product_category"=>"string|required",
            "product_description"=>"string|required"
        ]);
      if($r->file('product_img')){
            if ($product->product_img && Storage::exists($product->product_img)) {
                Storage::delete($product->product_img);
            }
            $product->product_img = $r->file('product_img')->store('product-img');
        } else {
            $product->product_img = $r->old_img;
        }
        $v['slug'] = $r->slug;
        $product->update($v);
        return redirect()->back()->with(['success'=>'success Edit product','msg'=>'your product has been Updated!']);
    }
    function ProductDelete(Product $slug){
        if(Storage::exists($slug->product_img)) Storage::delete($slug->product_img);
$slug->delete();
return redirect('/admin')->with(['success'=>'success Delete product','msg'=>'your product has been Removed!']);
    }
    function StatusUpdate($status, $slug){
        // @dd($status == 'active' ? 'nonactive' : 'active');
$product = Product::where('slug',$slug)->firstOrFail();
$product->status =  $status == 'active' ? 'nonactive' : 'active';
$product->save();
return redirect()->back()->with(['success'=>'success change product status','msg'=>'your status has been changes!']);
    }
}
