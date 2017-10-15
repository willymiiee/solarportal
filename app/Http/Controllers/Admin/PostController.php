<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\HomeController;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

use App\Models\Post;
use App\Models\Image;

class PostController extends Controller
{
    private $client;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->client = new Client([
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '.\Cookie::get('auth_token'),
            ]
        ]);
    }

    protected static function find($id)
    {
        return Post::where('id', $id)->first();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $response = $this->client->get(url('api/v1/posts'));
            $items = json_decode($response->getBody()->getContents());
        } catch (RequestException $e) {
        }

        return view('admin.posts.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:500',
            'title' => 'required',
            'content' => 'required'
        ]);

        $post = Post::create([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'slug' => str_slug($request->get('title'), '-'),
            'created_by' => \Auth::user()->id
        ]);

        if ($request->image) {
            $photoName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('upload'), $photoName);

            $image = Image::create([
                'url' => 'upload/'.$photoName
            ]);

            $page->images()->attach($image->id, ['item_type' => 'post']);
        }

        return redirect('admin/posts')->with('status', 'Success add post!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = self::find($id);
        return view('admin.posts.form', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:500',
        ]);

        $item = self::find($id);
        $item->title = $request->get('title') ? $request->get('title') : $item->title;
        $item->content = $request->get('content') ? $request->get('content') : $item->content;
        $item->slug = $request->get('title') ? str_slug($request->get('title'), '-') : $item->slug;
        $item->updated_by = \Auth::user()->id;
        $item->save();

        if ($request->image) {
            $photoName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('upload'), $photoName);

            $image = Image::create([
                'url' => 'upload/'.$photoName
            ]);

            $item->images()->sync($image->id, ['item_type' => 'post']);
        }

        return redirect('admin/posts')->with('status', 'Success update post!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = self::find($id);
        $item->deleted_by = \Auth::user()->id;
        $item->save();
        $item->delete();

        return redirect('admin/posts')->with('status', 'Success delete post!');
    }
}
