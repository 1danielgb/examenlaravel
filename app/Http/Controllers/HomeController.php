<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //session()->flush();
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()){
                if(Auth::user()->type == "1"){
                    return view('home');
                }
                //return redirect('/');
            }
        if (Auth::check()){
                if(Auth::user()->type == "2"){
                    
                    return view('perfile');
                }
                return redirect('/');
            }    
            //dd("no entro");
        return redirect('/');
        
    }

}
