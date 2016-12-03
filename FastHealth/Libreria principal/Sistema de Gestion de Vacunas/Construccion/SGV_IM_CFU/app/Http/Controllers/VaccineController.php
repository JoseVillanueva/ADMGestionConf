<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateVaccineRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\VaccineRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class VaccineController extends AppBaseController
{

	/** @var  VaccineRepository */
	private $vaccineRepository;

	function __construct(VaccineRepository $vaccineRepo)
	{
		$this->vaccineRepository = $vaccineRepo;
	}

	/**
	 * Display a listing of the Vaccine.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->vaccineRepository->search($input);

		$vaccines = $result[0];

		$attributes = $result[1];

		return view('vaccines.index')
		    ->with('vaccines', $vaccines)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Vaccine.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('vaccines.create');
	}

	/**
	 * Store a newly created Vaccine in storage.
	 *
	 * @param CreateVaccineRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateVaccineRequest $request)
	{
        $input = $request->all();

		$vaccine = $this->vaccineRepository->store($input);

		Flash::message('Registrado correctamente.');

		return redirect(route('vaccines.index'));
	}

	/**
	 * Display the specified Vaccine.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$vaccine = $this->vaccineRepository->findVaccineById($id);

		if(empty($vaccine))
		{
			Flash::error('No hay vacunas registradas');
			return redirect(route('vaccines.index'));
		}

		return view('vaccines.show')->with('vaccine', $vaccine);
	}

	/**
	 * Show the form for editing the specified Vaccine.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$vaccine = $this->vaccineRepository->findVaccineById($id);

		if(empty($vaccine))
		{
			Flash::error('Vaccine not found');
			return redirect(route('vaccines.index'));
		}

		return view('vaccines.edit')->with('vaccine', $vaccine);
	}

	/**
	 * Update the specified Vaccine in storage.
	 *
	 * @param  int    $id
	 * @param CreateVaccineRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateVaccineRequest $request)
	{
		$vaccine = $this->vaccineRepository->findVaccineById($id);

		if(empty($vaccine))
		{
			Flash::error('Vaccine not found');
			return redirect(route('vaccines.index'));
		}

		$vaccine = $this->vaccineRepository->update($vaccine, $request->all());

		Flash::message('Vacuna actualizada.');

		return redirect(route('vaccines.index'));
	}

	/**
	 * Remove the specified Vaccine from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$vaccine = $this->vaccineRepository->findVaccineById($id);

		if(empty($vaccine))
		{
			Flash::error('Vacuna no encontrada');
			return redirect(route('vaccines.index'));
		}

		$vaccine->delete();

		Flash::message('Vacuna borrada.');

		return redirect(route('vaccines.index'));
	}

}
