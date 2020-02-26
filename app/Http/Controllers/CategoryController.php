<?php

namespace App\Http\Controllers;

use App\Category;
use App\Commerce;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($commerceSlug)
    {
        //
        $commerce = Commerce::findBySlug($commerceSlug);
        // dd($commerce);
        $categories = Category::where('commerce_id',$commerce->id)->orderBy('id','ASC')->paginate(20);;
        return view('commerce.category.index')->with('categories',$categories)->with('commerce',$commerce);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $commerceSlug)
    {
        //
        // dd($request, $commerceSlug);
        $commerce = Commerce::findBySlug($commerceSlug);
        $category = new Category($request->all());
        $category->commerce_id = $commerce->id;
        $category->save();
        flash('Se ha añadido la categoria: '.$category->name)->success();
        return redirect()->route('category.index',$commerceSlug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($commerceSlug, $categorySlug)
    {
        //
        // dd($categorySlug, $commerceSlug);
        $category = Category::findBySlug($categorySlug);
        $commerce = Commerce::findBySlug($commerceSlug);
        // dd($categorySlug, $commerceSlug,$commerce, $category);
        return view('commerce.category.show')->with('category',$category)->with('commerce',$commerce);;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
