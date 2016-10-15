<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    
	public $table = "suppliers";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "name",
		"address",
		"city",
		"country",
		"telephone",
		"email",
		"url"
	];

	public static $rules = [
	    "name" => "required",
		"address" => "required",
		"city" => "required",
		"country" => "required",
		"telephone" => "required",
		"email" => "required"
	];

}
