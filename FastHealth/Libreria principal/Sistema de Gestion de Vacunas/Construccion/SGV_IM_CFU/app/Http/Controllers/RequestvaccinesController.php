<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateRequestvaccinesRequest;
use App\Models\Requestvaccines;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use App\Models\Vaccine;
use App\Models\Supplier;

class RequestvaccinesController extends AppBaseController
{

	/**
	 * Display a listing of the Post.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$query = Requestvaccines::query();
        $columns = Schema::getColumnListing('$TABLE_NAME$');
        $attributes = array();

        foreach($columns as $attribute){
            if($request[$attribute] == true)
            {
                $query->where($attribute, $request[$attribute]);
                $attributes[$attribute] =  $request[$attribute];
            }else{
                $attributes[$attribute] =  null;
            }
        };

        $requestvaccines = $query->get();
		$vaccines  = Vaccine::lists('name','id');
		$supplier  = Supplier::lists('name','id');
        return view('requestvaccines.index')
            ->with('requestvaccines', $requestvaccines)
            ->with('attributes', $attributes)		
            ->with('vaccines', $vaccines)
			->with('supplier', $supplier);
	}

	/**
	 * Show the form for creating a new Requestvaccines.
	 *
	 * @return Response
	 */
	public function create()
	{
		$vaccines  = Vaccine::lists('name','id');
		$supplier  = Supplier::lists('name','id');

		return view('requestvaccines.create')
		->with('vaccines', $vaccines)
		->with('supplier', $supplier);
	}

	/**
	 * Store a newly created Requestvaccines in storage.
	 *
	 * @param CreateRequestvaccinesRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateRequestvaccinesRequest $request)
	{
        $input = $request->all();

		$requestvaccines = Requestvaccines::create($input);

		Flash::message('Solicitud de vacunas guardada.');

		return redirect(route('requestvaccines.index'));
	}

	/**
	 * Display the specified Requestvaccines.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$requestvaccines = Requestvaccines::find($id);
		$vaccines  = Vaccine::lists('name','id');
		$supplier  = Supplier::lists('name','id');
		if(empty($requestvaccines))
		{
			Flash::error('No se encontraron registros');
			return redirect(route('requestvaccines.index'));
		}

		return view('requestvaccines.show')->with('requestvaccines', $requestvaccines)
		->with('vaccines', $vaccines)
		->with('supplier', $supplier);
	}

	/**
	 * Show the form for editing the specified Requestvaccines.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$requestvaccines = Requestvaccines::find($id);

		if(empty($requestvaccines))
		{
			Flash::error('No se encontraron registros');
			return redirect(route('requestvaccines.index'));
		}

		$vaccines  = Vaccine::lists('name','id');
		$supplier  = Supplier::lists('name','id');

		return view('requestvaccines.edit')
		->with('requestvaccines', $requestvaccines)
		->with('vaccines', $vaccines)
		->with('supplier', $supplier);
	}

	/**
	 * Update the specified Requestvaccines in storage.
	 *
	 * @param  int    $id
	 * @param CreateRequestvaccinesRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateRequestvaccinesRequest $request)
	{
		/** @var Requestvaccines $requestvaccines */
		$requestvaccines = Requestvaccines::find($id);

		if(empty($requestvaccines))
		{
			Flash::error('No se encontraron registros');
			return redirect(route('requestvaccines.index'));
		}

		$requestvaccines->fill($request->all());
		$requestvaccines->save();

		Flash::message('Solicitud de vacunas actualada.');

		return redirect(route('requestvaccines.index'));
	}

	/**
	 * Remove the specified Requestvaccines from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Requestvaccines $requestvaccines */
		$requestvaccines = Requestvaccines::find($id);

		if(empty($requestvaccines))
		{
			Flash::error('No se encontraron registros');
			return redirect(route('requestvaccines.index'));
		}

		$requestvaccines->delete();

		Flash::message('Solicitud de vacuna eliminada.');

		return redirect(route('requestvaccines.index'));
	}
}
