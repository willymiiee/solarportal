<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class HomeController extends Controller
{
    protected $data;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->data = [
            'menu' => Article::whereNull('deleted_at')
                ->where('type', 'page')
                ->where('is_home', 1)->get()
        ];
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
