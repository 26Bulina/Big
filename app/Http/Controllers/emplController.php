<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateemplRequest;
use App\Http\Requests\UpdateemplRequest;
use App\Repositories\emplRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class emplController extends AppBaseController
{
    /** @var  emplRepository */
    private $emplRepository;

    public function __construct(emplRepository $emplRepo)
    {
        $this->emplRepository = $emplRepo;
    }

    /**
     * Display a listing of the empl.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->emplRepository->pushCriteria(new RequestCriteria($request));
        $empls = $this->emplRepository->all();

        return view('empls.index')
            ->with('empls', $empls);
    }

    /**
     * Show the form for creating a new empl.
     *
     * @return Response
     */
    public function create()
    {
        return view('empls.create');
    }

    /**
     * Store a newly created empl in storage.
     *
     * @param CreateemplRequest $request
     *
     * @return Response
     */
    public function store(CreateemplRequest $request)
    {
        $input = $request->all();

        $empl = $this->emplRepository->create($input);

        Flash::success('Empl saved successfully.');

        return redirect(route('empls.index'));
    }

    /**
     * Display the specified empl.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $empl = $this->emplRepository->findWithoutFail($id);

        if (empty($empl)) {
            Flash::error('Empl not found');

            return redirect(route('empls.index'));
        }

        return view('empls.show')->with('empl', $empl);
    }

    /**
     * Show the form for editing the specified empl.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $empl = $this->emplRepository->findWithoutFail($id);

        if (empty($empl)) {
            Flash::error('Empl not found');

            return redirect(route('empls.index'));
        }

        return view('empls.edit')->with('empl', $empl);
    }

    /**
     * Update the specified empl in storage.
     *
     * @param  int              $id
     * @param UpdateemplRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateemplRequest $request)
    {
        $empl = $this->emplRepository->findWithoutFail($id);

        if (empty($empl)) {
            Flash::error('Empl not found');

            return redirect(route('empls.index'));
        }

        $empl = $this->emplRepository->update($request->all(), $id);

        Flash::success('Empl updated successfully.');

        return redirect(route('empls.index'));
    }

    /**
     * Remove the specified empl from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $empl = $this->emplRepository->findWithoutFail($id);

        if (empty($empl)) {
            Flash::error('Empl not found');

            return redirect(route('empls.index'));
        }

        $this->emplRepository->delete($id);

        Flash::success('Empl deleted successfully.');

        return redirect(route('empls.index'));
    }
}
