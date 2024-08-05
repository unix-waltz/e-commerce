<?php

namespace App\Http\Controllers;

use App\Models\ProductModel as Product;
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
    return view('Customers.ProductDetail',[
      'data' => $slug,
      'view' =>'detail',
    ]);
   }
}
