<?php

namespace App\Http\Controllers\BackPage;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class SpeakerController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Speakers';

        $speakers = User::when($request->search, function($query) use ($request) {
            $query->where('username', 'like', '%' .$request->search. '%')
                    ->orWhere('fullname', 'like', '%' .$request->search. '%')
                  ->orWhere('email', 'like', '%' .$request->search. '%');
            })->paginate(10)->appends(['search' => $request->search]);

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
        $title = 'EditSpeakers';

        $data = compact('title');
        return view('back-page.speakers.edit', $data);
    }

    public function destroy($id)
    {
        $speakers = User::findOrFail($id);
        try {$speakers->delete();
        return redirect()->route('speakers.index')->with('success', 'Speaker berhasil dihapus.');
    } catch (\Exception $e) {
        return redirect()->route('speakers.index')->with('error', 'Terjadi kesalahan saat menghapus speaker.');
    }
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
