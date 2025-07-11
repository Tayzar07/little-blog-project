<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;

class BlogController extends Controller
{
    public function index(){

        return view('blogs.index',['blogs'=>Blog::latest()->filter(request(['search','username','category']))->paginate(6)->withQueryString()]);
    }

    public function show(Blog $blog){
        return view('blogs.show',['blog'=>$blog,'randomblogs'=>Blog::inRandomOrder()->take(3)->get()]);
    }

    public function subscribeHandler(Blog $blog){
        if(User::find(auth()->id())->isSubscribe($blog)){
            $blog->subscribers()->detach(auth()->user()->id);
            return back()->with('success','Unsubscription success..');
        }else{
            $blog->subscribers()->attach(auth()->user()->id);
            return back()->with('success','Subscription success..');
        }

    }

    public function storeComment(Blog $blog){

        $formdata = request()->validate([
            'body'=>['required','string','min:10']
        ]);

        $formdata['user_id'] = auth()->id();

        $blog->comments()->create($formdata);

        return redirect("blogs/{$blog->slug}");
    }

}
