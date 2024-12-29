<?php

namespace App\Http\Controllers\BackPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Str;
use App\Http\Requests\EventRequest;
use App\Models\User;
use Storage;
use App\Models\EventSpeaker;

class EventController extends Controller
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
            ->filter(request(['search', 'status']))
            ->latest();

        $events = $eventsQuery->orderBy('start_date', 'desc')->paginate(8);

        $categories = Category::pluck('name', 'id');
            
        $data = compact('title', 'events', 'categories');
        
        return view('back-page.events.index', $data);
    }


    public function create()
    {
        $title = 'Events';

        $categories = Category::pluck('name', 'id');
        $speakers = User::where('roles', 'Speakers')->where('is_verified', true)->pluck('fullname', 'id');

        $data = compact('title', 'categories', 'speakers');
        return view('back-page.events.create', $data);
    }

    public function store(EventRequest $request)
    {
        $validated = $request->validated();

        if ($request->file('images')) {
            $path = $request->file('images')->store('events', 'public');
            
            $validated['images'] = Storage::url($path);
        }

        $event = Event::create([
            'title'         => $validated['title'],
            'slug'          => $validated['slug'],
            'start_date'    => $validated['start_date'],
            'end_date'      => $validated['end_date'],
            'category_id'   => $validated['category_id'],
            'location'      => $validated['location'],
            'is_paid'       => $validated['is_paid'],
            'price'         => $validated['price'],
            'images'        => $validated['images'],
            'description'   => $validated['description'],
            'status'        => $validated['status'],
        ]);

        foreach($validated['speakers'] as $speaker) {
            EventSpeaker::create([
                'speaker_id' => $speaker, 
                'event_id'   => $event->id
            ]);
        }
    
        return redirect()->route('events.index')->with('success', 'New event has been created succesfully');
    }

    public function edit($slug)
    {
        $title = 'Events';
        $event = Event::where('slug', $slug)->firstOrFail();
    
        $categories = Category::pluck('name', 'id');
        $speakers = User::where('roles', 'Speakers')->where('is_verified', true)->pluck('fullname', 'id');

        $speakerIds = $event->speakers->pluck('id')->toArray();
        
        $data = compact('title', 'event', 'categories', 'speakers', 'speakerIds');
        return view('back-page.events.edit', $data);
    }

    public function show($slug)
    {
        $title = 'Events';

        $event = Event::where('slug', $slug)->firstOrFail();
        
        $data = compact('title', 'event');
        return view('back-page.events.show', $data);
    }

    public function update(EventRequest $request, string $slug)
    {
        $validated = $request->validated();
        
        if ($request->file('images')) {
            $imagesPath = 'events/' . basename($request->oldImages);
            if (Storage::disk('public')->exists($imagesPath)) {
                Storage::disk('public')->delete($imagesPath);
            }
        
            $path = $request->file('images')->store('events', 'public');
            
            $validated['images'] = Storage::url($path);
        }

        $event = Event::where('slug', $slug)->firstOrFail();

        $event->update([
            'title'         => $validated['title'],
            'slug'          => $validated['slug'],
            'start_date'    => $validated['start_date'],
            'end_date'      => $validated['end_date'],
            'category_id'   => $validated['category_id'],
            'location'      => $validated['location'],
            'is_paid'       => $validated['is_paid'],
            'price'         => $validated['price'],
            'images'        => $validated['images'] ?? $request->oldImages,
            'description'   => $validated['description'],
            'status'        => $validated['status'],
        ]);

        $event->speakers()->sync($validated['speakers']);
    
        return redirect()->route('events.index')->with('success', 'Event has been updated succesfully');
    }

    public function destroy($slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();

        $event->delete();

        return redirect()->route('events.index')
            ->with('success', 'Event has been deleted succesfully');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Event::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
