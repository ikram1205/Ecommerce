<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    public function brandCreate()
    {

        $brands = Category::get();
        return view('backend.home.admin.brand.create', compact('brands'));
    }


    public function brandManage()
    {
        $brands = Brand::with('Category')->paginate(15);
        return view('backend.home.admin.brand.list', compact('brands'));
    }

    public function brandStore(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required|integer',
            'name' => 'required|string',
        ]);

        $brand = new Brand();
        $brand->category_id = $request->category_id;
        $brand->name = $request->name;
        $brand->slug =str_replace(' ', '-', strtolower($request->name));
        $brand->save();
        return redirect()->back()->with('success', 'Brand has been Created');
    }

    public function brandUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'category_id' => 'required|integer',
            'name' => 'required|string',
        ]);

        $brand = Brand::find($id);
        $brand->category_id = $request->category_id;
        $brand->name = $request->name;
        $brand->slug =str_replace(' ', '-', strtolower($request->name));
        $brand->save();
        return redirect()->back()->with('success', 'Brand has been Updated');
    }

    public function brandDeleted($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect()->back()->with('success', 'Brand has been Deleted');
    }

    public function brandEdit($id)
    {
        $categories = Category::get();
        $brand = Brand::find($id);
        return view('backend.home.admin.brand.edit', compact('brand', 'categories'));
    }

}
