<?php

namespace App\Http\Controllers\BackPage;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Members';
        $member = User::when($request->search, function($query) use ($request) {
            $query->where('username', 'like', '%' .$request->search. '%')
                    ->orWhere('fullname', 'like', '%' .$request->search. '%')
                  ->orWhere('email', 'like', '%' .$request->search. '%');
            })->paginate(10)->appends(['search' => $request->search]);


        $data = compact('title');
        return view('back-page.members.index', $data);
    }

    public function create()
    {
        $title = 'Create Members';

        $data = compact('title');
        return view('back-page.members.create', $data);
    }

    public function store(Request $request)
    {
        $$request->validate([
            'username' => 'required|string|max:255',
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'roles' => 'required|string',
            'bio' => 'nullable|string',
            'links' => 'nullable|string',
         ]);

        User::create($validated);

        return redirect()->route('members.index')->with('success', 'Member berhasil ditambahkan.');
    }

    public function edit()
    {
        $title = 'Members';

        $data = compact('title');
        return view('back-page.members.edit', $data);
    }

    public function destroy($id)
    {
        $member = User::findOrFail($id);
        try {$member->delete();
        return redirect()->route('members.index')->with('success', 'Speaker berhasil dihapus.');
    } catch (\Exception $e) {
        return redirect()->route('members.index')->with('error', 'Terjadi kesalahan saat menghapus speaker.');
    }
    }

    public function show($username)
    {
        $title = 'Members';

        $data = compact('title');
        return view('back-page.members.show', $data);
    }

    public function update(Request $request, string $username)
    {
        return redirect()->route('members.index')->with('success', 'Member berhasil diperbarui.');
    }

    public function detailMember($id)
    {
        $member = User::findOrFail($id); 
        $title = 'Detail Member';

        return view('back-page.members.detail', compact('title', 'member'));
    }
}
