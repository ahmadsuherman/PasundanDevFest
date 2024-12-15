<?php

namespace App\Http\Controllers\FrontPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class MembersController extends Controller
{
    public function showMembers()
    {
        $title = 'Members';

        $membersQuery = User::where('roles', 'Members')
                            ->filter(request(['search']))
                            ->latest();

        $members = $membersQuery->paginate(8);

        if (request()->ajax()) {
            $membersHTML = view('front-page.members.search', compact('members'))->render();
            $pagination = $members->links()->toHtml();
            
            return response()->json([
                'members' => $membersHTML,
                'pagination' => $pagination,
            ]);
        }

        $data = compact('title', 'members');
        
        return view('front-page.members.index', $data);
    }
    
}
