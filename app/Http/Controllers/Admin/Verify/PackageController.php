<?php

namespace App\Http\Controllers\Admin\Verify;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\VerifyPackage;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = VerifyPackage::all();
        return view('admin.verify.packages.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.verify.packages.form');
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
            'name' => 'required',
            'price' => 'required',
            'duration' => 'required'
        ]);

        $data = $request->all();
        VerifyPackage::create($data);
        return redirect()->route('admin.verify.packages.index')->with('status', 'Success add package!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = VerifyPackage::find($id);
        return view('admin.verify.packages.form', compact('item'));
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
        $data = $request->except('_method');
        VerifyPackage::find($id)->update($data);
        return redirect()->route('admin.verify.packages.index')->with('status', 'Success update package!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = VerifyPackage::find($id);
        $item->delete();
        return redirect()->route('admin.verify.packages.index')->with('status', 'Success delete package!');
    }
}
