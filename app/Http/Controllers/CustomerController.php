<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
   function Index(){
    return view('Customers.Index');
   }
}
