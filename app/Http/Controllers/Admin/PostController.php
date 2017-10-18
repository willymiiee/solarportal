<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\HomeController;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

use App\Models\Post;
use App\Models\Image;
use App\Models\Label;

class PostController extends HomeController
{
    private $client;
    private $label;

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

        $this->label = Label::whereNull('deleted_at')->get();
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
        $label = $this->label;
        return view('admin.posts.form', compact('label'));
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
            'content' => 'required',
            'label_id' => 'required'
        ]);

        $post = new Post();
        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->slug = str_slug($request->get('title'), '-');
        $post->label_id = $request->get('label_id');
        $post->published = $request->get('published') ? true : false;
        $post->created_by = \Auth::user()->id;
        $post->save();

        if ($request->image) {
            $photoName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('upload'), $photoName);

            $image = Image::create([
                'url' => 'upload/'.$photoName
            ]);

            $post->images()->attach($image->id, ['item_type' => 'post']);
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
        $label = $this->label;
        return view('admin.posts.form', compact('item', 'label'));
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
        $item->label_id = $request->get('label_id');
        $item->published = $request->get('published') ? true : false;
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
