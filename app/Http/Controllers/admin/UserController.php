<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct(private User $user)
    {
          
    }
    public function index()
    {
        $data = user::all();
        return view('admin.user.index', compact('data'));
    }

    public function edit(string $id)
    {
      
    }

    public function admin()
    { 
        $data = user::all()->sortByDesc("id");
        return view('admin.user.index', compact('data'));
        
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        
    }

    public function update(Request $request, string $id)
    {

    }

    public function destroy(string $id)
    {
         $this->user->find($id)->delete();
          return redirect()->route("admin.user");
    }

}
