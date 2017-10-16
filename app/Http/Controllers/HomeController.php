<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Post;

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
            'menu' => Page::whereNull('deleted_at')->where('is_home', 1)->get()
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
        $this->data['blog'] = Post::whereNull('deleted_at')
            ->take(4)
            ->orderBy('id', 'desc')
            ->get();

        foreach ($this->data['blog'] as $k => $b) {
            $this->data['blog'][$k]->image = $b->images()->where('item_type', 'post')->first();
        }

        return view('home')->with('data', $this->data);
    }

    public function getItem($type = null, $slug = null)
    {
        if ($type && $slug) {
            switch ($type) {
                case 'p':
                    $view = 'page';
                break;

                case 'b':
                    $view = 'post';
                break;

                default:
                    return redirect('home');
                break;
            }

            $this->data['type'] = $type;
            $this->data['slug'] = $slug;

            return view($view)->with('data', $this->data);
        }
    }
}
