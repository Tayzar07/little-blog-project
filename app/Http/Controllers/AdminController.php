<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.admindashbard', ['blogs' => Blog::latest()->paginate(10)]);
    }

    public function create()
    {
        return view('admin.createblog', ['categories' => Category::all()]);
    }

    public function store()
    {

        $formdata = request()->validate([
            'title' => ['required', 'string'],
            'slug' => ['required', 'string', Rule::unique('blogs', 'slug')],
            'info' => ['required', 'string'],
            'category_id' => ['required', Rule::exists('blogs', 'category_id')],
            'body' => ['required', 'min:50'],
            'thumbnail' => ['image', 'mimes:jpeg,png,jpg,svg']
        ]);
        $formdata['user_id'] = auth()->user()->id;

        if (request()->hasFile('thumbnail')) {
            $imagename = uniqid() . request()->file('thumbnail')->getClientOriginalName();
            $formdata['thumbnail'] = request()->file('thumbnail')->storeAs('thumbnail', $imagename, 'public');
        }

        Blog::create($formdata);

        return redirect('/')->with('success', 'blog create success ..');
    }

    public function destroy(Blog $blog)
    {
        $blog->deleteOrFail();
        $dbimage = $blog->thumbnail;
        if ($dbimage !== null) {
            Storage::disk('public')->delete($dbimage);
        }
        return redirect('/admin/dashboard')->with('success', 'post deleted successfully.');
    }

    public function edit(Blog $blog)
    {
        return view('admin.editblog', ['blog' => $blog, 'categories' => Category::all()]);
    }

    public function update(Blog $blog)
    {

        $formdata = request()->validate([
            'title' => ['required', 'string'],
            'slug' => ['required', 'string', Rule::unique('blogs', 'slug')->ignore($blog->id)],
            'info' => ['required', 'string'],
            'category_id' => ['required', Rule::exists('blogs', 'category_id')],
            'body' => ['required', 'min:50'],
            'thumbnail' => ['image', 'mimes:jpeg,png,jpg,svg']
        ]);
        $formdata['user_id'] = auth()->user()->id;

        if (request()->hasFile('thumbnail')) {
            $dbimage = $blog->thumbnail;
            if ($dbimage !== null) {
                Storage::disk('public')->delete($dbimage);
            }
            $imagename = uniqid() . request()->file('thumbnail')->getClientOriginalName();
            $formdata['thumbnail'] = request()->file('thumbnail')->storeAs('thumbnail', $imagename, 'public');
        }

        $blog->update($formdata);

        return redirect("/blogs/{$blog->slug}")->with('success', 'blog update success ..');
    }

    // admin profile update

    public function editProfile (){
        return view('admin.edit-admin-profile',['profile'=>auth()->user()]);
    }

    public function updateProfile(){
        $formdata = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users','email')->ignore(auth()->user()->id)],
            'avatar' => ['image', 'mimes:jpeg,png,jpg,svg']
        ]);

        if (request()->hasFile('avatar')) {
            $dbimage = auth()->user()->avatar;
            if ($dbimage !== null) {
                Storage::disk('public')->delete($dbimage);
            }
            $imagename = uniqid() . request()->file('avatar')->getClientOriginalName();
            $formdata['avatar'] = request()->file('avatar')->storeAs('profiles', $imagename, 'public');
        }

        auth()->user()->update($formdata);

        return back()->with('success','profile update success..');

    }
}
