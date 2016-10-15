<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    
	public $table = "vaccines";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "name",
		"description"
	];

	public static $rules = [
	    "name" => "required",
		"description" => "required"
	];

}
