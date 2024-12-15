<?php

namespace App\Http\Controllers\FrontPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Hash;
use Exception;
use Carbon\Carbon;

class LoginController extends Controller
{
    public function showLogin(){
        $title = 'Login';

        $data = compact('title');
        return view('front-page.auth.login', $data);
    }

    public function redirectToGoogle(Request $request)
    {
        $role = $request->query('role');

        if (!in_array($role, ['Speakers', 'Members', null])) {
            abort(404);
        }

        session(['role' => $role]);

        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
            $role       = session('role');
            $user       = User::where('email', $googleUser->getEmail())->first();
      
            if($role == null)
            {
                if ($user) {
                    if (is_null($user->google_id)) {
                        $user->update(['google_id' => $googleUser->getId()]);
                    }
                    
                    Auth::login($user);

                    session()->forget('role');
                    
                    return $this->redirectTo($user);
                } else {
                    session()->forget('role');
                    return redirect('/login')->with('error', 'Email ' . $googleUser->getEmail() . ' tidak terdaftar silahkan register terlebih dahulu');
                }
            }

            if ($user) {
                session()->forget('role');
                return redirect('/register')->with('error', 'Email ' . $googleUser->getEmail() . ' sudah terdaftar silahkan silahkan login');
            } else {

                $user = User::create([
                    'google_id'         => $googleUser->getId(),
                    'fullname'          => $googleUser->getName(),
                    'username'          => strtolower(str_replace(' ', '', $googleUser->getName())),
                    'email'             => $googleUser->getEmail(),
                    'email_verified_at' => Carbon::now(),
                    'password'          => Hash::make(env('GENERATE_PASSWORD')),
                    'is_verified'       => $role == 'Members' ? true : false,
                    'avatar'            => $googleUser->getAvatar(),
                    'roles'             => $role, 
                ]);

                Auth::login($user);

                session()->forget('role');
                return $this->redirectTo($user);
            }
        } catch (\Exception $e) {
            session()->forget('role');
            return redirect('/login')->with('error', 'Google authentication failed');
        }
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
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
