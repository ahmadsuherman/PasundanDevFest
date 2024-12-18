<?php

namespace App\Http\Controllers\FrontPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;
use Auth;

class EventsController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Events';

        $eventsQuery = Event::query()
            ->when(request('category'), function ($query) {
                $query->whereHas('category', function ($q) {
                    if (request('category') != "All Category") {
                        $q->where('category_id', request('category'));
                    }
                });
            })
            ->when(request('type'), function ($query) {
                if (request('type') == "fee") {
                    $query->where('is_paid', true);
                } else if (request('type') == "free"){
                    $query->where('is_paid', false);
                } 
            })
            ->filter(request(['search']))
            ->latest();

        $events = $eventsQuery->where('status', true)->orderBy('start_date', 'desc')->paginate(8);

        $categories = Category::pluck('name', 'id');
            
        if (request()->ajax()) {
            $eventsHTML = view('front-page.events.search', compact('events'))->render();
            $pagination = $events->links()->toHtml();

            return response()->json([
                'events' => $eventsHTML,
                'pagination' => $pagination,
            ]);
        }

        $data = compact('title', 'events', 'categories');
        
        return view('front-page.events.index', $data);
    }

    public function showDetailEvents($slug)
    {
        $title = 'Events';

        $event = Event::where('slug', $slug)->firstOrFail();
        
        $data = compact('title', 'event');
        return view('front-page.events.event-detail', $data);
    }
    
}
