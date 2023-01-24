<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{

    public function colorCreate()
    {
      return view('backend.home.admin.color.create');
    }

    public function colorStore(Request $request)
    {
       $this->validate($request, [
           'name' => 'required|string',
           'status' => 'required',
       ]);

       $color = new Color();
       $color->name = $request->name;
       $color->status = $request->status;
       $color->save();
       return redirect()->back()->with('success', 'Color has been Create');
    }

    public function colorManage()
    {
      $colors = Color::paginate(5);
      return view('backend.home.admin.color.list', compact('colors'));
    }

    public function colorUpdate(Request $request, $id)
    {
       $this->validate($request, [
          'name' => 'required|string',
          'status' => 'required',
       ]);

       $color = Color::find($id);
       $color->name = $request->name;
       $color->status = $request->status;
       $color->save();
       return redirect()->back()->with('success', 'Color has been Update');
    }

    public function colorDelete($id)
    {
      $color = Color::find($id);
      $color->delete();

       return redirect()->back()->with('success', 'Color has been deleted');
    }

    public function colorEdit($id)
    {
       $color = Color::find($id);
       return view('backend.home.admin.color.edit', compact('color'));
    }

}
