<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'max:255', Rule::unique('users', 'username')],
            'avatar' => ['image','mimes:jpg,png,jpeg,svg'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        $user = $request->user();

        return redirect('/')->with('success','Welcome '. $user->name . ' ! !');
    }

    public function userProfile(){
        return View("user.profile",['profile'=>auth()->user()]);
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
