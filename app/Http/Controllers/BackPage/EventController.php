<?php

namespace App\Http\Controllers\BackPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Pest\Collision\Events;

class EventController extends Controller
{
    public function index()
    {
        $title = 'Events';

        $events = Events::all();

        $data = compact('title','event');
        return view('back-page.events.index', $data);
    }


    public function create()
    {
        $title = 'Events';

        $data = compact('title');
        return view('back-page.events.create', $data);
    }

    

    public function store(Request $request)
    {
        return redirect()->route('events.index')->with('success', 'Events berhasil ditambahkan.');
    }

    public function edit(string $slug)
    {
        $title = 'Events';
        $event = Events::where('slug', $slug)->first();
        $data = compact('title');
        return view('back-page.events.edit', $data);
    }

    public function show($slug)
    {
        $title = 'Events';

        $data = compact('title');
        return view('back-page.events.show', $data);
    }

    public function update(Request $request, string $slug)
    {
        return redirect()->route('events.index')->with('success', 'Event berhasil diperbarui.');
    }
}
