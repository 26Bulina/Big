<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateperiodcoRequest;
use App\Http\Requests\UpdateperiodcoRequest;
use App\Repositories\periodcoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\tipconcediu;

class periodcoController extends AppBaseController
{
    /** @var  periodcoRepository */
    private $periodcoRepository;

    public function __construct(periodcoRepository $periodcoRepo)
    {
        $this->periodcoRepository = $periodcoRepo;
    }

    /**
     * Display a listing of the periodco.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->periodcoRepository->pushCriteria(new RequestCriteria($request));
        $periodcos = $this->periodcoRepository->all();

        return view('periodcos.index')
            ->with('periodcos', $periodcos);
    }

    /**
     * Show the form for creating a new periodco.
     *
     * @return Response
     */
    public function create()
    {
        $tipconcedius = Tipconcediu::pluck('name','id');
        return view('periodcos.create',compact('tipconcedius'));
    }

    /**
     * Store a newly created periodco in storage.
     *
     * @param CreateperiodcoRequest $request
     *
     * @return Response
     */
    public function store(CreateperiodcoRequest $request)
    {
        $input = $request->all();

        $periodco = $this->periodcoRepository->create($input);

        Flash::success('Periodco saved successfully.');

        return redirect(route('periodcos.index'));
    }

    /**
     * Display the specified periodco.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $periodco = $this->periodcoRepository->findWithoutFail($id);

        if (empty($periodco)) {
            Flash::error('Periodco not found');

            return redirect(route('periodcos.index'));
        }

        return view('periodcos.show')->with('periodco', $periodco);
    }

    /**
     * Show the form for editing the specified periodco.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipconcedius = Tipconcediu::pluck('name','id');
        $periodco = $this->periodcoRepository->findWithoutFail($id);

        if (empty($periodco)) {
            Flash::error('Periodco not found');

            return redirect(route('periodcos.index'));
        }

        return view('periodcos.edit',compact('periodco','tipconcedius'));
    }

    /**
     * Update the specified periodco in storage.
     *
     * @param  int              $id
     * @param UpdateperiodcoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateperiodcoRequest $request)
    {
        $periodco = $this->periodcoRepository->findWithoutFail($id);

        if (empty($periodco)) {
            Flash::error('Periodco not found');

            return redirect(route('periodcos.index'));
        }

        $periodco = $this->periodcoRepository->update($request->all(), $id);

        Flash::success('Periodco updated successfully.');

        return redirect(route('periodcos.index'));
    }

    /**
     * Remove the specified periodco from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $periodco = $this->periodcoRepository->findWithoutFail($id);

        if (empty($periodco)) {
            Flash::error('Periodco not found');

            return redirect(route('periodcos.index'));
        }

        $this->periodcoRepository->delete($id);

        Flash::success('Periodco deleted successfully.');

        return redirect(route('periodcos.index'));
    }
}
