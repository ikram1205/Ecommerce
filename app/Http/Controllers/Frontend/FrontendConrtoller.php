<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendConrtoller extends Controller
{
    public function index()
    {
        $new_products = Product::with('category', 'color', 'size')->where('type', 'new')->where('status', 1)->get();
        $hot_products = Product::with('category', 'color', 'size')->where('type', 'hot')->where('status', 1)->get();
        $discount_products = Product::with('category', 'color', 'size')->where('type', 'discount')->where('status', 1)->get();
        return view('frontend.home.index', compact('new_products', 'hot_products', 'discount_products'));
    }

   // User Authentication

   public function userLogin()
   {
     return view('frontend.user.auth1');
   }

   public function userRegister()
   {
    return view('frontend.user.auth');
   }
}
