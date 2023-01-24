<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
  public function addToCart(Request $request)
  {
    $addToCart = new Cart();
    $addToCart->user_id = auth()->user()->id;
    $addToCart->vendor_id = $request->vendor_id;
    $addToCart->product_id = $request->product_id;
    $addToCart->price = $request->price;
    $addToCart->qty = 1;
    $addToCart->total_price = 1*$request->price;
    $addToCart->save();
    return redirect()->back()->withSuccess('Product has been added to Cart');

  }
}
