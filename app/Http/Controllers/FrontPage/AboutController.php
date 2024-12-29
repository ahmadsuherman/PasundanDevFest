<?php

namespace App\Http\Controllers\FrontPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AboutController extends Controller
{
    protected $apiUrl = 'https://api.github.com';

    public function index()
    {
        $title = 'About';
        $repo  = "PasundanDevFest";

        $response = Http::withToken(config('services.github.token'))
            ->get("{$this->apiUrl}/repos/" . config('services.github.owner') . "/{$repo}/collaborators");

        $data = $response->json();

        if ($response->successful()) {
            $collaborators = [
                'status' => 'success',
                'data' => $data
            ];
        } else {
            $collaborators = [
                'status'    => 'error',
                'error'     => 'Failed to fetch collaborators',
                'data'      => $data
            ];
        }

        $data = compact('title', 'collaborators');
        return view('front-page.about', $data);
    }
}
