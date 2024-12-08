<?php

namespace App\Http\Controllers\FrontPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function showEvents()
    {
        $title = 'Events';

        $data = compact('title');
        return view('front-page.events', $data);
    }

    public function showDetailEvents($slug)
    {
        $title = 'Events';

        $data = compact('title');
        return view('front-page.event-detail', $data);
    }
    
}
