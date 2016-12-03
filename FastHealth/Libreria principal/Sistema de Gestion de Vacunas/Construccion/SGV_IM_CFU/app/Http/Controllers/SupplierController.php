<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateSupplierRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\SupplierRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class SupplierController extends AppBaseController
{

	/** @var  SupplierRepository */
	private $supplierRepository;

	function __construct(SupplierRepository $supplierRepo)
	{
		$this->supplierRepository = $supplierRepo;
	}

	/**
	 * Display a listing of the Supplier.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->supplierRepository->search($input);

		$suppliers = $result[0];

		$attributes = $result[1];

		return view('suppliers.index')
		    ->with('suppliers', $suppliers)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Supplier.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('suppliers.create');
	}

	/**
	 * Store a newly created Supplier in storage.
	 *
	 * @param CreateSupplierRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateSupplierRequest $request)
	{
        $input = $request->all();

		$supplier = $this->supplierRepository->store($input);

		Flash::message('Proveedor registrado.');

		return redirect(route('suppliers.index'));
	}

	/**
	 * Display the specified Supplier.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$supplier = $this->supplierRepository->findSupplierById($id);

		if(empty($supplier))
		{
			Flash::error('Proveedor no encontrado');
			return redirect(route('suppliers.index'));
		}

		return view('suppliers.show')->with('supplier', $supplier);
	}

	/**
	 * Show the form for editing the specified Supplier.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$supplier = $this->supplierRepository->findSupplierById($id);

		if(empty($supplier))
		{
			Flash::error('Proveedor no encontrado');
			return redirect(route('suppliers.index'));
		}

		return view('suppliers.edit')->with('supplier', $supplier);
	}

	/**
	 * Update the specified Supplier in storage.
	 *
	 * @param  int    $id
	 * @param CreateSupplierRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateSupplierRequest $request)
	{
		$supplier = $this->supplierRepository->findSupplierById($id);

		if(empty($supplier))
		{
			Flash::error('Proveedor no encontrado');
			return redirect(route('suppliers.index'));
		}

		$supplier = $this->supplierRepository->update($supplier, $request->all());

		Flash::message('Proveedor actualizado.');

		return redirect(route('suppliers.index'));
	}

	/**
	 * Remove the specified Supplier from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$supplier = $this->supplierRepository->findSupplierById($id);

		if(empty($supplier))
		{
			Flash::error('Proveedor no encontrado');
			return redirect(route('suppliers.index'));
		}

		$supplier->delete();

		Flash::message('Proveedor borrado.');

		return redirect(route('suppliers.index'));
	}

}
