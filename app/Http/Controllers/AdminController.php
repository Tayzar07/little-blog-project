<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.admindashbard',['blogs'=>Blog::latest()->paginate(10)]);
    }

    public function create(){
        return view('admin.createblog');
    }
}
