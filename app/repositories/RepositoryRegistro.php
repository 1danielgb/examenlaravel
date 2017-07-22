<?php

namespace App\Repositories;
use App\User;
use App\Customers;
use Auth;
class RepositoryRegistro{
	
	static function postU($request){

       //dd($request);

        //$registro = User::create($usuario);
        if($request->type==1){
            $registro2=User::create([
                "email"=>$request->email,
                "password"=>  \Hash::make($request->password),
                "type"=>$request->type
                ]);
        }
       if($request->type==2){
            $registro3=User::create([
                "email"=>$request->email,
                "password"=>  \Hash::make($request->password),
                "type"=>$request->type
                ]);
        }
    }

    static function postC($request){
    	//$id=session()->id;
    	//$id=session();
    	$id=Auth::user()->id;
    	//dd($id);
    	$data=[
            "name"=>$request->name,
            "address"=>$request->address,
            "rfc"=>$request->rfc,
            "user_id"=> $id //=session()->get('comun')->id
        ];
        //dd($request);
    	$dato = Customers::create($data);
    	return $dato;
    }
}    