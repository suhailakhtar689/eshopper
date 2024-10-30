<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage; 

use App\Models\Product;
use App\Models\ProductImages;
use App\Models\Maincategory;
use App\Models\Subcategory;
use App\Models\Brand;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(private Product $Product, private ProductImages $ProductImages, private Maincategory $maincategory, private subcategory $Subcategory, private Brand $brand)
    {
      $this->subcategory = $Subcategory;

    }
    public function index()
    {
        $data = Product::all();
        return view('admin.product.index', compact('data'));
    }

    public function edit(string $id)
    {
      $maincategory = $this->maincategory->where("active", true)->latest()->get();
      $subcategory = $this->subcategory->where("active", true)->latest()->get();
      $brand = $this->brand->where("active", true)->latest()->get();
      $data = $this->Product->find($id);
       
      $ProductImages = $data->productImages;
      return view('admin.product.edit', compact('data','maincategory','subcategory','brand','ProductImages'));
    }

    public function admin()
    { 
        $data = Product::all()->sortByDesc("id");
        return view('admin.product.index', compact('data'));
        
    }

    public function create()
    {
      $maincategory = $this->maincategory->where("active", true)->latest()->get();
      $subcategory = $this->subcategory->where("active", true)->latest()->get();
      $brand = $this->brand->where("active", true)->latest()->get();
        return view('admin.product.create', compact('maincategory','subcategory','brand'));
    }

    public function store(Request $request)
    {

      // dd($request->all());
        $request->validate([
          'name' => 'required|min:3|max:50',
          'color' => 'required|min:3|max:30',
          'size' => 'required|max:10',
          'basePrice' => 'required|numeric|min:1',
          'discount' => 'required|numeric|min:0|max:100',
          'Stock_Quantity' => 'required|numeric|min:0',
          'pic' => 'required',
          'pic.*' => 'image|required|mimes:jpeg,jpg,png|max:1024'
        ]);

        $name =[];
        foreach($request->file('pic') as $img){
           array_push($name, Storage::disk('public')->put('products', $img));
        } 
        
      $data = $this->Product->create([
          'name'=> $request->name,
          'maincategory_id'=> $request->maincategory_id,
          'subcategory_id'=> $request->subcategory_id,
          'brand_id'=> $request->brand_id,
          'color'=> $request->color,
          'size'=> $request->size,
          'basePrice'=> $request->basePrice,
          'discount'=>$request->discount, 
          'finalPrice'=>intval($request->basePrice - $request->basePrice * $request->discount / 100), 
          'stock'=>$request->stock,
          'StockQuantity'=>$request->Stock_Quantity, 
          'description'=>$request->description, 
          'active' => $request->active
         ]);
         foreach($name as $item){
           $this->ProductImages->create([
               'name' => $item,
              'product_id' =>$data->id
           ]);
         }
         return redirect()->route("admin.product");
    }

    public function update(Request $request, string $id)
    {    

      $data = $this->Product->find($id);
      $name =[];
      if($request->file('pic') != null){
       
        foreach ($request->file('pic') as $img) {
          array_push($name, Storage::disk('public')->put('products', $img));      
        }
      }
     


    $data->update([
        'name'=> $request->name,
        'maincategory_id'=> $request->maincategory_id,
        'subcategory_id'=> $request->subcategory_id,
        'brand_id'=> $request->brand_id,
        'color'=> $request->color,
        'size'=> $request->size,
        'basePrice'=> $request->basePrice,
        'discount'=>$request->discount, 
        'finalPrice'=>intval($request->basePrice - $request->basePrice * $request->discount / 100), 
        'stock'=>$request->stock,
        'StockQuantity'=>$request->Stock_Quantity, 
        'description'=>$request->description, 
        'active' => $request->active
       ]);

        $ProductImages = $data->productImages;
        foreach ($ProductImages as $key => $value) {
          if(!isset($request[$key])){
            // dd($ProductImages,$key);
            Storage::disk("public")->delete("products", $value->name);
            $this->ProductImages->find($value->id)->delete();
          }
        }
        if($name){
          foreach($name as $item){
            $this->ProductImages->create([
                'name' => $item,
               'product_id' =>$data->id
            ]);
          }
        }

        
        
          // $this->Product->find($id)->update([
          //   'name'=> $request->name,
          //   'active'=>$request->active 
          //  ]);
           
           return redirect()->route("admin.product");

    }

    public function destroy(string $id)
    {
        $data = $this->Product->find($id);
        $images = $this->ProductImages->where("product_id",$data->id);
          foreach ($images as $img) {
        Storage::disk("public")->delete("products",$img->name);
        $this->ProductImages->find($img->id)->delete();
          }
          $data->delete();
         return redirect()->route("admin.product");
    }
    public function stockQuantity() {
      $stockQuantity = Product::all();
      return view('product', ['stockQuantity' => $stockQuantity]);
  }
  
}
