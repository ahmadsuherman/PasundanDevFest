<?php

namespace App\Http\Controllers\FrontPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    public function showMembers()
    {
        $title = 'Members';

        $data = compact('title');
        return view('front-page.members', $data);
    }
    
}
