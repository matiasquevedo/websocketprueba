<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Plan;
use App\Commerce;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->middleware('auth');
        if(\Auth::user()->type == 'admin'){
            $plans = Plan::all()->take(5);
            return view('admin.index')->with('plans',$plans);
        }elseif (\Auth::user()->type == 'commerce') {
            $user = User::find(\Auth::user()->id);
            // dd($user);
            $commerces = $user->comerce;
            if(\Auth::user()->commerce == null){
                return redirect()->route('commerce.create');
            }else{
                return redirect()->route('commerce.subdomain',\Auth::user()->commerce->slug);
            }
        }        
    }

}
