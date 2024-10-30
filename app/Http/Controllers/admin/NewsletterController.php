<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{

    public function __construct(private Newsletter $newsletter)
    {
          
    }
    public function index()
    {
        $data = newsletter::all();
        return view('admin.newsletter.index', compact('data'));
    }

    public function edit(string $id)
    {
       $data = $this->newsletter->find($id);
       $data->update([
          'active' =>!$data->active
       ]);
       return redirect()->route("admin.newsletter");
    }

    public function admin()
    { 
        $data = newsletter::all()->sortByDesc("id");
        return view('admin.newsletter.index', compact('data'));
        
    }

    public function create()
    {
        return view('admin.newsletter.create');
    }

    public function store(Request $request)
    {
        
    }


    
    public function update(Request $request, string $id)
    {

    }

    public function destroy(string $id)
    {
         $this->newsletter->find($id)->delete();
          return redirect()->route("admin.newsletter");
    }

}
