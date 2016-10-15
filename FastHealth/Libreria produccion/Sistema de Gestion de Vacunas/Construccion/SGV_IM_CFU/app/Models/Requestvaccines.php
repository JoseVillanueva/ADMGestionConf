<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requestvaccines extends Model
{
    
	public $table = "requestvaccines";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "name",
		"city",
		"country",
		"telephone",
		"observation",
		"supplier_id",
		"vaccine_id"
	];

	public static $rules = [
	    "name" => "required",
		"city" => "required",
		"country" => "required",
		"telephone" => "required",
		"supplier_id"=> "required",
		"vaccine_id"=> "required"
	];

    public function supplier()
    {
        return $this->hasMany('Supplier');
    }

    public function vaccine()
    {
        return $this->hasMany('Vaccine');
    }
}
