<?php

namespace App\Http\Controllers\BackPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Event;

class DashbaordController extends Controller
{
    public function dashboardAdmin()
    {
        $title = "Dashboard";

        $event = Event::selectRaw("
            SUM(CASE WHEN status = 1 THEN 1 ELSE 0 END) AS published,
            SUM(CASE WHEN status = 0 THEN 1 ELSE 0 END) AS draf
        ")->first();

        $categoriesCount = Category::count();

        $user = User::selectRaw("
            SUM(CASE WHEN roles = 'Speakers' AND is_verified = 1 THEN 1 ELSE 0 END) AS verified_speakers,
            SUM(CASE WHEN roles = 'Speakers' AND is_verified = 0 THEN 1 ELSE 0 END) AS unverified_speakers,
            SUM(CASE WHEN roles = 'Members' THEN 1 ELSE 0 END) AS members
        ")->first();

        $data = compact('title', 'event', 'user', 'categoriesCount');

        return view('back-page.dashboard', $data);
    }

    public function dashboardMember()
    {
        $title                  = 'Dashboard';

        $eventCount             = Event::where('status', true)->count();
        $followedEventsCount    = auth()->user()
        ->event_members()
        ->wherePivot('payment_status', 1)
        ->count();

        $data = compact('title', 'eventCount', 'followedEventsCount');
        return view('back-page.dashboard-members', $data);
    }

    public function dashboardSpeaker()
    {
        $title                  = 'Dashboard';
        
        $eventCount             = Event::where('status', true)->count();
        $eventHostedCount    = auth()->user()
        ->event_speakers()
        ->count();

        $data = compact('title', 'eventCount', 'eventHostedCount');
        return view('back-page.dashboard-speakers', $data);
    }
}
