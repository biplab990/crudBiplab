<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
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
        $categories=Category::paginate(10);
        return view('category.index',compact('categories'));
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
    public function store(Request $r)
    {
        $cat=new Category;
        $cat->category=$r->category;
        if($r->has('image')){
            $imageName=rand(111,999).time().'.'.$r->image->extension();
            $r->image->move(public_path('uploads/category'),$imageName);
            $cat->image=$imageName;
        }
        $cat->save();
        return redirect()->route('category.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, Category $category)
    {
        $category->category=$r->category;
        if($r->has('image')){
            $imageName=rand(111,999).time().'.'.$r->image->extension();
            $r->image->move(public_path('uploads/category'),$imageName);
            $category->image=$imageName;
        }
        $category->save();
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // try{
        //     if($category->products->coutn()>0){
        //         return redirect()->back()->with('message','you have to delete all product under this category first.');
        //     }else{
        //         $category->delete();
        //         return redirect()->back();
        //     }
        // }catch(Exception $e){
        //     return redirect()->back();
        // }
        $category->delete();
        return redirect()->back();
    }
}
