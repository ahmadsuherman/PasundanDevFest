<?php

namespace App\Http\Controllers\FrontPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use App\Models\User;
use Carbon\Carbon;
use Auth;

class RegisterController extends Controller 
{
    public function showRegister(){
        $title = 'Register';

        $data =compact('title');
        return view('front-page.auth.register', $data); 
    }

    public function postRegister(Request $request)
    {
        $request->validate([
            'username'      => 'required|regex:/^[a-z0-9]+$/|max:20|unique:users,username',
            'fullname'      => 'required|string|max:255',
            'email'         => 'required|string|email|max:255|unique:users',
            'password'      => 'required|string|min:6|confirmed',
            'roles'         => 'required'
        ]);
    
        $user = User::create([
            'username'         => $request->username,
            'fullname'         => $request->fullname,
            'email'            => $request->email,
            'password'         => Hash::make($request->password),
            'roles'            => $request->roles,
            'email_verified_at' => Carbon::now(),
            'is_verified'       => $request->roles == 'Members' ? true : false,
        ]);
    
        Auth::login($user);

        return $this->redirectTo($user);
    }

    public function redirectTo($user)
    {
        if($user->roles == "Admin")
        {
            return redirect('admin/dashboard');
        }
        else if($user->roles == "Members")
        {
            return redirect('members/dashboard');
        } 
        else if ($user->roles == "Speakers")
        {
            return redirect('speakers/dashboard');
        } 
        else {
            abort(404);
        }
    }
}