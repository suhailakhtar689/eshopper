<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    // public function index(){
    //     return view('admin.home');
    // }
    
    public function admin()
    {
        return view('admin/home.index'); 
    }
}
