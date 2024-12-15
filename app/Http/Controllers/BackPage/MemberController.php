<?php

namespace App\Http\Controllers\BackPage;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Database\Seeders\UserSeeder;
use App\Http\Controllers\Controller;

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
        $title = 'Members';

        $data = compact('title');
        return view('back-page.members.create', $data);
    }

    public function edit($username)
    {
        // Mengambil data user berdasarkan username
        $user = User::where('username', $username)->firstOrFail();
        $title = 'Members';

        $data = compact('title');
        return view('back-page.members.edit', $data);
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
}
