<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatedepartamentRequest;
use App\Http\Requests\UpdatedepartamentRequest;
use App\Repositories\departamentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class departamentController extends AppBaseController
{
    /** @var  departamentRepository */
    private $departamentRepository;

    public function __construct(departamentRepository $departamentRepo)
    {
        $this->departamentRepository = $departamentRepo;
    }

    /**
     * Display a listing of the departament.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->departamentRepository->pushCriteria(new RequestCriteria($request));
        $departaments = $this->departamentRepository->all();

        return view('departaments.index')
            ->with('departaments', $departaments);
    }

    /**
     * Show the form for creating a new departament.
     *
     * @return Response
     */
    public function create()
    {
        return view('departaments.create');
    }

    /**
     * Store a newly created departament in storage.
     *
     * @param CreatedepartamentRequest $request
     *
     * @return Response
     */
    public function store(CreatedepartamentRequest $request)
    {
        $input = $request->all();

        $departament = $this->departamentRepository->create($input);

        Flash::success('Departament saved successfully.');

        return redirect(route('departaments.index'));
    }

    /**
     * Display the specified departament.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $departament = $this->departamentRepository->findWithoutFail($id);

        if (empty($departament)) {
            Flash::error('Departament not found');

            return redirect(route('departaments.index'));
        }

        return view('departaments.show')->with('departament', $departament);
    }

    /**
     * Show the form for editing the specified departament.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $departament = $this->departamentRepository->findWithoutFail($id);

        if (empty($departament)) {
            Flash::error('Departament not found');

            return redirect(route('departaments.index'));
        }

        return view('departaments.edit')->with('departament', $departament);
    }

    /**
     * Update the specified departament in storage.
     *
     * @param  int              $id
     * @param UpdatedepartamentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedepartamentRequest $request)
    {
        $departament = $this->departamentRepository->findWithoutFail($id);

        if (empty($departament)) {
            Flash::error('Departament not found');

            return redirect(route('departaments.index'));
        }

        $departament = $this->departamentRepository->update($request->all(), $id);

        Flash::success('Departament updated successfully.');

        return redirect(route('departaments.index'));
    }

    /**
     * Remove the specified departament from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $departament = $this->departamentRepository->findWithoutFail($id);

        if (empty($departament)) {
            Flash::error('Departament not found');

            return redirect(route('departaments.index'));
        }

        $this->departamentRepository->delete($id);

        Flash::success('Departament deleted successfully.');

        return redirect(route('departaments.index'));
    }
}
