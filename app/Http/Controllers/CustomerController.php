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
    // midtrans
    \Midtrans\Config::$serverKey = config('midtrans.serverKey');
    \Midtrans\Config::$isProduction = false;
    \Midtrans\Config::$isSanitized = true;
    \Midtrans\Config::$is3ds = true;
    
    $params = [
      'transaction_details' => [
          'order_id' => rand(),
          'gross_amount' => (int)$totalPrice,
      ],
      'customer_detail' => [
        "name" => Auth()->user()->name,
        "email" => Auth()->user()->email,
      ]
      ];
    
    $snapToken = \Midtrans\Snap::getSnapToken($params);
    return view('Customers.Cart', [
        'view' => 'Cart',
        'c_pending' => $cart_pending,
        'totalQuantity' => $totalQuantity,
        'totalTypes' => $totalTypes,
       'totalPrice' => $totalPrice,
       'snapToken' => $snapToken,
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
// public function checkout(Request $r){
// logic

// midtrans
// \Midtrans\Config::$serverKey = config('midtrans.serverKey');
// \Midtrans\Config::$isProduction = false;
// \Midtrans\Config::$isSanitized = true;
// \Midtrans\Config::$is3ds = true;

// $params = [
//   'transaction_details' => [
//       'order_id' => rand(),
//       'gross_amount' => (int)$r->total_price,
//   ],
//   'customer_detail' => [
//     "name" => Auth()->user()->name,
//     "email" => Auth()->user()->email,
//   ]
//   ];

// $snapToken = \Midtrans\Snap::getSnapToken($params);
// }
function _checkout($status){
  if($status == 'success'){
    $cart = Cart::where('status', 'pending')
    ->where('userid', Auth()->user()->id)->get();
    foreach ($cart as $cartItem) {
      $cartItem->status ='success';
      $cartItem->save();
      $product = Product::find($cartItem->productid);
      if ($product) {
          $product->product_quantity -= $cartItem->quantity;
          $product->save();
      }
  }
    return redirect('/invoice')->with(['success'=>'success checkout product','msg'=>'your product checkout is successfully!']);
  }
  if($status == 'failed'){

    $cart = Cart::where('status', 'pending')
    ->where('userid', Auth()->user()->id)->get();
    foreach ($cart as $cartItem) {
      $cart->status ='failed';
      $cart->save();
      // $product = Product::find($cartItem->productid);
      // if ($product) {
      //     $product->product_quantity -= $cartItem->quantity;
      //     $product->save();
      // }
  }

    return redirect('/invoice')->with(['failed'=>'failed checkout product','msg'=>'your product checkout is failed!']);
  }
}
public function invoice(){
  $cart = Cart::where('status', '!=', 'pending')
    ->where('userid', Auth()->user()->id)->get();

  return view('Customers.Invoice',['view' => 'invoice',"cart" => $cart]);
}
}
