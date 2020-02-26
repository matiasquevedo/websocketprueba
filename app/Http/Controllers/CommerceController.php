<?php

namespace App\Http\Controllers;

use App\Commerce;
use App\Plan;
use App\User;
use Illuminate\Http\Request;

class CommerceController extends Controller
{



    public function commerce($commerceSlug){
        $commerce = Commerce::findBySlug($commerceSlug);
        if($commerce == null){
            abort(404);
        }else{
            // dd($commerce);
            $user = User::find($commerce->user->id);
            // dd($user);
            // $commerces = $user->comerce;
            $plans = Plan::all();
            // dd($commerces);
            return view('commerce.index')->with('plans',$plans)->with('user',$user)->with('commerce',$commerce); 
        }
               
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $plans = Plan::all();
        return view('auth.createCommerce')->with('plans',$plans);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $commerce = new Commerce($request->all());
        $commerce->user_id = \Auth::user()->id;
        $commerce->tables = 4;
        $commerce->save();
        // dd($commerce);
        flash('Se ha agregado la información de su comercion')->success();
        return redirect()->route('commerce.subdomain',$commerce->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Commerce  $commerce
     * @return \Illuminate\Http\Response
     */
    public function show(Commerce $commerce)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Commerce  $commerce
     * @return \Illuminate\Http\Response
     */
    public function edit(Commerce $commerce)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Commerce  $commerce
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commerce $commerce)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Commerce  $commerce
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commerce $commerce)
    {
        //
    }
}
