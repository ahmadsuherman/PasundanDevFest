<?php

namespace App\Http\Controllers\BackPage;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Storage;
use Hash;
use Carbon\Carbon;

class SpeakerController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Speakers';
        
        $speakerQuery = User::where('roles', 'Speakers')->filter(request(['search', 'is_verified']))
        ->latest();

        $speakers = $speakerQuery->paginate(10);

        $data = compact('title', 'speakers');
        return view('back-page.speakers.index', $data);
    }

    public function create()
    {
        $title = 'Speakers';

        $data = compact('title');
        return view('back-page.speakers.create', $data);
    }


    public function store(UserRequest $request)
    {
        $validated = $request->validated();

        $validated['password']          = Hash::make(env('GENERATE_PASSWORD'));
        $validated['roles']             = 'Speakers';
        $validated['is_verified']       = true;
        $validated['email_verified_at'] = Carbon::now();
        
        if ($request->file('avatar')) {
            $path = $request->file('avatar')->store('users', 'public');
            
            $validated['avatar'] = Storage::url($path);
        }

        $speaker = User::create($validated);
        return redirect()->route('speakers.index')->with('success', 'New Speaker has been created succesfully');
    }

    public function edit($username)
    {
        $title = 'Speakers';

        $speaker = User::where('roles', 'Speakers')->where('username', $username)->firstOrFail();

        $data = compact('title', 'speaker');
        return view('back-page.speakers.edit', $data);
    }

    public function show($username)
    {
        $title = 'Speakers';

        $speaker = User::where('roles', 'Speakers')->where('username', $username)->firstOrFail();

        $data = compact('title', 'speaker');
        return view('back-page.speakers.show', $data);
    }

    public function update(UserRequest $request, string $username)
    {
        $validated = $request->validated();

        if ($request->file('avatar')) {
            $avatarPath = 'users/' . basename($request->oldAvatar);
            if (Storage::disk('public')->exists($avatarPath)) {
                Storage::disk('public')->delete($avatarPath);
            }
        
            $path = $request->file('avatar')->store('users', 'public');
            
            $validated['avatar'] = Storage::url($path);
        }

        User::where('roles', 'Speakers')->where('username', $username)
        ->update($validated);

        return redirect('admin/speakers/'. $validated['username'])->with('success', 'Speaker has been updated succesfully');
    }

    public function destroy(string $username)
    {
        $speaker = User::where('roles', 'Speakers')->where('username', $username)->firstOrFail();
        
        $speaker->delete();
        return redirect()->route('speakers.index')->with('success', 'Speaker has been deleted succesfully');
    }

    public function verified($username)
    {
        $speaker = User::where('roles', 'Speakers')->where('username', $username)->firstOrFail();
        
        $speaker->update(['is_verified' => true]);
        return redirect()->route('speakers.index')->with('success', 'Speaker has verified succesfully');
    }
}
