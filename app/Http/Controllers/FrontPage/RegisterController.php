<?php

namespace App\Http\Controllers\FrontPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller 
{
    public function showRegister(){
        $title = 'Register';

        $data =compact('title');
        return view('front-page.auth.register', $data); 
    }
}