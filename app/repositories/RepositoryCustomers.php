<?php
namespace App\Repositorios;

//use App\Libro;
use App\Customers;

class RepositoryCustomers {

	static function detalle($request)
	{
		// get -> coleccion de datos muchos datos
		// first
		$dato = \DB::table('customers')
			->where('user_id', '=', $request->user_id)
			->select('customers.name', 'customers.address', 'customers.rfc')
			->first();
		dd($dato);
		return $dato;
	}
}