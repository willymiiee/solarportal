<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Main Repository resource for controller
     * @var \App\Repositories\BaseRepository
     */
    protected $repo;

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
                ->where('is_home', 1)->get(),
        ];
        // $this->middleware('auth');
    }
}
