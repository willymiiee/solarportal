<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['blog'] = Article::whereNull('deleted_at')
            ->take(4)
            ->where('type', 'post')
            ->where('published', true)
            ->orderBy('id', 'desc')
            ->get();

        foreach ($this->data['blog'] as $k => $b) {
            $this->data['blog'][$k]->image = $b->images()->first();
        }

        return view('home')->with('data', $this->data);
    }

    public function getItem($slug = null)
    {
        if ($slug) {
            $this->data['slug'] = $slug;

            return view('post')->with('data', $this->data);
        }
    }
}
