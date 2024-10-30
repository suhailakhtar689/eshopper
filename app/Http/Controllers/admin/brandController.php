<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{

    public function __construct(private Brand $brand)
    {
          
    }
    public function index()
    {
        $data = brand::all();
        return view('admin.brand.index', compact('data'));
    }

    public function edit(string $id)
    {
       $data = $this->brand->find($id);
       return view("admin.brand.edit", compact('data'));
    }

    public function admin()
    { 
        $data = brand::all()->sortByDesc("id");
        return view('admin.brand.index', compact('data'));
        
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(Request $request)
    {
        $request->validate([
          'name' => 'required|unique:brands|min:3|max:50',
          'pic'=> 'required|mimes:jpeg,jpg,png|max:1024'
        ]);
        
       $pic = Storage::disk('public')->put('brands', $request->pic);
        $this->brand->create([
          'name'=> $request->name,
          'pic'=> $pic,
          'active'=> $request->active,
         ]);
         return redirect()->route("admin.brand");
    }


    
    public function update(Request $request, string $id)
    {
       $data = $this->brand->find($id);
       if($data->name!=$request->name){
        if($request->pic){
          $request->validate([
            'name' => 'required|unique:brands|min:3|max:50',
             'pic'=> 'required|mimes:jpeg,jpg,png|max:1024'
          ]);
        }
        else
          $request->validate([
            'name' => 'required|unique:brands|min:3|max:50',
          ]); 
    }
        
        if($request->pic){
            Storage::disk("public")->delete("brands", $data->pic);
            $pic = Storage::disk('public')->put('brands', $request->pic);
        }
        else
        $pic = $data->pic;

          $data->update([
            'name'=> $request->name,
            'pic' => $pic,
            'active'=> $request->active 
           ]);
           return redirect()->route("admin.brand");

    }

    public function destroy(string $id)
    {
        $data = $this->brand->find($id);
        Storage::disk("public")->delete("brands", $data->pic);
        $data->delete();
       return redirect()->route("admin.brand");
    }

}
