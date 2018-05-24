<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Company;
use App\Repositories\ArticleRepository;
use Illuminate\Http\Request;

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
        $this->repo = new ArticleRepository(new Article);
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['about'] = Article::where('slug', 'tentang-gnssa')->first();
        $this->data['about']->content = explode("\n", $this->data['about']->content);
        $this->data['blog'] = Article::where('type', 'post')
            ->where('published', true)
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();
        $this->data['participant'] = Company::orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        foreach ($this->data['blog'] as $k => $b) {
            $this->data['blog'][$k]->image = $b->images()->first();
        }

        return view('home')->with('data', $this->data);
    }

    public function getItem($slug = null)
    {
        if ($slug) {
            $this->data['item'] = Article::where('slug', $slug)->first();
            $this->data['slug'] = $slug;

            return view('post')->with('data', $this->data);
        }
    }

    public function getThankyouRegister()
    {
        return view('register-thankyou')->with('data', $this->data);
    }

    public function getArticles(Request $request)
    {
        $data['title'] = 'Daftar Artikel';

        if ($request->has('search')) {
            $data['items'] = $this->repo->filter($request->get('search'), 6);
        } else {
            $data['items'] = $this->repo->getLatest('mixed', 6);
        }

        foreach ($data['items'] as $k => $b) {
            $data['items'][$k]->image = $b->images()->first();
        }

        return view('public_entity::contents.article.index', $data);
    }

    public function getRequestQuote($step = 1, Request $request)
    {
        return view('quote', compact('step'));
    }
}
