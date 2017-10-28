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
    public function index(Request $request)
    {
        $items = Article::whereNull('deleted_at');

        if ($request->has('type')) {
            $items = $items->where('type', $request->get('type'));
        }

        if ($request->has('skip') && $request->has('take')) {
            $items = $items->skip($request->get('skip'))
                ->take($request->get('take'));
        }

        $items = $items->orderBy('created_at', 'desc')
            ->get();

        foreach ($items as $k => $item) {
            $items[$k]->images = $item->images;
            $items[$k]->label = $item->label;
        }

        return response()->json($items);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $item = Article::where('slug', $slug)->first();
        $item->images = $item->images();
        $item->label = $item->label();
        return response()->json($item);
    }
}
