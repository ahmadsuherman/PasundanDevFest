<?php

namespace App\Http\Controllers\BackPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SpeakerController extends Controller
{
    public function index()
    {
        $title = 'Speakers';

        $data = compact('title');
        return view('back-page.speakers.index', $data);
    }

    public function create()
    {
        $title = 'Speakers';

        $data = compact('title');
        return view('back-page.speakers.create', $data);
    }

    public function edit()
    {
        $title = 'Speakers';

        $data = compact('title');
        return view('back-page.speakers.edit', $data);
    }

    public function show($username)
    {
        $title = 'Speakers';

        $data = compact('title');
        return view('back-page.speakers.show', $data);
    }

    public function update(Request $request, string $username)
    {
        return redirect()->route('speakers.index')->with('success', 'Speaker berhasil diperbarui.');
    }
}
