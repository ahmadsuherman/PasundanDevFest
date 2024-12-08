<?php

namespace App\Http\Controllers\FrontPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $title = 'About';

        $data = compact('title');
        return view('front-page.about', $data);
    }
}
