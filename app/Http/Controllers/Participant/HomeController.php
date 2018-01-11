<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Participant Dashboard';
        $data = [
            'title' => $title,
            'content_title' => $title,
            'content_description' => 'Here is your overview data',
            'active_page' => 'dashboard',
        ];

        return view('participant::home', $data);
    }
}
