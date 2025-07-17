<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Mail\subscriberMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class BlogController extends Controller
{
    public function index()
    {
        DB::listen(function($query){
            logger($query->sql);
        });
        return view('blogs.index', ['blogs' => Blog::latest()->filter(request(['search', 'username', 'category']))->paginate(6)->withQueryString()]);
    }

    public function show(Blog $blog)
    {
        return view('blogs.show', ['blog' => $blog, 'randomblogs' => Blog::inRandomOrder()->take(3)->get()]);
    }

    public function subscribeHandler(Blog $blog)
    {
        if (User::find(auth()->id())->isSubscribe($blog)) {
            $blog->subscribers()->detach(auth()->user()->id);
            return back()->with('success', 'Unsubscription success..');
        } else {
            $blog->subscribers()->attach(auth()->user()->id);
            return back()->with('success', 'Subscription success..');
        }
    }

    public function storeComment(Blog $blog)
    {

        $formdata = request()->validate([
            'body' => ['required', 'string', 'min:10']
        ]);

        $formdata['user_id'] = auth()->id();

        $blog->comments()->create($formdata);

        $subscribers = $blog->subscribers->filter(fn($subscriber) => $subscriber->id !== auth()->id());

        $subscribers->each(function($subscriber) use($blog){
            Mail::to($subscriber->email)->queue(new subscriberMail($blog));
        });

        return redirect("blogs/{$blog->slug}")->with('success','comment create success');
    }
}
