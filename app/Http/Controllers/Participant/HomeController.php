<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use App\Repositories\ArticleRepository;
use App\Repositories\CompanyRepository;

class HomeController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;
        $title = 'Participant Dashboard';
        $article_latest = app(ArticleRepository::class)->getLatest('mixed', 6);
        $data = [
            'title' => $title,
            'content_title' => $title,
            'content_description' => 'Here is your overview data',
            'active_page' => 'dashboard',
            'article_latest' => $article_latest,
            'messages_latest' => app(CompanyRepository::class)->getMessages($user_id, 5),
        ];

        return view('participant::home', $data);
    }
}
