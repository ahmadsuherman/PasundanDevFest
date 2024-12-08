<?php

namespace App\Http\Controllers\FrontPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLogin(){
        $title = 'Login';

        $data = compact('title');
        return view('front-page.auth.login', $data);
    }
}
