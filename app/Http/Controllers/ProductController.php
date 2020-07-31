<?php

namespace App\Http\Controllers;

use App\product;
use App\category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product= product::all();
        return view('product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = category::all();
        return view('product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = product::create($this->validateRequest());
        $this->storedImage($product);
        return redirect('/product')->with('success', 'Data Saved!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        $category = category::all();
        return view('product.edit', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        $product->update($this->validateRequest());
        if($request->image != null){
            $this->storedImage($category);
        }
        return redirect('/product')->with('success', 'Data Saved!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        $product->delete();
        return redirect('product')->with('success', 'Data Saved!!');
    }

    private function validateRequest()
    {
        return Request()->validate([
            'category_id' => 'required',
            'product'=> 'string | required',
            'image'=> '',
            'price'=> 'string | required',
            'discount_price'=> 'string | required',
            'description'=> 'string | required',
            'availbleitems'=> 'string | required',
            'packeage_count'=> 'string | required',
            'featured'=> 'string|',
        ]);
    }
    
    private function storedImage($image)
    {
        if(request()->hasfile('image')){
            $file = request()->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = "/images/gallery/product/".time().'.'.$extension;
            $file->move(public_path("../public/images/gallery/product"), $filename);
            $image->image = $filename;
            $image->save();
        }
    }
}
