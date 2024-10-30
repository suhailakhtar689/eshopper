<?php

namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Models\TestimonialImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{

    public function __construct(private Testimonial $testimonial,private TestimonialImages $TestimonialImages)
    {
        
    }
    
    public function index()
    {
        $data = Testimonial::all();
        return view('admin.product.index', compact('data'));

        // $testimonialImages = testimonial::all();
        // return view('admin.testimonial.index', compact('testimonialImages'));    
    }

    public function edit(string $id)
    {
       $data = $this->testimonial->find($id);
       $testimonialImages = $data->testimonialImages;
       return view("admin.testimonial.edit", compact('data','testimonialImages')); 

    }


    public function admin()
    { 
        $data = testimonial::all()->sortByDesc("id");
        return view('admin.testimonial.index', compact('data'));
        
    }

    public function create()
    {
        return view('admin.testimonial.create');
    }

    public function store(Request $request)
    {
        $request->validate([
          'name' => 'required|min:3|max:50',
          'message' => 'required|min:10',
          'pic'=> 'required|mimes:jpeg,jpg,png|max:1024'

        ]);

        $name =[];
        foreach($request->file('pic') as $img){
           array_push($name, Storage::disk('public')->put('testimonial', $img));
        } 
        
        
       $pic = Storage::disk('public')->put('testimonials', $request->pic);
        $this->testimonial->create([
          'name'=> $request->name,
          'message'=>$request->message,
          'pic'=> $pic,
          'active'=> $request->active,
         ]);
 
         return redirect()->route("admin.testimonial");
    }


    
    public function update(Request $request, string $id)
    {
       $data = $this->testimonial->find($id);
       if($data->name!=$request->name){
          $request->validate([
            'name' => 'required|min:3|max:50',
            'message' => 'required|min:10',
             'pic'=> 'required|mimes:jpeg,jpg,png|max:1024'
             
          ]);
    }
        
        if($request->pic){
            Storage::disk("public")->delete("testimonials", $data->pic);
            $pic = Storage::disk('public')->put('testimonials', $request->pic);
        }
        else
        $pic = $data->pic;

          $data->update([
            'name'=> $request->name,
            'message'=>$request->message,
            'pic' => $pic,
            'active'=> $request->active 
           ]);
           return redirect()->route("admin.testimonial");

    }

    public function destroy(string $id)
    {
        $data = $this->testimonial->find($id);
        Storage::disk("public")->delete("testimonial", $data->pic);
        $data->delete();
       return redirect()->route("admin.testimonial");
    }

}
