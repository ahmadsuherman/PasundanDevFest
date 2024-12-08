<?php

namespace App\Http\Controllers\FrontPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterEventController extends Controller 
{
    public function showRegisterEvent(){
        $title = 'RegisterEvent';

        $data =compact('title');
        return view('front-page.registerevent', $data); 
    }
}