<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\repositories\RepositoryRegistro;
use App\Customers;
use Auth;

class RegistroUController extends Controller
{
    public function post(Request $request){
        $insert=RepositoryRegistro::postU($request);
        if($insert)
            return back()->with('success', true);
        return back()->with('error', true);
    }
    public function postC(Request $request){
    	//$id=Auth::user()->id;
    	//dd($id);
        $datos=RepositoryRegistro::postC($request);
        if($datos)
        	//return view('website.tienda',compact('libros'));
            return back()->with(compact('datos'));
        return back()->with('error', true);
    }

    public function showC(Request $request)
    {
        $dato = \DB::table('customers')
            ->where('user_id', $request->user_id)
            ->select();
        if($select){
            return $select;
        }
    }

    public function showA() {
        return Customers::all();
    }

}
