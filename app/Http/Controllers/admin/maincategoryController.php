<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Maincategory;
use Illuminate\Http\Request;

class MaincategoryController extends Controller
{

    public function __construct(private Maincategory $maincategory)
    {
         
    }
    public function index()
    {
        $data = MainCategory::all();
        return view('admin.maincategory.index', compact('data'));
    }

    public function edit(string $id)
    {
       $data = $this->maincategory->find($id);
       return view("admin.maincategory.edit", compact('data'));
    }

    public function admin()
    { 
        $data = MainCategory::all()->sortByDesc("id");
        return view('admin.maincategory.index', compact('data'));
        
    }

    public function create()
    {
        return view('admin.maincategory.create');
    }

    public function store(Request $request)
    {
        $request->validate([
          'name' => 'required|unique:maincategories|min:3|max:50'
        ]);
        $this->maincategory->create([
          'name'=> $request->name,
          'active'=>$request->active 
         ]);
         return redirect()->route("admin.maincategory");
    }

    public function update(Request $request, string $id)
    {
       $data = $this->maincategory->find($id);
       if($data->name!=$request->name){
        $request->validate([
            'name' => 'required|unique:maincategories|min:3|max:50'
          ]);
        }
          $this->maincategory->find($id)->update([
            'name'=> $request->name,
            'active'=>$request->active 
           ]);
           return redirect()->route("admin.maincategory");

    }

    public function destroy(string $id)
    {
        $maincategory = $this->maincategory->find($id)->delete();
       return redirect()->route("admin.maincategory");
    }

}
