<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\HomeController;
use App\Models\Article;
use App\Models\Image;

class PageController extends HomeController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
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
        $items = Article::where('type', 'page')->get();
        return view('admin.page.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.form');
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

        $page = Article::create([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'slug' => str_slug($request->get('title'), '-'),
            'type' => 'page',
            'is_home' => $request->get('is_home') ? true : false,
            'created_by' => \Auth::user()->id
        ]);

        if ($request->image) {
            $photoName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('upload'), $photoName);

            $image = Image::create([
                'url' => 'upload/'.$photoName
            ]);

            $page->images()->attach($image->id);
        }

        return redirect('admin/pages')->with('status', 'Success add page!');
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
        return view('admin.page.form', compact('item'));
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
        $item->is_home = $request->get('is_home') ? ($request->get('is_home') == true ? 1 : 0) : $item->is_home;
        $item->updated_by = \Auth::user()->id;
        $item->save();

        if ($request->image) {
            $photoName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('upload'), $photoName);

            $image = Image::create([
                'url' => 'upload/'.$photoName
            ]);

            $item->images()->sync($image->id);
        }

        return redirect('admin/pages')->with('status', 'Success update page!');
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

        return redirect('admin/pages')->with('status', 'Success delete page!');
    }
}
