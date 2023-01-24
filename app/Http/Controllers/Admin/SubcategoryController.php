<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function subcategoryCreate()
    {

        $categories = Category::get();
        return view('backend.home.admin.subcategory.create', compact('categories'));
    }

    public function subcategoryManage()
    {
        $subcategories = SubCategory::with('Category')->paginate(15);
        return view('backend.home.admin.subcategory.list', compact('subcategories'));
    }

    public function subcategoryStore(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required|integer',
            'name' => 'required|string',
        ]);

        $subcategory = new SubCategory();
        $subcategory->category_id = $request->category_id;
        $subcategory->name = $request->name;
        $subcategory->slug =str_replace(' ', '-', strtolower($request->name));
        $subcategory->save();
        return redirect()->back()->with('success', 'Subcategory has been Created');
    }

    public function subcategoryUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'category_id' => 'required|string',
            'name' => 'required|string'
        ]);

        $subcategory = SubCategory::find($id);
        $subcategory->category_id = $request->category_id;
        $subcategory->name = $request->name;
        $subcategory->slug = str_replace(' ', '-', strtolower($request->name));
        $subcategory->save();
        return redirect()->back()->with('success', 'Subcategory has been Update');
    }

   public function subcategoryDelete($id)
   {
      $subcategory = SubCategory::find($id);
      $subcategory->delete();
      return redirect()->back()->with('success', 'Subcategory has been Deleted');
   }

   public function subcategoryEdit($id)
   {
     $subcategory = SubCategory::find($id);
     return view('backend.home.admin.subcategory.edit', compact('subcategory'));
   }
}
