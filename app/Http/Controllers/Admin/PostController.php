<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\HomeController;
use App\Models\Article;
use App\Models\Image;
use App\Models\Label;

class PostController extends HomeController
{
    private $label;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->label = Label::whereNull('deleted_at')->get();
    }

    protected static function find($id)
    {
        return Article::where('id', $id)->first();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Article::where('type', 'post')->get();
        return view('admin.post.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $label = $this->label;
        $itemLabels = [];
        return view('admin.post.form', compact('label', 'itemLabels'));
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

        $post = Article::create([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'slug' => str_slug($request->get('title'), '-'),
            'type' => 'post',
            'published' => $request->get('published') ? true : false,
            'created_by' => \Auth::user()->id
        ]);

        if ($request->image) {
            $photoName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('upload'), $photoName);

            $image = Image::create([
                'url' => 'upload/'.$photoName
            ]);

            $post->images()->attach($image->id);
        }

        if ($request->label_id) {
            $post->label()->attach($request->get('label_id'));
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
        $itemLabels = [];

        foreach ($item->label as $l) {
            $itemLabels[] = $l->id;
        }

        $label = $this->label;
        return view('admin.post.form', compact('item', 'label', 'itemLabels'));
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

        if ($request->label_id) {
            $item->label()->attach($request->get('label_id'));
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
