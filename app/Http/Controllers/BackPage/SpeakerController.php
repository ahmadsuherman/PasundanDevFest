<?php

namespace App\Http\Controllers\BackPage;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

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
        $title = 'Create Speakers';

        $data = compact('title');
        return view('back-page.speakers.create', $data);
    }

    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username',
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'roles' => 'required|in:Admin,User,Speaker',
            'bio' => 'nullable|string|max:500',
        ]);

        User::create([
            'username' => $request->username,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'roles' => $request->roles,
            'bio' => $request->bio,
            'password' => Hash::make('defaultpassword'),
        ]);

        return redirect()->back();
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
