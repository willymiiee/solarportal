<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Article::whereNull('deleted_at')->orderBy('created_at', 'desc')->get();
        return response()->json($items);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Article::where('slug', $slug)->first();
        $item->images = $item->images();
        $item->label = $item->label();
        return response()->json($item);
    }
}
