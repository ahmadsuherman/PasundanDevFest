<?php

namespace App\Http\Controllers\BackPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Storage;

class AccountController extends Controller
{
    public function index()
    {
        $title = 'Accounts';

        $data = compact('title');
        return view('back-page.accounts.index', $data);
    }

    public function update(Request $request)
    {
        $request['links'] = json_decode($request->links, true);

        $validated = $request->validate([
            'avatar'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'username'      => 'required|regex:/^[a-z0-9]+$/|min:4|max:20|unique:users,username,' . auth()->id(),
            'fullname'      => 'required',
            'email'         => 'required|email|unique:users,username,' . auth()->id(),
            'bio'           => 'nullable',
            'links'         => 'nullable|array'
        ]);


        $user = Auth()->user();
        
        if ($request->file('avatar')) {
            $avatarPath = 'users/' . basename($request->oldAvatar);
            if (Storage::disk('public')->exists($avatarPath)) {
                Storage::disk('public')->delete($avatarPath);
            }
        
            $path = $request->file('avatar')->store('users', 'public');
            
            $validated['avatar'] = Storage::url($path);
        }

        User::where('id', $user->id)->update($validated);

        return back()->with('success', 'Account has been updated succesfully');
    }
}
