<?php

namespace App\Http\Controllers;

use App\Models\CartModel as Cart;
use App\Models\ProductModel as Product;
use App\Models\WishlistModel as Wishlist;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
  function Index(Request $r){
    $search = '';
    $param ='';
    $product = Product::where('status','active')->where('product_quantity', '>=', 1)->paginate(8);
     $_param = $r->query();
     if(isset($_param['sortby'])){
       switch($_param['sortby']){
        case 'asc':
          $product = Product::where('status','active')->where('product_quantity', '>=', 1)->orderBy('created_at', 'asc')
          ->paginate(8);
          break;
          case 'desc':
            $product = Product::where('status','active')->where('product_quantity', '>=', 1)->orderBy('created_at', 'desc')
          ->paginate(8);
            break;
            case 'pricedesc':
              $product = Product::where('status','active')->where('product_quantity', '>=', 1)->orderBy('product_price', 'desc')
              ->paginate(8);
              break;
              case 'priceasc':
                $product = Product::where('status','active')->where('product_quantity', '>=', 1)->orderBy('product_price', 'asc')
              ->paginate(8);
                break;
       }
      }
       if(isset($_param['from']) && isset($_param['to'])){
        $product = Product::where('status', 'active')
        ->where('product_quantity', '>=', 1)
        ->whereBetween('product_price', [(integer)$_param['from'], (integer)$_param['to']])
        ->orderBy('created_at', 'desc')
        ->paginate(8);
        }
        if(isset($_param['search'])){
          $product = Product::where('status', 'active')
          ->where('product_quantity', '>=', 1)
          ->where('product_name', 'like', '%' . $_param['search'] . '%')
          ->orWhere('product_category', 'like', '%' . $_param['search'] . '%')
          ->orWhere('product_description', 'like', '%' . $_param['search'] . '%')
          ->orderBy('created_at', 'desc')
          ->paginate(8);
          $search = $_param['search'];
          }
    return view('Customers.Index',[
      'products' => $product,
      'param'=>$param,
      'search'=>$search,
      'view' => 'index'
    ]);
   }
   function detail(Product $slug){
    $userId = Auth()->user()->id;
    $productId = $slug->id;
    $cart = Cart::where('status', 'pending')
                ->where('userid', $userId)
                ->where('productid', $productId)
                ->first();
    $availible_cart = $cart ? false : true;
    $wishlist = Wishlist::where('userid', $userId)
                        ->where('productid', $productId)
                        ->first();
    $availible_wishlist = $wishlist ? false : true;
    return view('Customers.ProductDetail',[
      'data' => $slug,
      'availible_cart' => $availible_cart,
      'availible_wishlist' => $availible_wishlist,
      'view' =>'detail',
    ]);
   }
   public function cart() {
    $cart_pending = Cart::where('status', 'pending')
        ->where('userid', Auth()->user()->id)
        ->get();
        // @dd($cart_pending);

    $totalQuantity = $cart_pending->sum('quantity');
    $totalTypes = $cart_pending->count();
    $totalPrice = $cart_pending->sum(function($cart) {
        return $cart->quantity * $cart->cartProduct->product_price;
    });

    return view('Customers.Cart', [
        'view' => 'Cart',
        'c_pending' => $cart_pending,
        'totalQuantity' => $totalQuantity,
        'totalTypes' => $totalTypes,
       'totalPrice' => $totalPrice
    ]);
}

   function _cart(Request $r){
    $cart = Cart::where('status', 'pending')
                ->where('userid', Auth()->user()->id)
                ->where('productid', $r->productid)
                ->first();
    if($cart){
      return redirect()->back()->with(['failed'=>'failed add product to cart','msg'=>'your product exist in the cart!']);
    }
    $v = $r->validate([
      'userid' => 'required',
      'productid' => 'required',
    ]);
    Cart::create($v);
    return redirect()->back()->with(['success'=>'success add product to cart','msg'=>'your product has been added!']);
   }
   function wishlist(){
  
    return view('Customers.Wishlist',[
      'view' =>'Cart',
    ]);
   }
   function _wishlist(Request $r){
    $cart = Cart::where('status', 'pending')
                ->where('userid', Auth()->user()->id)
                ->where('productid', $r->productid)
                ->first();
    if($cart){
      return redirect()->back()->with(['failed'=>'failed add product to cart','msg'=>'your product exist in the cart!']);
    }
    $v = $r->validate([
      'userid' => 'required',
      'productid' => 'required',
    ]);
    Cart::create($v);
    return redirect()->back()->with(['success'=>'success add product to cart','msg'=>'your product has been added!']);
   }
   public function cart_update_quantity(Request $request) {
    $cart = Cart::find((int) $request->cartid);

    if ($request->type == 'increment') {
        $cart->quantity++;
    } elseif ($request->type == 'decrement' && $cart->quantity > 1) {
        $cart->quantity--;
    }

    $cart->save();
    return redirect()->back();
}
public function cart_update_remove(Request $request) {
  $cart = Cart::find((int) $request->cartid);
  $cart->delete();
  return redirect()->back();
}

}
