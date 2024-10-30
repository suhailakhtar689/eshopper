<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Maincategory;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Testimonial;
use App\Models\Newsletter;
use App\Models\Contact;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(private Maincategory $maincategory,private Subcategory $subcategory,private Brand $brand,private Product $product,private Testimonial $testimonial,private Newsletter $newsletter,private Contact $contact)
    {
        
    }
    
    public function index()
    {
        $maincategory = $this->maincategory->where("active",true)->latest()->get();
        $subcategory = $this->subcategory->where("active",true)->latest()->get();
        $brand = $this->brand->where("active",true)->latest()->get();
        $allProducts = $this->product->where("active",true)->latest()->get();
        $products = $this->product->where("active",true)->latest()->limit(24)->get();
        $testimonial = $this->testimonial->where("active",true)->latest()->get();
        return view('index',compact('maincategory','subcategory','brand','products','allProducts','testimonial'));
    }
    
    public function about()
    {
        $testimonial = $this->testimonial->where("active",true)->latest()->get();
        return view('about', compact("testimonial"));
    }

    public function search(){
        if(isset($_GET['search'])){
        $search = $_GET['search'];
        $products = $this->product->where(function($q) use($search){
            $srcItem = $this->maincategory->where("name",$search)->first();
            if($srcItem)
                $q->where("maincategory_id",$srcItem->id);

                $srcItem = $this->subcategory->where("name",$search)->first();
                if($srcItem)
                    $q->where("subcategory_id",$srcItem->id);

                    $srcItem = $this->brand->where("name",$search)->first();
                    if($srcItem)
                        $q->where("brand_id",$srcItem->id);
       
                     })->get();
        $mc = "All";
        $sc = "All";
        $br = "All";
        $sort = "";
          $maincategory = $this->maincategory->where("active",true)->latest()->get();
          $subcategory = $this->subcategory->where("active",true)->latest()->get();
          $brand = $this->brand->where("active",true)->latest()->get();
          return view('shop', compact('products','maincategory','subcategory','brand','mc','sc','br','sort'));
        }
        else{
            return redirect()->route("index");            
        }
    }


    public function shop()
    {   
      isset($_GET['mc']) ? ($mc = $_GET['mc']) : ($mc = "All");
      isset($_GET['sc']) ? ($sc = $_GET['sc']) : ($sc = "All");
      isset($_GET['br']) ? ($br = $_GET['br']) : ($br = "All");
      isset($_GET['sort']) ? ($sort= $_GET['sort']) : ($sort = "");
        $maincategory = $this->maincategory->where("active",true)->latest()->get();
        $subcategory = $this->subcategory->where("active",true)->latest()->get();
        $brand = $this->brand->where("active",true)->latest()->get();
        $products = $this->product->where(function($q) use($mc,$sc,$br,$sort){
            if($mc!=="All"){
                $item = $this->maincategory->where("name",$mc)->first();
                if($item){
                    $q->where("maincategory_id",$item->id);
                }
            }
            if($sc!=="All"){
                $item = $this->subcategory->where("name",$sc)->first();
                if($item){
                    $q->where("subcategory_id",$item->id);
                }
            }
            if($br!=="All"){
                $item = $this->brand->where("name",$br)->first();
                if($item){
                    $q->where("brand_id",$item->id);
                }
            }
            
        });
        if($sort == "1" || $sort == "")
            $products->orderBy("created_at", "desc");
        else if ($sort == "2")
            $products->orderBy('finalPrice', "asc");
       else
            $products->orderBy('finalPrice', "desc");
            $products = $products->get();
            return view('shop', compact('products','maincategory','subcategory','brand','mc','sc','br','sort'));
    }

  public function newsletter(Request $request){
        $request->validate([
       'email'=> "required|unique:newsletters"
  ]);

  $this->newsletter->create([
      'email'=>$request->email
  ]);
  return redirect()->route("confirmation-newsletter");
  }

    public function singleProduct($id){
        $data = $this->product->find($id);
        $relatedProducts = $this->product->where("maincategory_id",$data->maincategory_id)->get();
        return view("product",compact('data','relatedProducts'));
    }

    public function confirmationNewsletter()
    {
        return view('confirmation-newsletter');
    }

    public function contact()
    {
         $show = false;
        return view('contact',compact('show'));
    }
    
    
    public function contactStore(Request $request)
    {
        $request->validate([
         'name' =>'required',
         'email' =>'required',
         'phone' =>'required',
         'subject' =>'required',
         'message' =>'required',
        ]);
        $this->contact->create([
         'name' =>$request->name,
         'email' =>$request->email,
         'phone' =>$request->phone,
         'subject' =>$request->subject,
         'message' =>$request->message,
        ]);
        $show = true;
        return view('contact',compact('show'));

    }
}
