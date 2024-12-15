<?php

namespace App\Http\Controllers\FrontPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Home';

        $upcomingEvents = Event::where('start_date', '>', now())->orderBy('start_date', 'asc')->get();
        $pastEvents = Event::where('start_date', '<', now())->orderBy('start_date', 'desc')->get();
        $newMemberRegistrations = User::where('roles', 'Members')->latest()->limit(8)->get();

        $data = compact('title', 'upcomingEvents', 'pastEvents', 'newMemberRegistrations');
        return view('front-page.home', $data);
    }
}
