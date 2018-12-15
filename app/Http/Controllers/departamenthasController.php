<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatedepartamenthasRequest;
use App\Http\Requests\UpdatedepartamenthasRequest;
use App\Repositories\departamenthasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class departamenthasController extends AppBaseController
{
    /** @var  departament_hasRepository */
    private $departamentHasRepository;

    public function __construct(departamenthasRepository $departamentHasRepo)
    {
        $this->departamentHasRepository = $departamentHasRepo;
    }

    /**
     * Display a listing of the departament_has.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->departamentHasRepository->pushCriteria(new RequestCriteria($request));
        $departamentHas = $this->departamentHasRepository->all();

        return view('departamenthas.index')
            ->with('departamentHas', $departamentHas);
    }

    /**
     * Show the form for creating a new departament_has.
     *
     * @return Response
     */
    public function create()
    {
        return view('departamenthas.create');
    }

    /**
     * Store a newly created departament_has in storage.
     *
     * @param Createdepartament_hasRequest $request
     *
     * @return Response
     */
    public function store(CreatedepartamenthasRequest $request)
    {
        $input = $request->all();

        $departamentHas = $this->departamentHasRepository->create($input);

        Flash::success('Departament Has saved successfully.');

        return redirect(route('departamentHas.index'));
    }

    /**
     * Display the specified departament_has.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $departamentHas = $this->departamentHasRepository->findWithoutFail($id);

        if (empty($departamentHas)) {
            Flash::error('Departament Has not found');

            return redirect(route('departamentHas.index'));
        }

        return view('departamenthas.show')->with('departamentHas', $departamentHas);
    }

    /**
     * Show the form for editing the specified departament_has.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $departamentHas = $this->departamentHasRepository->findWithoutFail($id);

        if (empty($departamentHas)) {
            Flash::error('Departament Has not found');

            return redirect(route('departamentHas.index'));
        }

        return view('departamenthas.edit')->with('departamentHas', $departamentHas);
    }

    /**
     * Update the specified departament_has in storage.
     *
     * @param  int              $id
     * @param Updatedepartament_hasRequest $request
     *
     * @return Response
     */
    public function update($id, Updatedepartament_hasRequest $request)
    {
        $departamentHas = $this->departamentHasRepository->findWithoutFail($id);

        if (empty($departamentHas)) {
            Flash::error('Departament Has not found');

            return redirect(route('departamentHas.index'));
        }

        $departamentHas = $this->departamentHasRepository->update($request->all(), $id);

        Flash::success('Departament Has updated successfully.');

        return redirect(route('departamentHas.index'));
    }

    /**
     * Remove the specified departament_has from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $departamentHas = $this->departamentHasRepository->findWithoutFail($id);

        if (empty($departamentHas)) {
            Flash::error('Departament Has not found');

            return redirect(route('departamentHas.index'));
        }

        $this->departamentHasRepository->delete($id);

        Flash::success('Departament Has deleted successfully.');

        return redirect(route('departamentHas.index'));
    }
}
