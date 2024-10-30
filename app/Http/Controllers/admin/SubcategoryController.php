<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{

    public function __construct(private Subcategory $Subcategory)
    {
         
    }
    public function index()
    {
        $data = Subcategory::all();
        return view('admin.subcategory.index', compact('data'));
    }

    public function edit(string $id)
    {
       $data = $this->Subcategory->find($id);
       return view("admin.subcategory.edit", compact('data'));
    }

    public function admin()
    { 
        $data = Subcategory::all()->sortByDesc("id");
        return view('admin.subcategory.index', compact('data'));
        
    }

    public function create()
    {
        return view('admin.subcategory.create');
    }

    public function store(Request $request)
    {
        $request->validate([
          'name' => 'required|unique:Subcategories|min:3|max:50'
        ]);
        $this->Subcategory->create([
          'name'=> $request->name,
          'active'=>$request->active 
         ]);
         return redirect()->route("admin.subcategory");
    }

    public function update(Request $request, string $id)
    {
       $data = $this->Subcategory->find($id);
       if($data->name!=$request->name){
        $request->validate([
            'name' => 'required|unique:subcategories|min:3|max:50'
          ]);
        }
          $this->Subcategory->find($id)->update([
            'name'=> $request->name,
            'active'=>$request->active 
           ]);
           return redirect()->route("admin.subcategory");

    }

    public function destroy(string $id)
    {
        $Subcategory = $this->Subcategory->find($id)->delete();
       return redirect()->route("admin.subcategory");
    }

}
