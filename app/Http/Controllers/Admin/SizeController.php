<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SizeController extends Controller
{
  public function sizeCreate()
  {
    return view('backend.home.admin.size.create');
  }

  public function sizeStore(Request $request)
  {
     $this->validate($request, [
         'name' => 'required|string',
         'status' => 'required',
     ]);

     $size = new Size();
     $size->name = $request->name;
     $size->status = $request->status;
     $size->save();
     return redirect()->back()->with('success', 'Size has been Create');
  }

  public function sizeManage()
  {
    $sizes = Size::paginate(5);
    return view('backend.home.admin.size.list', compact('sizes'));
  }

  public function sizeUpdate(Request $request, $id)
  {
     $this->validate($request, [
        'name' => 'required|string',
        'status' => 'required',
     ]);

     $size = Size::find($id);
     $size->name = $request->name;
     $size->status = $request->status;
     $size->save();
     return redirect()->back()->with('success', 'Size has been Update');
  }

  public function sizeDelete($id)
  {
    $size = Size::find($id);
    $size->delete();

     return redirect()->back()->with('success', 'Size has been deleted');
  }

  public function sizeEdit($id)
  {
     $size = Size::find($id);
     return view('backend.home.admin.size.edit', compact('size'));
  }
}
