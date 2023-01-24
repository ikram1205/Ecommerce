<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
     public function vendors()
     {
        $vendors = Vendor::orderBy('created_at', 'desc')->get();
        return view('backend.home.admin.supplier.list', compact('vendors'));
     }

     public function vendorApproved($id)
     {
        $vendor = Vendor::find($id);
        $vendor->is_approved = 1;
        $vendor->save();
        return redirect()->back()->with('success', 'Vendor has been Approved');
     }

     public function vendorPending($id)
     {
        $vendor = Vendor::find($id);
        $vendor->is_approved = 0;
        $vendor->save();
        return redirect()->back()->with('success', 'Vendor has been Pending');
     }

     public function vendorDelete($id)
     {
        $vendor = Vendor::find($id);
        $vendor->delete();
        return redirect()->back()->with('success', 'Vendor has been Deleted');
     }

     public function vendorProducts()
     {
        $products = Product::with('category', 'color', 'size')->get();
        return view('backend.home.admin.supplier.products', compact('products'));
     }

     public function vendorProductApproved($id)
     {
        $product = Product::find($id);
        $product->status = 1;
        $product->save();
        return redirect()->back()->withSuccess('Product has been Approved');
     }

     public function vendorProductPending($id)
     {
        $product =Product::find($id);
        $product->status = 0;
        $product->save();
        return redirect()->back()->withSuccess('Product has been Pending');
     }

     public function vendorProductDelete($id)
     {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->withSuccess('Product has been Deleted');
     }
}
