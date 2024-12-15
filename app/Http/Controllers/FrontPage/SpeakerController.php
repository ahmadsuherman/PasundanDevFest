<?php

namespace App\Http\Controllers\FrontPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class SpeakerController extends Controller
{
    public function index()
    {
        $title = 'Speakers';

        $speakersQuery = User::where('roles', 'Speakers')
                            ->filter(request(['search']))
                            ->latest();

        $speakers = $speakersQuery->paginate(8);

        if (request()->ajax()) {
            $speakersHTML = view('front-page.speakers.search', compact('speakers'))->render();
            $pagination = $speakers->links()->toHtml();
            
            return response()->json([
                'speakers' => $speakersHTML,
                'pagination' => $pagination,
            ]);
        }

        $data = compact('title', 'speakers');
        
        return view('front-page.speakers.index', $data);
    }
}
