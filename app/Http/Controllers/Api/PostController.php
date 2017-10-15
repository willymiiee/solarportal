<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = Post::whereNull('deleted_at');

        if ($request->has('skip') && $request->has('take')) {
            $items = $items->skip($request->get('skip'))
                ->take($request->get('take'));
        }

        $items = $items->orderBy('created_at', 'desc')
            ->get();

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
        $item = Post::where('slug', $slug)->first();
        return response()->json($item);
    }
}
