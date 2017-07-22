<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
	protected $table="customers";

	protected $PrimaryKey="id";

	protected $fillable=['name','address','rfc','user_id'];
}