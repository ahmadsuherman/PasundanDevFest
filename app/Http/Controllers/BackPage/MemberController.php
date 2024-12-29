<?php

namespace App\Http\Controllers\BackPage;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Storage;
use Hash;
use Carbon\Carbon;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Members';
        
        $memberQuery = User::where('roles', 'Members')->filter(request(['search']))
        ->latest();

        $members = $memberQuery->paginate(10);

        $data = compact('title', 'members');
        return view('back-page.members.index', $data);
    }

    public function create()
    {
        $title = 'Members';

        $data = compact('title');
        return view('back-page.members.create', $data);
    }


    public function store(UserRequest $request)
    {
        $validated = $request->validated();

        $validated['password']          = Hash::make(env('GENERATE_PASSWORD'));
        $validated['roles']             = 'Members';
        $validated['is_verified']       = true;
        $validated['email_verified_at'] = Carbon::now();
        
        if ($request->file('avatar')) {
            $path = $request->file('avatar')->store('users', 'public');
            
            $validated['avatar'] = Storage::url($path);
        }

        $member = User::create($validated);
        return redirect()->route('members.index')->with('success', 'New member has been created succesfully');
    }

    public function edit($username)
    {
        $title = 'Members';

        $member = User::where('roles', 'Members')->where('username', $username)->firstOrFail();

        $data = compact('title', 'member');
        return view('back-page.members.edit', $data);
    }

    public function show($username)
    {
        $title = 'Members';

        $member = User::where('roles', 'Members')->where('username', $username)->firstOrFail();

        $data = compact('title', 'member');
        return view('back-page.members.show', $data);
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

        User::where('roles', 'Members')->where('username', $username)
        ->update($validated);

        return redirect('admin/members/'. $validated['username'])->with('success', 'Member has been updated succesfully');
    }

    public function destroy(string $username)
    {
        $member = User::where('roles', 'Members')->where('username', $username)->firstOrFail();
        
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Member has been deleted succesfully');
    }
}
