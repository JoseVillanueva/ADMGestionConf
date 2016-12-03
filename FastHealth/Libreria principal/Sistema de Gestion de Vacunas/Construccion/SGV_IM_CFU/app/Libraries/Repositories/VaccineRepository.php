<?php

namespace App\Libraries\Repositories;


use App\Models\Vaccine;
use Illuminate\Support\Facades\Schema;

class VaccineRepository
{

	/**
	 * Returns all Vaccines
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Vaccine::all();
	}

	public function search($input)
    {
        $query = Vaccine::query();

        $columns = Schema::getColumnListing('vaccines');
        $attributes = array();

        foreach($columns as $attribute){
            if(isset($input[$attribute]))
            {
                $query->where($attribute, $input[$attribute]);
                $attributes[$attribute] =  $input[$attribute];
            }else{
                $attributes[$attribute] =  null;
            }
        };

        return [$query->get(), $attributes];

    }

	/**
	 * Stores Vaccine into database
	 *
	 * @param array $input
	 *
	 * @return Vaccine
	 */
	public function store($input)
	{
		return Vaccine::create($input);
	}

	/**
	 * Find Vaccine by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Vaccine
	 */
	public function findVaccineById($id)
	{
		return Vaccine::find($id);
	}

	/**
	 * Updates Vaccine into database
	 *
	 * @param Vaccine $vaccine
	 * @param array $input
	 *
	 * @return Vaccine
	 */
	public function update($vaccine, $input)
	{
		$vaccine->fill($input);
		$vaccine->save();

		return $vaccine;
	}
}