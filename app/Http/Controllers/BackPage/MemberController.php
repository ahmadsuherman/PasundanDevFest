<?php

namespace App\Http\Controllers\BackPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $title = 'Members';

        $data = compact('title');
        return view('back-page.members.index', $data);
    }

    public function create()
    {
        $title = 'Member';

        $data = compact('title');
        return view('back-page.members.create', $data);
    }

    public function edit()
    {
        $title = 'Member';

        $data = compact('title');
        return view('back-page.members.edit', $data);
    }

    public function show($username)
    {
        $title = 'Member';

        $data = compact('title');
        return view('back-page.members.show', $data);
    }

    public function update(Request $request, string $username)
    {
        return redirect()->route('members.index')->with('success', 'Member berhasil diperbarui.');
    }
}
