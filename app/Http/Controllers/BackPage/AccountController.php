<?php

namespace App\Http\Controllers\BackPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $title = 'Accounts';

        $data = compact('title');
        return view('back-page.accounts.index', $data);
    }

    public function update()
    {
        return back()->with('success', 'Akun berhasil diperbarui.');
    }
}
