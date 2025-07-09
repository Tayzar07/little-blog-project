<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        return view('blogs.index',['blogs'=>Blog::latest()->paginate(6)]);
    }

    public function show(Blog $blog){
        return view('blogs.show',['blog'=>$blog]);
    }
}
