<?php

namespace App\Http\Controllers;

use App\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = category::all();
        return view('category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = category::create($this->validateRequest());
        $this->storedImage($category);
        return redirect('category')->with('success', 'Data Saved!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        $category->update($this->validateRequest());
        if($request->image != null){
            $this->storedImage($category);
        }
        return redirect('category')->with('success', 'Data Saved!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        $category->delete();
        return redirect('category')->with('success', 'Data Saved!!');
    }

    private function validateRequest()
    {
        return Request()->validate([
            'category' => 'string|required',
            'image' => ''
        ]);
    }

    private function storedImage($image)
    {
        if(request()->hasfile('image')){
            $file = request()->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = "/images/gallery/category/".time().'.'.$extension;
            $file->move(public_path("../public/images/gallery/category"), $filename);
            $image->image = $filename;
            $image->save();
        }
    }
}
