<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::query();

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('title', 'like', '%' . $searchTerm . '%')
                ->orWhere('location', 'like', '%' . $searchTerm . '%')
                ->orWhere('description', 'like', '%' . $searchTerm . '%');
        }

        $events = $query->paginate(10);

        return view('events.index', compact('events'));
    }


    public function create()
    {
        $title = 'Events';

        $data = compact('title');
        return view('back-page.events.create', $data);
    }

    

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'description' => 'nullable',
        'date' => 'required|date',
        'location' => 'required|max:255'
    ]);

    $event = new Event();
    $event->title = $validatedData['title'];
    $event->description = $validatedData['description'] ?? null;
    $event->date = $validatedData['date'];
    $event->location = $validatedData['location'];

    $event->save();

    return redirect()->route('events.index')->with('success', 'Event berhasil ditambahkan.');
}

    public function show($slug)
    {
        $title = 'Events';

        $data = compact('title');
        return view('back-page.events.show', $data);
    }

public function update(Request $request, string $slug)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ])

        $event = Event::where('slug', $slug)->firstOrFail();
        
        $event->update($request->validated());
    
        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy($id)
{
    $event = Event::findOrFail($id);
    $event->delete();

    return redirect()->route('events.index')
        ->with('success', 'Event berhasil dihapus.');
}
}