<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Exception;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::paginate(10);
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::paginate(10);
        return view('product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $p=new Product;
            $p->category_id=$request->category;
            $p->name=$request->productName;
            $p->description=$request->description;
            $p->price=$request->price;

            if($request->hasFile('image')){
                $imageName=rand(111,999).time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/product'),$imageName);
                $p->image=$imageName;
            }
            $p->status=1;
            if($p->save()){
                return redirect('product');
            }
        }
        catch(Exception $e){
            //dd($e);
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories=Category::paginate(10);
        return view('product.edit',compact('categories','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        try{
            $p=$product;
            $p->category_id=$request->category;
            $p->name=$request->productName;
            $p->description=$request->description;
            $p->price=$request->price;

            if($request->hasFile('image')){
                $imageName=rand(111,999).time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/product'),$imageName);
                $p->image=$imageName;
            }
            $p->status=1;
            if($p->save()){
                return redirect('product');
            }
        }
        catch(Exception $e){
            //dd($e);
            return back()->withInput();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back();
    }
}
