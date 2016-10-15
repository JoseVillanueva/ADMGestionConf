<?php

namespace App\Libraries\Repositories;


use App\Models\Supplier;
use Illuminate\Support\Facades\Schema;

class SupplierRepository
{

	/**
	 * Returns all Suppliers
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Supplier::all();
	}

	public function search($input)
    {
        $query = Supplier::query();

        $columns = Schema::getColumnListing('suppliers');
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
	 * Stores Supplier into database
	 *
	 * @param array $input
	 *
	 * @return Supplier
	 */
	public function store($input)
	{
		return Supplier::create($input);
	}

	/**
	 * Find Supplier by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Supplier
	 */
	public function findSupplierById($id)
	{
		return Supplier::find($id);
	}

	/**
	 * Updates Supplier into database
	 *
	 * @param Supplier $supplier
	 * @param array $input
	 *
	 * @return Supplier
	 */
	public function update($supplier, $input)
	{
		$supplier->fill($input);
		$supplier->save();

		return $supplier;
	}
}