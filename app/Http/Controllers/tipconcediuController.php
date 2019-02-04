<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatetipconcediuRequest;
use App\Http\Requests\UpdatetipconcediuRequest;
use App\Repositories\tipconcediuRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class tipconcediuController extends AppBaseController
{
    /** @var  tipconcediuRepository */
    private $tipconcediuRepository;

    public function __construct(tipconcediuRepository $tipconcediuRepo)
    {
        $this->tipconcediuRepository = $tipconcediuRepo;
    }

    /**
     * Display a listing of the tipconcediu.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tipconcediuRepository->pushCriteria(new RequestCriteria($request));
        $tipconcedius = $this->tipconcediuRepository->all();

        return view('tipconcedius.index')
            ->with('tipconcedius', $tipconcedius);
    }

    /**
     * Show the form for creating a new tipconcediu.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipconcedius.create');
    }

    /**
     * Store a newly created tipconcediu in storage.
     *
     * @param CreatetipconcediuRequest $request
     *
     * @return Response
     */
    public function store(CreatetipconcediuRequest $request)
    {
        $input = $request->all();

        $tipconcediu = $this->tipconcediuRepository->create($input);

        Flash::success('Tipconcediu saved successfully.');

        return redirect(route('tipconcedius.index'));
    }

    /**
     * Display the specified tipconcediu.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipconcediu = $this->tipconcediuRepository->findWithoutFail($id);

        if (empty($tipconcediu)) {
            Flash::error('Tipconcediu not found');

            return redirect(route('tipconcedius.index'));
        }

        return view('tipconcedius.show')->with('tipconcediu', $tipconcediu);
    }

    /**
     * Show the form for editing the specified tipconcediu.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipconcediu = $this->tipconcediuRepository->findWithoutFail($id);

        if (empty($tipconcediu)) {
            Flash::error('Tipconcediu not found');

            return redirect(route('tipconcedius.index'));
        }

        return view('tipconcedius.edit')->with('tipconcediu', $tipconcediu);
    }

    /**
     * Update the specified tipconcediu in storage.
     *
     * @param  int              $id
     * @param UpdatetipconcediuRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetipconcediuRequest $request)
    {
        $tipconcediu = $this->tipconcediuRepository->findWithoutFail($id);

        if (empty($tipconcediu)) {
            Flash::error('Tipconcediu not found');

            return redirect(route('tipconcedius.index'));
        }

        $tipconcediu = $this->tipconcediuRepository->update($request->all(), $id);

        Flash::success('Tipconcediu updated successfully.');

        return redirect(route('tipconcedius.index'));
    }

    /**
     * Remove the specified tipconcediu from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipconcediu = $this->tipconcediuRepository->findWithoutFail($id);

        if (empty($tipconcediu)) {
            Flash::error('Tipconcediu not found');

            return redirect(route('tipconcedius.index'));
        }

        $this->tipconcediuRepository->delete($id);

        Flash::success('Tipconcediu deleted successfully.');

        return redirect(route('tipconcedius.index'));
    }
}
